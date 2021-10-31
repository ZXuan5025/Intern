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

//Route::post('register/', [StudentController::class,'accept']);

Route::any('home/', [StudentController::class,'home']);

//Route::get('register', [StudentController::class,'register']);

//Route::post('/',[StudentController::class,'accept']);

//Route::post('signin/', [StudentController::class,'store']);

Route::any('/','App\Http\Controllers\StudentController@accept');
Route::any('register/','App\Http\Controllers\StudentController@store');
Route::post('/update',[StudentController::class, 'update']);
Route::post('/change_password',[StudentController::class, 'cpassword']);
Route::post('/delete',[StudentController::class, 'delete']);

Route::get('signin',function(){
    return view('student.signin');
})->name('student.signin');

Route::get('profile',function(){
    return view('student.profile');
})->name('student.profile');

Route::get('register',function(){
    return view('student.register');
})->name('student.register');

Route::get('home',function(){
    return view('student.home');
})->name('student.home');

Route::get('contact',function(){
    return view('student.contact');
})->name('student.contact');

Route::any('logout', function () {
    return view('student.logout');
})->name('student.logout');