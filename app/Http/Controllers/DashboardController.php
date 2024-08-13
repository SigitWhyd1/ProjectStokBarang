<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStok = Barang::sum('stok');
        $totalTerjual = Barang::sum('terjual');
        $lowStockItems = Barang::where('stok', '<=', 10)->count();
        $outOfStockItems = Barang::where('stok', 0)->count();
    
        // Debugging data
        //dd($totalStok, $totalTerjual, $lowStockItems, $outOfStockItems);
    
        return view('dashboard', compact('totalStok', 'totalTerjual', 'lowStockItems', 'outOfStockItems'));
    }
    
}