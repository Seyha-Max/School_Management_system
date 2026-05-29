<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\_ProtocolException;
use Validator;
class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teachers::all();
        return response()->json([
            'status' => true,
            'message' => 'Teachers retrieved successfully',
            'data' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all() , [
            'user_id'=>'required|integer|exists:users,id',
            'firstname'=>'required|string|max:50',
            'lastname'=>'required|string|max:50',
            'gender'=>'required|in:male,female',
            'dob'=>'required|date',
            'phone'=>'required|string|max:50',
            'address'=>'required|string|max:50',
            'hire_date'=>'required|date',
            'salary'=>'required|numeric',
            'profile_image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validate->fails()){
            return response()->json($validate->errors(),400);
        }
        $teacher = Teachers::create($validate->validated());
        return response()->json([
            'status' => true,
            'message' => 'Teacher created successfully',
            'data' => $teacher
        ],201);
        //    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        //     $table->string('firstname',50);
        //     $table->string('lastname',50);
        //     $table->enum('gender',['male','female']);
        //     $table->date('dob');
        //     $table->string('phone',50);
        //     $table->string('address',50);
        //     $table->date('hire_date');
        //     $table->decimal('salary', 10, 2);
        //     $table->string('profile_image')->nullable();
    }

    /**
     * Display the specified resource.
     */
    public function show(Teachers $teachers)
    {
        $teachers = Teachers::find($teachers->id);
        return response()->json([
            'status' => true,
            'message' => 'Teacher retrieved successfully',
            'data' => $teachers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teachers $teachers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teachers $teachers)
    {
        $validate = Validator::make($request->all() , [
            'user_id'=>'required|integer|exists:users,id',
            'firstname'=>'required|string|max:50',
            'lastname'=>'required|string|max:50',
            'gender'=>'required|in:male,female',
            'dob'=>'required|date',
            'phone'=>'required|string|max:50',
            'address'=>'required|string|max:50',
            'hire_date'=>'required|date',
            'salary'=>'required|numeric',
            'profile_image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validate->fails()){
            return response()->json($validate->errors(),400);   
    }
        $teachers->update($validate->validated());
        return response()->json([
            'status' => true,
            'message' => 'Teacher updated successfully',
            'data' => $teachers
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teachers $teachers)
    {
        $teacher = Teachers::findOrFail($teachers->id);
        $teacher->delete();
        return response()->json([
            'status' => true,
            'message' => 'Teacher deleted successfully'
        ]);
    }
}
