@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1>Stok</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center text-sm">ID</th>
                        <th class="text-center text-sm">Nama Barang</th>
                        <th class="text-center text-sm">Kode</th>
                        <th class="text-center text-sm">Stok</th>
                        <th class="text-center text-sm">Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $item)
                    <tr>
                        <td class="text-center text-sm">{{ $item->id }}</td>
                        <td class="text-center text-sm">{{ $item->nama_barang }}</td>
                        <td class="text-center text-sm">{{ $item->kode }}</td>
                        <td class="text-center text-sm">{{ $item->stok }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($item->brng_masuk)->format('d-m-Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
</div><!-- /.content-wrapper -->
@endsection