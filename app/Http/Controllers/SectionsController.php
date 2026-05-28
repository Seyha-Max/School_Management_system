<?php

namespace App\Http\Controllers;

use App\Models\Sections;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\_Protocol\Node\StringNode;
use Illuminate\Support\Facades\Validator;
class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Sections::all();
        return response()->json([
            'status' => true,
            'message' => 'Sections retrieved successfully',
            'data' => $sections
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $validate = Validator::make($request->all(), [
            'class_id' => 'required|exists:classes,id',
            'section_name' => 'required|string|max:255',
        ]);
        if($validate->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validate->errors()
            ], 422);
        }
        $section = Sections::create([
            'class_id'=>$request->class_id,
            'section_name'=>$request->section_name
        ]);
        return response()->json([
            'status'=> true,
            'message' => 'Section created successfully', 
            'data' => $section], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sections $sections , $id)
    {
        $section = Sections::find($id);
        if(!$section){
            return response()->json([
                'status' => false,
                'message' => 'Section not found'
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Section retrieved successfully',
            'data' => $section
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sections $sections , $id)
    {
        $section = Sections::find($id);
        if(!$section){
            return response()->json([
                'status' => false,
                'message' => 'Section not found'
            ], 404);
        }
        $validate = Validator::make($request->all(), [
            'class_id' => 'required|exists:classes,id',
            'section_name' => 'required|string|max:255',
        ]);
        if($validate->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validate->errors()
            ], 422);
        }
        $section->update([
            'class_id'=>$request->class_id,
            'section_name'=>$request->section_name
        ]);
        return response()->json([
            'status'=> true,
            'message' => 'Section updated successfully', 
            'data' => $section], 200);  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sections $sections)
    {
        $section = Sections::find($sections->id);
        if(!$section){
            return response()->json([
                'status' => false,
                'message' => 'Section not found'
            ], 404);
        }
        $section->delete();
        return response()->json([
            'status' => true,
            'message' => 'Section deleted successfully'
        ], 200);
    }
}
