<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ResetPassword extends Controller
{
    public function index()
    {
        if (session("dataUser")) {
            return redirect()->secure("/");
        }
        return view("reset", [
            "css" => "login",
            "title" => "Lupa Kata Sandi",
        ]);
    }
    public function send(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "email" => ["required", "email", "exists:users"],
        ]);

        if ($validate->fails()) {
            return view("reset", [
                "css" => "login",
                "title" => "Lupa Kata Sandi",
                "message" => "Email tidak ditemukan",
            ]);
        }
        $token = Str::random(60);
        DB::table("password_resets")->insert([
            "email" => $request->email,
            "token" => $token,
            "created_at" => Carbon::now(),
        ]);
        $username = User::where("email", $request->email)->first()->username;
        Mail::send(
            "verify",
            ["token" => $token, "username" => $username],
            function ($message) use ($request) {
                $message->from("adijaya.abadi2021@gmail.com");
                $message->to($request->email);
                $message->subject("Pengaturan Ulang Kata Sandi");
            }
        );

        return redirect()
            ->secure("/login")
            ->with(
                "message",
                "Kami telah mengirimkan email tautan pengaturan ulang kata sandi kepada Anda"
            );
    }
    public function verify($token)
    {
        if (session("dataUser")) {
            return redirect()->secure("/");
        }
        if (
            DB::table("password_resets")
                ->where("token", $token)
                ->first()
        ) {
            return view("passwordreset", [
                "css" => "login",
                "title" => "Lupa Kata Sandi",
            ]);
        } else {
            return redirect()
                ->secure("/login")
                ->with("message", "Token tidak valid");
        }
    }
    public function postPassword(Request $request, $token)
    {
        $validate = Validator::make($request->all(), [
            "email" => ["required", "email", "exists:users"],
            "password" => ["required", "min:8", "confirmed"],
            "password_confirmation" => ["required"],
        ]);
        if ($validate->fails()) {
            return view("reset", [
                "css" => "login",
                "title" => "Lupa Kata Sandi",
                "data" => json_decode($validate->errors(), true),
            ]);
        }
        $updatePassword = DB::table("password_resets")
            ->where(["email" => $request->email, "token" => $token])
            ->first();

        if (!$updatePassword) {
            return redirect()
                ->secure("/login")
                ->with("message", "Token tidak valid");
        }

        $user = User::where("email", $request->email)->update([
            "password" => password_hash($request->password, PASSWORD_DEFAULT),
        ]);

        DB::table("password_resets")
            ->where(["email" => $request->email])
            ->delete();

        return redirect()
            ->secure("/login")
            ->with("message", "Kata sandi anda berhasil diubah");
    }
}
