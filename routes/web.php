<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [IndexController::class,'index']);
Route::get('/index', [IndexController::class,'index']);

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('home/order', [App\Http\Controllers\HomeController::class, 'addOrder'])->name('home.order');
    
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/menu', MenuController::class);
    Route::resource('/user', UserController::class)->middleware('isowner');
});
