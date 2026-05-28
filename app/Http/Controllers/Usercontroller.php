<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{


    public function index(){
        $user = User::all();
        return response()->json([
            'status' => true,
            'message' => 'Users retrieved successfully',
            'data' => $user
        ]);
    }
    public function create(Request $request){
        $validate = Validator($request->all() , [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|in:active,inactive'
        ]);
        if($validate->fails()){
            return response()->json([
                'status' => false,
                'message' => $validate->getMessageBag()->first()
            ]);
        }

        $user = User::create($validate->validated());
        return response()->json([
            'status'=>true,
            'message' =>'User created successfully',
            'data' => $user
        ]);
    }

    public function show(User $user , $id){
        $user = User::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'User retrieved successfully',
            'data' => $user
        ]);
    }

    public function update(Request $request , User $user , $id){
        $validate = Validator($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users, email',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|in:active,inactive'
        ]);

        $user = User::findOrFail($id);
        if($validate->fails()){
            return response()->json([
                'status' => false,
                'message' => $validate->getMessageBag()->first()
            ]);
        }
        $user->update($validate->validated());
        return response()->json([
            'status'=>true,
            'message' =>'User updated successfully' , 
            'data'=>$user
        ]);
    }


    public function destroy(User $user , $id){
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ]);
        }
        $user->delete();
        return response()->json([
            'status' => true,
            'message' => 'User deleted successfully'
        ]);
    }
}