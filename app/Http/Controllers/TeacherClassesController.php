<?php

namespace App\Http\Controllers;

use App\Models\Teacher_classes;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\_ProtocolException;
use Validator;
class TeacherClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher_classes = Teacher_classes::all();
        return response()->json([
            'status' => true,
            'message' => 'Teacher-class relationships retrieved successfully',
            'data' => $teacher_classes
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
            'teacher_id'=>'required|integer|exists:teachers,id',
            'class_id'=>'required|integer|exists:classes,id',
        ]);
        
        if($validate->fails()){
            return response()->json($validate->errors(),400);
        }
        $teacher_class = Teacher_classes::create($validate->validated());
        return response()->json([
            'status' => true,
            'message' => 'Teacher-class relationship created successfully',
            'data' => $teacher_class
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher_classes $teacher_classes)
    {
        $teacher_class = Teacher_classes::findOrFail($teacher_classes->id);
        return response()->json([
            'status' => true,
            'message' => 'Teacher-class relationship retrieved successfully',
            'data' => $teacher_class
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher_classes $teacher_classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher_classes $teacher_classes)
    {
        $validate = Validator::make($request->all() , [
            'teacher_id'=>'required|integer|exists:teachers,id',
            'class_id'=>'required|integer|exists:classes,id',
        ]);
        
        if($validate->fails()){
            return response()->json($validate->errors(),400);
        }
        $teacher_classes->update($validate->validated());
        return response()->json([
            'status' => true,
            'message' => 'Teacher-class relationship updated successfully',
            'data' => $teacher_classes
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher_classes $teacher_classes)
    {
        $teacher_class = Teacher_classes::findOrFail($teacher_classes->id);
        $teacher_class->delete();
        return response()->json([
            'status' => true,
            'message' => 'Teacher-class relationship deleted successfully'
        ]);
    }
}
