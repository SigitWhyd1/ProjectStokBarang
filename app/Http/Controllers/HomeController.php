<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{

    public function dashboard(){
        return view('dashboard');
    }

    public function index(Request $request){
        $barang = new Barang;

        if($request->get('search')){
            $barang = $barang->where('nama_barang', 'LIKE', '%'.$request->get('search').'%');
        }

        $barang = $barang->get();

        return view('index', compact('barang', 'request'));
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

    public function update(Request $request, $id)
{
    // Mengambil satu barang berdasarkan ID
    $barang = Barang::find($id);

    if (!$barang) {
        return redirect()->back()->with('error', 'Barang tidak ditemukan.');
    }

    // Validasi input
    $validator = Validator::make($request->all(), [
        'nama_barang'   => 'required|string|max:255',
        'kode'          => 'required|string|max:100',
        'stok'          => 'nullable|integer|min:0', // Periksa stok_tambah untuk penambahan stok
        'brng_keluar'   => 'required|integer|min:0',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors($validator);
    }

    // Kurangi stok dengan jumlah barang keluar
    if ($barang->stok >= $request->brng_keluar) {
        $barang->stok -= $request->brng_keluar;
    } else {
        return redirect()->back()->withInput()->with('error', 'Stok barang tidak mencukupi.');
    }

    // Update data barang
    $barang->nama_barang = $request->nama_barang;
    $barang->kode = $request->kode;
    $barang->stok += $request->stok_tambah ?? 0;
    $barang->brng_keluar = $request->brng_keluar;
    $barang->save();

    return redirect()->route('index')->with('success', 'Barang berhasil diupdate');
}


    public function delete(Request $request, $id){
        $barang = Barang::find($id);

        if($barang){
            $barang->delete();
        }

        return redirect()->route('index');
    }
}
