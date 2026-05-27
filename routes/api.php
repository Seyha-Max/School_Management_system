<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

Route::controller(RoleController::class)->group(function(){
    Route::get('/roles' , 'index');
    Route::get('/roles/{id}' , 'show');
    Route::post('/roles' , 'store');
    Route::put('/roles/{id}' , 'update');
    Route::delete('/roles/{id}' , 'destroy');
});