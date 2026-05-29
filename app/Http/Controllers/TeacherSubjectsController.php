<?php

namespace App\Http\Controllers;

use App\Models\Teacher_subjects;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\_ProtocolException;
use Validator;
class TeacherSubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher_subjects = Teacher_subjects::all();
        return response()->json([
            'status' => true,
            'message' => 'Teacher-subject relationships retrieved successfully',
            'data' => $teacher_subjects
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
            'subject_id'=>'required|integer|exists:subjects,id',
        ]); 
        if($validate->fails()){
            return response()->json($validate->errors(),400);
        }
        $teacher_subject = Teacher_subjects::create($validate->validated());
        return response()->json([
            'status' => true,
            'message' => 'Teacher-subject relationship created successfully',
            'data' => $teacher_subject
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher_subjects $teacher_subjects)
    {
        $teacher_subject = Teacher_subjects::findOrFail($teacher_subjects->id);
        return response()->json([
            'status' => true,
            'message' => 'Teacher-subject relationship retrieved successfully',
            'data' => $teacher_subject
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher_subjects $teacher_subjects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher_subjects $teacher_subjects)
    {
        $validate = Validator::make($request->all() , [
            'teacher_id'=>'required|integer|exists:teachers,id',
            'subject_id'=>'required|integer|exists:subjects,id',
        ]); 
        if($validate->fails()){
            return response()->json($validate->errors(),400);
        }
        $teacher_subjects->update($validate->validated());
        return response()->json([
            'status' => true,
            'message' => 'Teacher-subject relationship updated successfully',
            'data' => $teacher_subjects
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher_subjects $teacher_subjects)
    {
        $teacher_subject = Teacher_subjects::findOrFail($teacher_subjects->id);
        $teacher_subject->delete();
        return response()->json([
            'status' => true,
            'message' => 'Teacher-subject relationship deleted successfully'
        ]);
    }
}
