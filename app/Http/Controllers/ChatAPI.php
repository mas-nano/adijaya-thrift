<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $chat = UserChat::where('user_id', $user->id)->orWhere('penerima_id', $user->id)->orderBy('updated_at', 'desc')->get();
        return response()->json([
            'status'=>200,
            'userChat' => $chat
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
            return response()->json(['status'=>200, 'chat'=>$userChat->user_message->last()], Response::HTTP_OK);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
