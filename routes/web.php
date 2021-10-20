<?php

use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;


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


 // Upload File use Route View method
Route::view('/upload_image', 'upload.image');

Route::post('/upload_image', [PostController::class,'upload_image'])->name('upload_image');
Route::get('/file', [PostController::class,'file'])->name('file');

// customer Dumy Data add
Route::get('/add_customer', function () {
   for ($i=0; $i <= 10 ; $i++) {
        Customer::create([
            'name' => "moshiur $i",
            'email' => "moshiur$i@gmail.com",
            'phone' => "0174578745$i",
            'country' => "Bangladesh$i",
            'votes' => "12$i",
        ]);
   }
});


// Get customer Using Query Builder
Route::get('/get_customer', [CustomerController::class, 'get_customer']);



