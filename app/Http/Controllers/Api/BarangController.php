<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Barang::orderBy('nama_barang', 'asc')->get();
        return response()->json([
            'status' => true,
            'message'=> 'Data Ditemukan',
            'data'   => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_barang'   => 'required',
            'kode'          => 'required',
            'stok'          => 'required|integer',
            'brng_masuk'    => 'required|date',
            'brng_keluar'   => 'nullable|date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message'=> 'Gagal Menambahkan Barang',
                'data'   => $validator->errors()
            ]);
        }

        $dataBarang = new Barang();
        $dataBarang->nama_barang = $request->nama_barang;
        $dataBarang->kode = $request->kode;
        $dataBarang->stok = $request->stok;
        $dataBarang->brng_masuk = $request->brng_masuk;
        $dataBarang->brng_keluar = $request->brng_keluar;
        $dataBarang->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil Menambahkan Barang'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Barang::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data Ditemukan',
                'data'    => $data
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message'=> 'Data Tidak Ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataBarang = Barang::find($id);
        if (empty($dataBarang)) {
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }

        $rules = [
            'nama_barang' => 'required',
            'kode'        => 'required',
            'stok'        => 'required|integer',
            'brng_masuk'  => 'required|date',
            'brng_keluar' => 'nullable|date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message'=> 'Gagal Mengupdate Barang',
                'data'   => $validator->errors()
            ]);
        }

        $dataBarang->nama_barang = $request->nama_barang;
        $dataBarang->kode = $request->kode  ;
        $dataBarang->stok = $request->stok;
        $dataBarang->brng_masuk = $request->brng_masuk;
        $dataBarang->brng_keluar = $request->brng_keluar;
        $dataBarang->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil Mengupdate Barang'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataBarang = Barang::find($id);
        if (empty($dataBarang)) {
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }

        $dataBarang->delete();

        return response()->json([
            'status' => true,
            'message'=> 'Berhasil Menghapus Barang'
        ]);
    }
}

