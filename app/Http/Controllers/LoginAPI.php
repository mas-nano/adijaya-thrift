<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class LoginAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'password' => ['required'],
            'username' => ['required']
        ]);
        
        if($validate->fails()) {
            $response = [
                'status' => 400,
                'messages' => 'Gagal',
                'data' => $validate->errors()
            ];
            return response()->json($response,
            Response::HTTP_BAD_REQUEST);
        }

        $data = $request->all();
        $users =User::where('username', $data['username'])->get();
        if(count($users)===1){
            if(password_verify($data['password'], $users[0]['password'])){
                return response()->json([
                    'status' => 200,
                    'messages' => 'Sukses',
                    'nama' => $users[0]['name'],
                    'id' => $users[0]['id'],
                    'email' => $users[0]['email']
                ],Response::HTTP_OK);
            }else{
                return response()->json([
                    'status' => 200,
                    'message' => 'Kata Sandi salah'
                ],Response::HTTP_OK);      
            }
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'Nama pengguna salah'
            ],Response::HTTP_OK);      
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
