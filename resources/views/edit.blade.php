@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('barang.update', ['id' => $barang->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputNamaBarang">Nama Barang</label>
                                    <input type="text" class="form-control" id="exampleInputNamaBarang" name="nama_barang" value="{{ $barang->nama_barang }}" placeholder="Enter Nama Barang">
                                    @error('nama_barang')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputKode">Kode</label>
                                    <input type="text" name="kode" class="form-control" id="exampleInputKode" value="{{ $barang->kode }}" placeholder="Enter Kode">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputStok">Stok</label>
                                    <input type="number" name="stok" class="form-control" id="exampleInputStok" value="{{ $barang->stok }}" placeholder="Enter Stok">
                                    @error('stok')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBarangKeluar">Barang Keluar</label>
                                    <input type="number" name="brng_keluar" class="form-control" id="exampleInputBarangKeluar" value="{{ old('brng_keluar', $barang->brng_keluar) }}" placeholder="Enter Barang Keluar">
                                    @error('brng_keluar')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputTanggal_Keluar">Tanggal Keluar</label>
                                    <input type="date" name="tanggal_keluar" class="form-control" id="exampleInputTanggal_Keluar" placeholder="Enter Tanggal Keluar">
                                    @error('tanggal_keluar')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer" style="padding-top: 0;">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
@endsection
