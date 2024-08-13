<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LgnController;
use App\Http\Controllers\BrngController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/lgn', [LgnController::class, 'index'])->name('lgn');
Route::post('/lgn-proses', [LgnController::class, 'lgn_proses'])->name('lgn-proses');
Route::get('/logout', [LgnController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/barang', [HomeController::class, 'index'])->name('index');
    Route::get('/create', [HomeController::class, 'create'])->name('barang.create');
    Route::post('/store', [HomeController::class, 'store'])->name('barang.store');
    Route::put('/barang/{id}', [HomeController::class, 'update'])->name('barang.update');
    
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('barang.edit');
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('barang.update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('barang.delete');
    
    // Jika BrngController untuk barang yang masuk/keluar, sebaiknya gunakan route terpisah
    Route::get('/indexmasuk', [BrngController::class, 'indexmasuk'])->name('indexmasuk');
    Route::get('/indexkeluar', [BrngController::class, 'indexkeluar'])->name('indexkeluar');
    
    //Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 


