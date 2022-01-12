<?php

use App\Http\Controllers\RuangController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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


Route::get('/', function() {
    return view('login/index');
 }) -> name('login')->middleware('guest');

Route::get('/login', function() {
    return view('login/index');
 }) -> name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::resource('/ruang', RuangController::class)->middleware('auth');
Route::resource('/jabatan', JabatanController::class)->middleware('auth');
Route::resource('/user', UserController::class)->middleware('auth');

