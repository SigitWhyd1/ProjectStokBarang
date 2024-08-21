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



Route::get('/', [LgnController::class, 'index'])->name('/');
Route::post('/lgn-proses', [LgnController::class, 'lgn_proses'])->name('lgn-proses');


    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/barang', [HomeController::class, 'index'])->name('index');
    Route::get('/create', [HomeController::class, 'create'])->name('barang.create');
    Route::post('/store', [HomeController::class, 'store'])->name('barang.store');
    Route::put('/barang/{id}', [HomeController::class, 'update'])->name('barang.update');
    
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('barang.edit');
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('barang.update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('barang.delete');


    Route::get('/indexmasuk', [BrngController::class, 'indexmasuk'])->name('indexmasuk');
    Route::get('/indexkeluar', [BrngController::class, 'indexkeluar'])->name('indexkeluar');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 

    Route::get('/stok-detail', [DashboardController::class, 'stokDetail'])->name('stokDetail');
    Route::get('/keluar-detail', [DashboardController::class, 'keluarDetail'])->name('keluarDetail');
    Route::get('/low-stock-detail', [DashboardController::class, 'lowStockDetail'])->name('lowStockDetail');
    Route::get('/out-of-stock-detail', [DashboardController::class, 'outOfStockDetail'])->name('outOfStockDetail');

    Route::get('barang/{id}/tambah-stok', [HomeController::class, 'showAddStockForm'])->name('barang.showAddStockForm');
    Route::post('barang/{id}/tambah-stok', [HomeController::class, 'addStock'])->name('barang.addStock');



