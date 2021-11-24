<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\UserChat;
use App\Models\UserMessage;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use function PHPUnit\Framework\isEmpty;

class Chat extends Controller
{
    public function index()
    {
        if(!session('dataUser')){
            return redirect()->to('/login')->send();
        }
        try {
            Notification::where('user_id', session('dataUser')['id'])->where('destinasi', 'chat')->delete();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
        $chat = UserChat::where('user_id', session('dataUser')['id'])->orWhere('penerima_id', session('dataUser')['id'])->orderBy('updated_at', 'desc')->get();
        if(!$chat->first()){
            return view('chat',[
                "css" => "chat",
                "title" => "Chat",
                "chat" => [],
                "pesan" => []
            ]);    
        }
        return view('chat',[
            "css" => "chat",
            "title" => "Chat",
            "chat" => $chat,
            "pesan" => $chat->first()->user_message
        ]);
    }
    public function showMessage(UserChat $userChat)
    {
        return response()->json($userChat->user_message, Response::HTTP_OK);
    }
    public function send(UserChat $userChat, Request $request)
    {
        $request['user_id'] = session('dataUser')['id'];
        try {
            UserMessage::create($request->all());
            $userChat->update(['updated_at' => date('Y-m-d H:i:s')]);
            Notification::create([
                'user_id' => ($userChat->user_id==session('dataUser')['id']?$userChat->penerima_id:$userChat->user_id),
                'subjudul' => ($userChat->user_id==session('dataUser')['id']?$userChat->user->name:$userChat->penerima->name),
                'pesan' => 'Telah mengirim pesan',
                'destinasi' => 'chat'
            ]);
            return response()->json($userChat->user_message->last(), Response::HTTP_OK);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
    public function latestMessage(UserChat $userChat)
    {
        return response()->json($userChat->user_message->last(), Response::HTTP_OK);
    }
    public function userLatest()
    {
        try {
            Notification::where('user_id', session('dataUser')['id'])->where('destinasi', 'chat')->delete();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
        $chat = UserChat::where('user_id', session('dataUser')['id'])->orWhere('penerima_id', session('dataUser')['id'])->orderBy('updated_at', 'desc')->get();
        foreach ($chat as $c) {
            $c->penerima;
            $c->user;
        }
        return response()->json($chat, Response::HTTP_OK);
    }
}
