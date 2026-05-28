<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function create(Request $request){
        $validate = Validator($request->all() , [
            'name' => 'required|string',
            'email' => 'required|email|unique:users, email',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|in:active,inactive'
        ]);

        $user = User::create($validate->validated());
        return response()->json([
            'status'=>true,
            'message' =>'User created successfully',
            'data' => $user
        ]);
    }
}
