<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('student', StudentController::class);

Route::post('register/', [StudentController::class,'home']);

//Route::get('student.register', 'StudentController@register')->name('student.register');

Route::post('register/', [StudentController::class,'accept']);

Route::post('home', [StudentController::class,'home']);

Route::post('signin/', [StudentController::class,'store']);

Route::get('register', [StudentController::class,'register']);

Route::get('signin',function(){
    return view('student.signin');
})->name('student.signin');

Route::get('register',function(){
    return view('student.register');
})->name('student.register');

Route::get('home',function(){
    return view('student.home');
})->name('student.home');
