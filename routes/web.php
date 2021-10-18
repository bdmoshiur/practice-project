<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/',[StudentController::class,'create'])->name('student.create');
Route::post('/student_store',[StudentController::class,'store'])->name('student.store');
Route::get('/student_show/{id}',[StudentController::class,'show'])->name('student.show');
Route::get('/student_edit/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::post('/student_update/{id}',[StudentController::class,'update'])->name('student.update');
Route::get('/student_destroy/{id}',[StudentController::class,'destroy'])->name('student.destroy');
