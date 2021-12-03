<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\UserChat;
use App\Models\UserMessage;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;

class ChatAPI extends Controller
{
    public function index(User $user)
    {
        $message=[];
        $chat = UserChat::where('user_id', $user->id)->orWhere('penerima_id', $user->id)->orderBy('updated_at', 'desc')->get();
        foreach ($chat as $c) {
            $c->user;
            $c->penerima;
            array_push($message, UserMessage::where('user_chat_id', $c->id)->get()->last());
        }
        return response()->json([
            'status'=>200,
            'userChat' => $chat,
            'message' => $message
        ], Response::HTTP_OK);
    }
    public function getMessage(UserChat $userChat)
    {
        return response()->json(['status'=>200, 'messages'=>$userChat->user_message], Response::HTTP_OK);
    }
    public function postMessage(Request $request, UserChat $userChat)
    {
        if(!isset($request->user_id)){
            return response()->json(['status'=>400, 'message'=>'param user_id tidak ada'], Response::HTTP_BAD_REQUEST);
        }
        $request['user_chat_id'] = $userChat->id;
        $request['user_id'] = $request->user_id;
        try {
            UserMessage::create($request->all());
            $userChat->update(['updated_at' => date('Y-m-d H:i:s')]);
            Notification::create([
                'user_id' => ($userChat->user_id==$request->user_id?$userChat->penerima_id:$userChat->user_id),
                'subjudul' => ($userChat->user_id==$request->user_id?$userChat->user->name:$userChat->penerima->name),
                'pesan' => 'Telah mengirim pesan',
                'destinasi' => 'chat'
            ]);
            return response()->json(['status'=>200, 'message'=>'Berhasil'], Response::HTTP_OK);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
    public function newChat(Produk $produk, Request $request)
    {
        $data['user_id'] = $request->user_id;
        $data['penerima_id'] = $produk->id_penjual;
        try {
            if(UserChat::where('user_id', $request->user_id)->where('penerima_id', $produk->id_penjual)->first() || UserChat::where('user_id', $produk->id_penjual)->where('penerima_id', $request->user_id)->first()){
                UserChat::where('user_id', $request->user_id)->where('penerima_id', $produk->id_penjual)->first()->update(['updated_at' => date('Y-m-d H:i:s')]);
            }else{
                UserChat::create($data);
            }
            return response()->json([
                'message' => 'berhasil'
            ], Response::HTTP_OK);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
