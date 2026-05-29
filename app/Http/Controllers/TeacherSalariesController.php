<?php

namespace App\Http\Controllers;

use App\Models\Teacher_salaries;
use Illuminate\Http\Request;
use Validator;
class TeacherSalariesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher_salaries = Teacher_salaries::with('teacher')->get();
        return response()->json([
            'status' => true,
            'message' => 'Teacher salaries retrieved successfully',
            'data' => $teacher_salaries
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
        $validate = Validator::make($request->all(),[
            'teacher_id'=>'required|integer|exists:teachers,id',
            'amount'=>'required|numeric',
            'payment_date'=>'required|date',
            'payment_method'=>'required|string',
            'status'=>'required|string',
            'notes'=>'nullable|string',
        ]);
        if($validate->fails()){
            return response()->json([
                'status'=>false,
                'message'=>$validate->getMessageBag()->first()
            ],422);
        }
        $teacher_salary = Teacher_salaries::create($validate->validated());
        return response()->json([
            'status'=>true,
            'message'=>'Teacher salary record created successfully',
            'data'=>$teacher_salary
        ],201);
        // 'teacher_id','amount','payment_date',' payment_method','status','notes'
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher_salaries $teacher_salaries)
    {
        $teacher_salary = Teacher_salaries::with('teacher')->findOrFail($teacher_salaries->id);
        return response()->json([
            'status' => true,
            'message' => 'Teacher salary record retrieved successfully',
            'data' => $teacher_salary
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher_salaries $teacher_salaries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher_salaries $teacher_salaries)
    {
        $validate = Validator::make($request->all(),[
            'teacher_id'=>'required|integer|exists:teachers,id',
            'amount'=>'required|numeric',
            'payment_date'=>'required|date',
            'payment_method'=>'required|string',
            'status'=>'required|string',
            'notes'=>'nullable|string',
        ]);
        if($validate->fails()){
            return response()->json([
                'status'=>false,
                'message'=>$validate->getMessageBag()->first()
            ],422);
        }
        $teacher_salaries->update($validate->validated());
        return response()->json([
            'status'=>true,
            'message'=>'Teacher salary record updated successfully',
            'data'=>$teacher_salaries
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher_salaries $teacher_salaries)
    {
        $teacher_salaries = Teacher_salaries::findOrFail($teacher_salaries->id);
        $teacher_salaries->delete();
        return response()->json([
            'status' => true,
            'message' => 'Teacher salary record deleted successfully'
        ]);
    }
}
