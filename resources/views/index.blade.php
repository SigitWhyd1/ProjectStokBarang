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
                                        </tr>
                                        <div class="modal fade" id="modal-hapus{{ $d->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Konfirmasi Hapus Barang</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Yakin Menghapus Barang Ini? <b>{{ $d->nama_barang }}</b></p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <form action="{{ route('barang.delete', ['id' => $d->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    @endforeach
                                    @if($barang->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center text-sm">No data found</td>
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
