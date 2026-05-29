<?php

namespace App\Http\Controllers;

use App\Models\Teacher_attendance;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\_ProtocolException;
use Validator;
class TeacherAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Teacher_attendance = Teacher_attendance::all();
        return response()->json([
            'status' => true,
            'message' => 'Teacher attendance records retrieved successfully',
            'data' => $Teacher_attendance
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
        $validate = Validator::make($request->all() ,[
            'teacher_id'=>'required|integer',
            'date'=>'required|date',
            'status'=>'required|string',
        ]);

        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()],422);
        }
        $teacher_attendance = Teacher_attendance::create($validate->validated());
        return response()->json([
            'status' => true,
            'message' => 'Teacher attendance recorded successfully',
            'data' => $teacher_attendance   
            ], 201);}

    /**
     * Display the specified resource.
     */
    public function show(Teacher_attendance $teacher_attendance)
    {
        $Teacher_attendance = Teacher_attendance::findOrFail($teacher_attendance->id);
        return response()->json([
            'status' => true,
            'data' => $Teacher_attendance
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher_attendance $teacher_attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher_attendance $teacher_attendance , $id)
    {
        $validate = Validator::make($request->all() , [
            'teacher_id'=>'required|interger|exists:techers,id',
            'date'=>'required|date',
            'status'=>'required|string',
        ]);
        if($validate->fails()){
            return response()->json([
                'status'=>false,
                'messsage'=>'Validation errors',
                'errors'=>$validate->errors()             ],422);
        }
        $Teacher_attendance = Teacher_attendance::findOrFail($id);
        $Teacher_attendance->update($validate->validated());
        return response()->json([
            'status'=>true,
            'message'=>'Teacher attendance updated successfully',
            'data'=>$Teacher_attendance
        ]);
    
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher_attendance $teacher_attendance)
    {
        $teacher_attendance = Teacher_attendance::findOrFail($teacher_attendance->id);
        $teacher_attendance->delete();
        return response()->json([
            'status' => true,
            'message' => 'Teacher attendance record deleted successfully',
            'data'=>$teacher_attendance
        ]);
    }
}
