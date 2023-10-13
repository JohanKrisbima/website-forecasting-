<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AddDataController;
use App\Http\Controllers\PenjualanController;

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

Route::get('/home', [HomeController::class, 'index'])->middleware('auth');
Route::get('/table', [TableController::class, 'index'])->middleware('auth');
Route::get('/dataPenjualan', [PenjualanController::class, 'index'])->middleware('auth');
Route::get('/editData/{penjualan:id}', [PenjualanController::class, 'editData'])->middleware('auth');
Route::post('/editData/update/{penjualan:id}', [PenjualanController::class, 'update'])->middleware('auth');
Route::get('/delete/{penjualan:id}', [PenjualanController::class, 'destroy'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/addData', [AddDataController::class, 'index'])->middleware('auth');
Route::post('/addData', [AddDataController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/alpha/update', [TableController::class, 'update'])->name('alpha.update');
