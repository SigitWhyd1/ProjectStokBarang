<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;

class BrngController extends Controller
{
    // Method untuk menampilkan halaman barang masuk
    public function indexmasuk(){
        $barang = Barang::all();
        return view('barangmasuk',compact('barang'));
    }

    public function indexkeluar(){
        $barang = Barang::all();
        return view('barangkeluar',compact('barang'));
    }
    
    
}

