<?php

namespace App\Http\Controllers;

use App\Models\Student_attendance;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\_Protocol\Stream\InOut;
use Illuminate\Support\Facades\Validator;
class StudentAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'student_id' => 'required|exists:students,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late',
        ]);
        
        if($validate->fails()){
            return response()->json($validate->errors(),400);
        }
        $attendance = Student_attendance::create($validate->validated());
        return response()->json([
            'status' => true,
            'message' => 'Attendance recorded successfully',
            'data' => $attendance
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student_attendance $student_attendance)
    {
        $attendance = Student_attendance::findOrFail($student_attendance->id);
        return response()->json([
            'status' => true,
            'message' => 'Attendance retrieved successfully',
            'data' => $attendance
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student_attendance $student_attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student_attendance $student_attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student_attendance $student_attendance)
    {
        //
    }
}
