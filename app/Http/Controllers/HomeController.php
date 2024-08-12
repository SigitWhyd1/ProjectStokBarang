<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function dashboard(){
        return view('dashboard');
    }

    public function index(){
        $barang = Barang::get();
        return view('index', compact('barang'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nama_barang'   => 'required|string|max:255',
            'kode'          => 'required|string|max:100',
            'stok'          => 'required|integer',
            'brng_masuk'    => 'required|date',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $barang = new Barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->kode        = $request->kode;
        $barang->stok        = $request->stok;
        $barang->brng_masuk  = $request->brng_masuk;
        $barang->save();

        return redirect()->route('index');
    }

    public function edit($id){
        $barang = Barang::find($id);
        return view('edit', compact('barang'));
    }

    public function update(Request $request, $id){
        $barang = Barang::find($id);

        $validator = Validator::make($request->all(),[
            'nama_barang'   => 'required|string|max:255',
            'kode'          => 'required|string|max:100',
            'stok'          => 'required|integer',
            'brng_masuk'    => 'required|date',
            'brng_keluar'   => 'required|integer|min:0',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Kurangi stok dengan jumlah barang keluar
        if ($barang->stok >= $request->brng_keluar) {
            $barang->stok -= $request->brng_keluar;
        } else {
            return redirect()->back()->withInput()->with('error', 'Stok barang tidak mencukupi.');
        }

        $barang->nama_barang = $request->nama_barang;
        $barang->kode = $request->kode;
        $barang->brng_masuk = $request->brng_masuk;
        $barang->brng_keluar = $request->brng_keluar;
        $barang->save();

        return redirect()->route('index');
    }

    public function delete(Request $request, $id){
        $barang = Barang::find($id);

        if($barang){
            $barang->delete();
        }

        return redirect()->route('index');
    }
}
