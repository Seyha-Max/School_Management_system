<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Usercontroller;
Route::controller(RoleController::class)->group(function(){
    Route::get('/roles' , 'index');
    Route::get('/roles/{id}' , 'show');
    Route::post('/roles' , 'store');
    Route::put('/roles/{id}' , 'update');
    Route::delete('/roles/{id}' , 'destroy');
});

Route::controller(Usercontroller::class)->group(function(){
    Route::get('/user ' , 'index');
    Route::post('/user' , 'create');
    Route::get('/user/{id}' , 'show');
    Route::put('/user/{id}' , 'update');
    Route::delete('/user/{id}' , 'destroy');
});