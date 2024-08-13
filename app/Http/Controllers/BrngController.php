<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;

class BrngController extends Controller
{
    // Method untuk menampilkan halaman barang masuk
    public function indexmasuk(Request $request){
        $barang = new Barang;

        if($request->get('search')){
            $barang = $barang->where('nama_barang', 'LIKE', '%'.$request->get('search').'%');
        }

        $barang = $barang->get();

        return view('barangmasuk',compact('barang', 'request'));
    }

    public function indexkeluar(Request $request){
        $barang = new Barang;

        if($request->get('search')){
            $barang = $barang->where('nama_barang', 'LIKE', '%'.$request->get('search').'%');
        }

        $barang = $barang->get();

        return view('barangkeluar',compact('barang', 'request'));
    }
}

