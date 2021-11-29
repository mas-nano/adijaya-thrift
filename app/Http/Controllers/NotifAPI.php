<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;

class NotifAPI extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'status'=>200,
            'notifikasi'=>Notification::where('user_id', $request->user_id)->get()
        ], Response::HTTP_OK);
    }
    public function destroy(Notification $notification)
    {
        try {
            $notification->delete();
            return response()->json([
                'status' => 200,
                'message'=>'Berhasil'
            ], Response::HTTP_OK);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
