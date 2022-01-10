<?php

use App\Http\Controllers\RuangController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('login/index');
})->middleware('guest');
Route::post('/',[LoginController::class, 'authenticate']);

Route::get('/register',[RegisterController::class, 'index']);
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('/ruang', RuangController::class);
Route::resource('/jabatan', JabatanController::class);
