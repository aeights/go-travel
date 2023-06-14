<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogPostController;
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
Route::middleware(['guest'])->group(function (){
    // AUTH
    Route::get('/login',[LoginController::class,'show'])->name('login');

    Route::post('/login/process',[LoginController::class,'auth']);

    Route::get('/register',[RegisterController::class,'show']);

    Route::post('/register/process',[RegisterController::class,'register']);
    
});

// BLOG
Route::get('/',[BlogUserController::class,'show']);

Route::get('/wisata/{slug}',[BlogPostController::class,'show']);

Route::post('/search/wisata',[BlogUserController::class,'search']);

Route::get('/category/{ctg}',[BlogUserController::class,'category']);

Route::get('/logout',[LoginController::class,'logout']);


Route::middleware(['auth','role:admin'])->group(function (){
    // DASHBOARD
    Route::get('/dashboard',[DashboardAdminController::class,'show']);
    
    // WISATA
    Route::get('/dashboard/wisata',[WisataController::class,'show']);
    
    Route::get('/dashboard/wisata/tambah',[WisataController::class,'showAdd']);
    
    Route::post('/tambah-wisata',[WisataController::class,'add']);
    
    Route::get('/dashboard/wisata/edit/{id}',[WisataController::class,'showEdit']);
    
    Route::post('/edit-wisata',[WisataController::class,'edit']);
    
    Route::get('/hapus-wisata/{id}',[WisataController::class,'delete']);

    // REPORTING
    Route::get('/dashboard/disimpan',[DashboardAdminController::class,'favorite']);
});

Route::middleware(['auth','role:user'])->group(function (){

    Route::get('/favorite/{id}',[BlogPostController::class,'favorite']);

    Route::get('/hapus-favorite/{id}',[BlogPostController::class,'hapusFavorite']);
});