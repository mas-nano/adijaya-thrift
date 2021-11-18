<?php

namespace App\Http\Controllers;

use App\Models\UserChat;
use App\Models\UserMessage;
use Illuminate\Http\Request;

class Chat extends Controller
{
    public function index()
    {
        return view('chat',[
            "css" => "chat",
            "title" => "Chat",
            "chat" => UserChat::where('user_id', session('dataUser')['id'])->orWhere('penerima_id', session('dataUser')['id'])->get(),
            "pesan" => UserMessage::where('user_chat_id', 1)->where('user_id', session('dataUser')['id'])->orWhere('penerima_id', session('dataUser')['id'])->get()
        ]);
    }
}
