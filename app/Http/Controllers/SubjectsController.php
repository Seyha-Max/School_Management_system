<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;
use Validator;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subjects::all();
        return response()->json([
            'status' => true,
            'message' => 'Subjects retrieved successfully',
            'data' => $subjects
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
            'subject_name'=>'required|string',
        ]);
        if($validate->fails()){
            return response()->json([
                'status'=>false,
                'message'=>$validate->getMessageBag()->first()
            ]);
        }
        $subject = Subjects::create($validate->validated());
        return response()->json([
            'status' => true,
            'message' => 'Subject created successfully',
            'data' => $subject
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subjects $subjects)
    {
        $subject = Subjects::findOrFail($subjects->id);
        return response()->json([
            'status' => true,
            'message' => 'Subject retrieved successfully',
            'data' => $subject
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subjects $subjects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subjects $subjects)
    {
        $validate = Validator::make($request->all() , [
            'subject_name'=>'required|string',
        ]);
        if($validate->fails()){
            return response()->json([
                'status'=>false,
                'message'=>$validate->getMessageBag()->first()
            ]);
        }
        $subjects->update($validate->validated());
        return response()->json([
            'status' => true,
            'message' => 'Subject updated successfully',
            'data' => $subjects
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subjects $subjects)
    {
        $subjects->delete();
        return response()->json([
            'status' => true,
            'message' => 'Subject deleted successfully'
        ]);
    }
}
