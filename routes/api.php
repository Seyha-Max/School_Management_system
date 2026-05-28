<?php

use App\Http\Controllers\ClassesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TeacherAttendanceController;
use App\Http\Controllers\TeacherClassesController;
use App\Http\Controllers\TeacherSalariesController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\TeacherSubjectsController;
use App\Http\Controllers\Usercontroller;

// 1. role
Route::controller(RoleController::class)->group(function(){
    Route::get('/roles' , 'index')->name('roles.index');
    Route::get('/roles/{id}' , 'show')->name('roles.show');
    Route::post('/roles' , 'store')->name('roles.store');
    Route::put('/roles/{id}' , 'update')->name('roles.update');
    Route::delete('/roles/{id}' , 'destroy')->name('roles.destroy');
});

// 2. class
Route::controller(ClassesController::class)->group(function(){
    Route::get('/class' , 'index')->name('class.index');
    Route::get('/class/{id}' , 'show')->name('class.show');
    Route::post('/class' , 'store')->name('class.store');
    Route::put('/class/{id}' , 'update')->name('class.update');
    Route::delete('/class/{id}' , 'destroy')->name('class.destroy');
});

// 3. section
Route::controller(SectionsController::class)->group(function(){
    Route::get('/section' , 'index')->name('section.index');
    Route::get('/section/{id}' , 'show')->name('section.show');
    Route::post('/section' , 'store')->name('section.store');
    Route::put('/section/{id}' , 'update')->name('section.update');
    Route::delete('/section/{id}' , 'destroy')->name('section.destroy');
});

// 4. teacher
Route::controller(TeachersController::class)->group(function(){
    Route::get('/teacher' , 'index')->name('teacher.index');
    Route::get('/teacher/{id}' , 'show')->name('teacher.show');
    Route::post('/teacher' , 'store')->name('teacher.store');
    Route::put('/teacher/{id}' , 'update')->name('teacher.update');
    Route::delete('/teacher/{id}' , 'destroy')->name('teacher.destroy');
});

// 5. student
Route::controller(StudentsController::class)->group(function(){
    Route::get('/student' , 'index')->name('student.index');
    Route::get('/student/{id}' , 'show')->name('student.show');
    Route::post('/student' , 'store')->name('student.store');
    Route::put('/student/{id}' , 'update')->name('student.update');
    Route::delete('/student/{id}' , 'destroy')->name('student.destroy');
});

// 6. subject
Route::controller(SubjectsController::class)->group(function(){
    Route::get('/subject' , 'index')->name('subject.index');
    Route::get('/subject/{id}' , 'show')->name('subject.show');
    Route::post('/subject' , 'store')->name('subject.store');
    Route::put('/subject/{id}' , 'update')->name('subject.update');
    Route::delete('/subject/{id}' , 'destroy')->name('subject.destroy');
});

// 7. teacher_class
Route::controller(TeacherClassesController::class)->group(function(){
    Route::get('/tclass' , 'index')->name('tclass.index');
    Route::get('/tclass/{id}' , 'show')->name('tclass.show');
    Route::post('/tclass' , 'store')->name('tclass.store');
    Route::put('/tclass/{id}' , 'update')->name('tclass.update');
    Route::delete('/tclass/{id}' , 'destroy')->name('tclass.destroy');
});

// 8. teacher_subject
Route::controller(TeacherSubjectsController::class)->group(function(){
    Route::get('/tsubject' , 'index')->name('tsubject.index');
    Route::get('/tsubject/{id}' , 'show')->name('tsubject.show');
    Route::post('/tsubject' , 'store')->name('tsubject.store');
    Route::put('/tsubject/{id}' , 'update')->name('tsubject.update');
    Route::delete('/tsubject/{id}' , 'destroy')->name('tsubject.destroy');
});

// 9. teacher_attendance
Route::controller(TeacherAttendanceController::class)->group(function(){
    Route::get('/tattendance' , 'index')->name('tattendance.index');
    Route::get('/tattendance/{id}' , 'show')->name('tattendance.show');
    Route::post('/tattendance' , 'store')->name('tattendance.store');
    Route::put('/tattendance/{id}' , 'update')->name('tattendance.update');
    Route::delete('/tattendance/{id}' , 'destroy')->name('tattendance.destroy');
});

// 10. teacher_salary
Route::controller(TeacherSalariesController::class)->group(function(){
    Route::get('/tsalary' , 'index')->name('tsalary.index');
    Route::get('/tsalary/{id}' , 'show')->name('tsalary.show');
    Route::post('/tsalary' , 'store')->name('tsalary.store');
    Route::put('/tsalary/{id}' , 'update')->name('tsalary.update');
    Route::delete('/tsalary/{id}' , 'destroy')->name('tsalary.destroy');
});

// 11. student_attendance
Route::controller(StudentAttendanceController::class)->group(function(){
    Route::get('/sattendance' , 'index')->name('sattendance.index');
    Route::get('/sattendance/{id}' , 'show')->name('sattendance.show');
    Route::post('/sattendance' , 'store')->name('sattendance.store');
    Route::put('/sattendance/{id}' , 'update')->name('sattendance.update');
    Route::delete('/sattendance/{id}' , 'destroy')->name('sattendance.destroy');
});

// 12. user
Route::controller(Usercontroller::class)->group(function(){
    Route::get('/user' , 'index')->name('user.index');
    Route::get('/user/{id}' , 'show')->name('user.show');
    Route::post('/user' , 'store')->name('user.store');
    Route::put('/user/{id}' , 'update')->name('user.update');
    Route::delete('/user/{id}' , 'destroy')->name('user.destroy');
});
