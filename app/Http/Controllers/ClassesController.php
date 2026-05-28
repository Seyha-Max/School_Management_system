<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\_Protocol\Node\StringNode;
use Illuminate\Support\Facades\Validator;
class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::all();
        return response()->json([
            'status' => true,
            'message' => 'Classes retrieved successfully',
            'data' => $classes
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
            'class_name'=>'required|string|unique:classes,class_name'
        ]);
        if($validate->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validate->errors()
            ], 422);
        }
        $class = Classes::create([
            'class_name' => $request->class_name
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Class created successfully',
            'data' => $class
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes , $id)

    {
        $class = Classes::find($id);
        if(!$class){
            return response()->json([
                'status' => false,
                'message' => 'Class not found'
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Class retrieved successfully',
            'data' => $class
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $classes , $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $classes , $id)
    {
       $class = Classes::find($id);
       if(!$class){
        return response()->json([
            'status' => false,
            'message' => 'Class not found'
        ], 404);
       } 
       $validate = Validator::make($request->all() , [
        'class_name'=>'required|string|unique:classes,class_name,'.$id
       ]);
         if($validate->fails()){
          return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validate->errors()
          ], 422);
         }
        $class->update([
            'class_name' => $request->class_name
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Class updated successfully',  
            'data' => $class
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes , $id)
    {
        $class = Classes::find($id);
        if(!$class){
            return response()->json([
                'status' => false,
                'message' => 'Class not found'
            ], 404);
        }
        $class->delete();
        return response()->json([
            'status' => true,
            'message' => 'Class deleted successfully'
        ]);
    }
}
