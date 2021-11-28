<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserChat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
}
