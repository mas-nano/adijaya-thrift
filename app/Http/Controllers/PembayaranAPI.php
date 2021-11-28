<?php

namespace App\Http\Controllers;

use App\Models\Tawar;
use App\Models\Produk;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class PembayaranAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Produk $produk, Request $request)
    {
        $tawar = Tawar::where('user_id', $request->user_id)->where('produk_id', $produk->id)->where('status','Diterima')->latest()->first();
        return response()->json(['status'=>200, 'produk'=>$produk, 'tawar'=>$tawar], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCheckout(Request $request, Produk $produk)
    {
        $dataBayar = $request->except(['user_id']);
        $dataBayar['tanggal'] = date('Y-m-d');
        if($pemesanan = Pemesanan::where('user_id', $request->user_id)->where('produk_id', $produk->id)->where('status_pembeli', 'Menunggu Pembayaran')->first()){
            $pemesanan = $pemesanan->pembayaran;
            return response()->json(['status'=>200, 'pemesanan'=>$pemesanan], Response::HTTP_OK);
        }
        try {
            $pembayaran = Pembayaran::create($dataBayar);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
        $data = [
            'pembayaran_id' => $pembayaran->id,
            'produk_id' => intval($produk->id),
            'user_id' => intval($request->user_id),
            'penjual_id' => intval($produk->id_penjual),
            'status_pembeli' => 'Menunggu Pembayaran'
        ];
        try {
            Pemesanan::create($data);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
        return response()->json(['status'=>200, 'pemesanan'=>$pembayaran], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getPembayaran(Pembayaran $pembayaran)
    {
        $pembayaran->pemesanan->produk;
        return response()->json(['status'=>200, 'pemesanan'=>$pembayaran], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function postPembayaran(Pembayaran $pembayaran, Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama_bank' => ['required'],
            'nomor_rekening' => ['required', 'numeric'],
            'nama' => ['required'],
            'alamat' => ['required'],
            'provinsi' => ['required'],
            'kota' => ['required'],
            'user_id' => ['required', 'numeric']
        ]);
        
        if($validate->fails()) {
            return response()->json(['status'=>400, 'error'=>$validate->errors()], Response::HTTP_BAD_REQUEST);
        }
        $request['stok'] = $request['stok']-1;
        $request['status_pembeli'] = 'Konfirmasi admin';
        $request['status_admin'] = 'Belum Dikonfirmasi';
        try{
            $pembayaran->update($request->except(['stok', 'status_pembeil', 'status_admin']));
            $pembayaran->pemesanan->produk->update($request->only(['stok']));
            $pembayaran->pemesanan->update($request->only(['status_pembeli', 'status_admin']));
            if($tawar = $pembayaran->pemesanan->produk->produk->where('user_id', $request->user_id)->all()){
                foreach($tawar as $t){
                    $t->delete();
                }
            }
            return response()->json([
                'status'=>200,
                'message' => 'Berhasil'
            ], Response::HTTP_OK);
        }catch(QueryException $e){
            return $e->errorInfo;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran, Request $request)
    {
        if($tawar = $pembayaran->pemesanan->produk->produk->where('user_id', $request->user_id)->all()){
            foreach($tawar as $t){
                $t->delete();
            }
        }
        $pembayaran->pemesanan->delete();
        $pembayaran->delete();
        return response()->json([
            'status'=>200,
            'message' => 'Berhasil Dihapus'
        ], Response::HTTP_OK);
    }
}
