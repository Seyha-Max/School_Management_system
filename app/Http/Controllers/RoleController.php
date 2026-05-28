<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return response()->json([
            'status' => true,
            'message' => 'Roles retrieved successfully',
            'data' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validate = Validator($request->all() , [
            'role_name' => 'required|in:admin,teacher,student']);
        if($validate->fails()){
            return response()->json([
                'status' => false,
                'message' => $validate->getMessageBag()->first()
            ]);
        }
        $role = Role::create($validate->validated());
        return response()->json([
            'status' => true,
            'message' => 'Role created successfully',
            'data' => $role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role , $id)
    {
        $role = Role::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Role retrieved successfully',
            'data' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validate = Validator($request->all() , [
            'role_name' => 'required|in:admin,teacher,student' . $role->id]);
        if($validate->fails()){
            return response()->json([
                'status' => false,
                'message' => $validate->getMessageBag()->first()
            ]);
        }
        $role->update($validate->validated());
        return response()->json([
            'status' => true,
            'message' => 'Role updated successfully',
            'data' => $role
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role , $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->json([
            'status' => true,
            'message' => 'Role deleted successfully'
        ]);
    }
}
