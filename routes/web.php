<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
//Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm');
//Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
//Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');
//
//Route::post('/login/admin', 'Auth\LoginController@adminLogin');
//Route::post('/login/writer', 'Auth\LoginController@writerLogin');
//Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
//Route::post('/register/writer', 'Auth\RegisterController@createWriter');
//
//Route::view('/home', 'home')->middleware('auth');
//Route::view('/admin', 'admin');
//Route::view('/writer', 'writer');

Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class,'showAdminLoginForm']);
Route::get('/login/writer', [App\Http\Controllers\Auth\LoginController::class,'showWriterLoginForm']);
Route::get('/register/admin',[App\Http\Controllers\Auth\RegisterController::class,'showAdminRegisterForm'] );
Route::get('/register/writer', [App\Http\Controllers\Auth\RegisterController::class,'showWriterRegisterForm']);

Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class,'adminLogin']);
Route::post('/login/writer',  [App\Http\Controllers\Auth\LoginController::class,'writerLogin']);
Route::post('/register/admin',  [App\Http\Controllers\Auth\RegisterController::class,'createAdmin']);
Route::post('/register/writer',  [App\Http\Controllers\Auth\RegisterController::class,'createWriter']);

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin')->middleware('auth:admin');;
Route::view('/writer', 'writer')->middleware('auth:writer');;
