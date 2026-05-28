<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\_Protocol\Stream\InOut;
use Illuminate\Support\Facades\Validator;
class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::all();
        return response()->json([
            'status' => true,
            'message' => 'Students retrieved successfully',
            'data' => $students
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
            'user_id' => 'required|exists:users,id',
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'gender' => 'required|in:male,female',
            'dob' => 'required|date',
            'phone' => 'required|string|max:50',
            'address' => 'required|string|max:50',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
            'parent_name' => 'required|string|max:50',
            'parent_phone' => 'required|string|max:50',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validate->fails()){
            return response()->json($validate->errors(),400);
        }
        $student = Students::create($validate->validated());
        return response()->json([
            'status' => true,
            'message' => 'Student created successfully',
            'data' => $student
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students)
    {
        $students = Students::find($students->id);
        return response()->json([
            'status' => true,
            'message' => 'Student retrieved successfully',
            'data' => $students
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Students $students)
    {
        $validate = Validator::make($request->all() , [
            'user_id' => 'required|exists:users,id',
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'gender' => 'required|in:male,female',
            'dob' => 'required|date',
            'phone' => 'required|string|max:50',
            'address' => 'required|string|max:50',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
            'parent_name' => 'required|string|max:50',
            'parent_phone' => 'required|string|max:50',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $students = Students::findOrFail($students->id);
        if($validate->fails()){
            return response()->json($validate->errors(),400);                 
    }
        $students->update($validate->validated());
        return response()->json([
            'status' => true,
            'message' => 'Student updated successfully',
            'data' => $students
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students)
    {
        $students = Students::findOrFail($students->id);
        $students->delete();
        return response()->json([
            'status' => true,
            'message' => 'Student deleted successfully'
        ]);
    }
}
