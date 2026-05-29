<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $validate = Validator::make($request->all(),[
            'name' => 'required|string|max:40',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|in:active,inactive'
        ]);
        if($validate->fails()){
            return response()->json([
                'status' => false,
                'message' => 'User Register not success',
                'data' => $validate->errors()
            ],422);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'status' => $request->status,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'User Register success',
            'data' => $validate
        ],200);
    }

    public function login(Request $request){
    $validator = Validator::make($request->all(),[
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:6'
    ]);

    if($validator->fails()){
        return response()->json([
            'status' => false,
            'message' => 'Invalid credentials',
            'errors' => $validator->errors()
        ],422);
    }

    $validated = $validator->validated();

    // SELECT * FROM users WHERE email = ? LIMIT 1;
    $user = User::where('email', $validated['email'])->first();

    if (!$user || !Hash::check($validated['password'], $user->password)) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid credentials',
        ],401);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'status' => true,
        'message' => 'Login Successfully',
        'token' => $token,
        'type' => 'Bearer'
    ]);
}
}
