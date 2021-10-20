<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


Route::get('/',[StudentController::class,'create'])->name('student.create');
Route::post('/student_store',[StudentController::class,'store'])->name('student.store');
Route::get('/student_show/{id}',[StudentController::class,'show'])->name('student.show');
Route::get('/student_edit/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::post('/student_update/{id}',[StudentController::class,'update'])->name('student.update');
Route::get('/student_destroy/{id}',[StudentController::class,'destroy'])->name('student.destroy');


// Route Model Binding
Route::get('/posts/{key:title}',[PostController::class, 'index']);


// Laravel Session Practicing

Route::get('/get_session_request', [PostController::class, 'get_session_request']);
Route::get('/put_session_request', [PostController::class, 'put_session_request']);

Route::get('/get_session_helper', [PostController::class, 'get_session_helper']);
Route::get('/put_session_helper', [PostController::class, 'put_session_helper']);

Route::get('/get_session_facade', [PostController::class, 'get_session_facade']);
Route::get('/put_session_facade', [PostController::class, 'put_session_facade']);

// Log file use Practicing
Route::get('/log', function () {
   Log::emergency('Hi Emergency Message');
    Log::alert('Hi alert Message');
    Log::critical('Hi critical Message');
    Log::error('Hi error Message');
    Log::warning('Hi warning Message');
    Log::notice('Hi notice Message');
    Log::info('Hi info Message');
    Log::debug('Hi debug Message');
});


