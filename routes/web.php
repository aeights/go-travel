<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogUserController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\WisataController;
use App\Models\Wisata;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

// AUTH
Route::get('/login',[LoginController::class,'show']);

Route::post('/login/process',[LoginController::class,'auth']);

Route::get('/register',[RegisterController::class,'show']);

Route::post('/register/process',[RegisterController::class,'register']);

// DASHBOARD
Route::get('/dashboard',[DashboardAdminController::class,'show']);

// WISATA
Route::get('/dashboard/wisata',[WisataController::class,'show']);

Route::get('/dashboard/wisata/tambah',[WisataController::class,'showAdd']);

Route::post('/tambah-wisata',[WisataController::class,'add']);

Route::get('/dashboard/wisata/edit/{id}',[WisataController::class,'showEdit']);

Route::post('/edit-wisata',[WisataController::class,'edit']);

Route::get('/hapus-wisata/{id}',[WisataController::class,'delete']);

// BLOG
Route::get('/',[BlogUserController::class,'show']);