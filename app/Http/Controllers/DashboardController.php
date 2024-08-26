<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStok = Barang::sum('stok');
        $totalKeluar = Barang::sum('brng_keluar'); 
        $lowStockItems = Barang::where('stok', '>', 0)
                                ->where('stok', '<=', 10)
                                ->count();
        $outOfStockItems = Barang::where('stok', 0)->count();
    
        return view('dashboard', compact('totalStok', 'totalKeluar', 'lowStockItems', 'outOfStockItems'));
    }

    public function stokDetail()
    {
        $barang = Barang::all();
        return view('stok-detail', compact('barang'));
    }

    public function keluarDetail()
    {
        $barang = Barang::whereNotNull('tanggal_keluar')->get();
        return view('keluar-detail', compact('barang'));
    }

    public function lowStockDetail()
    {
        $barang = Barang::where('stok', '>', 0)
                        ->where('stok', '<=', 10)
                        ->get();
        return view('low-stock-detail', compact('barang'));
    }

    public function outOfStockDetail()
    {
        $barang = Barang::where('stok', 0)->get();
        return view('out-of-stock-detail', compact('barang'));
    }

}
