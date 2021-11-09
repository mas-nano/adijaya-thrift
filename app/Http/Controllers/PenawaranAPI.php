<?php

namespace App\Http\Controllers;

use App\Models\Tawar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PenawaranAPI extends Controller
{
    public function index(Request $request)
    {
        if(isset($request['user_id'])){
            $query = Tawar::where('user_id', $request['user_id']);
            if(isset($request['filter'])){
                $query->where('status', $request['filter']);
            }
            $query = $query->get();
            foreach($query as $q){
                $q->produk;
            }
            return response()->json([
                'tawar' => $query
            ], Response::HTTP_OK);
        }
        return response()->json([
            'message' => 'masukkan parameter user_id atau penjual_id'
        ], Response::HTTP_BAD_REQUEST);
    }
}
