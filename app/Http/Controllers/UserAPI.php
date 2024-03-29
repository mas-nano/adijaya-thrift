<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UserAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['Nggangteng'=>'uhuy']);
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
            'password' => ['required', 'min:8'],
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'unique:users,username']
        ]);
        
        if($validate->fails()) {
            $response = [
                'messages' => 'Gagal',
                'data' => $validate->errors()
            ];
            return response()->json($response,
            Response::HTTP_BAD_REQUEST);
        }

        $data = $request->all();
        $data['photo'] = 'default.png';
        $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);

        try {
            $user = User::create($data);
            $repsonse = [
                'status' => 201,
                'messages' => 'Sukses',
                'data' => $user
            ];
            return response()->json($repsonse,
            Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json(
                $e->errorInfo 
            );
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
        return response()->json(['status' => 200, 'user' => $user],
            Response::HTTP_OK);
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
        $validate = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'username' => ['required']
        ]);
        if($validate->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validate->errors()
            ], Response::HTTP_BAD_REQUEST);
        }
        $data = $request->all();
        if(isset($data['password'])){
            $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        }else{
            unset($data['password']);
        }
        try {
            $user = $user->update($data);
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil di update'
            ], Response::HTTP_OK);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
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
