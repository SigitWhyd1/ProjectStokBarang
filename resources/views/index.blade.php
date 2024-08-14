@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools">
                                <form action="{{ route('index') }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ $request->get('search') }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center text-sm">ID</th>
                                        <th class="text-center text-sm">Nama Barang</th>
                                        <th class="text-center text-sm">Kode</th>
                                        <th class="text-center text-sm">Stok</th>
                                        <th class="text-center text-sm">Tanggal Masuk</th>
                                        <th class="text-center text-sm">Barang Keluar</th>
                                        <th class="text-center text-sm">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $d)
                                        <tr>
                                            <td class="text-center text-sm">{{ $d->id }}</td>
                                            <td class="text-center text-sm">{{ $d->nama_barang }}</td>
                                            <td class="text-center text-sm">{{ $d->kode }}</td>
                                            <td class="text-center text-sm">{{ $d->stok }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($d->brng_masuk)->format('d-m-Y') }}</td>
                                            <td class="text-center text-sm">{{ $d->brng_keluar }}</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addStockModal-{{ $d->id }}">Tambah Stok</a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="addStockModal-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="addStockModalLabel-{{ $d->id }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="addStockModalLabel-{{ $d->id }}">Tambah Stok Barang</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('barang.addStock', $d->id) }}" method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="jumlah_stok">Jumlah Stok</label>
                                                                        <input type="number" id="jumlah_stok" name="jumlah_stok" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn btn-primary">Tambah Stok</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if($barang->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center text-sm">Tidak ada data</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
