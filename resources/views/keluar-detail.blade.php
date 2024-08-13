@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1>Barang Keluar</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center text-sm">ID</th>
                        <th class="text-center text-sm">Nama Barang</th>
                        <th class="text-center text-sm">Kode</th>
                        <th class="text-center text-sm">Barang Keluar</th>
                        <th class="text-center text-sm">Tanggal Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $item)
                    <tr>
                        <td class="text-center text-sm">{{ $item->id }}</td>
                        <td class="text-center text-sm">{{ $item->nama_barang }}</td>
                        <td class="text-center text-sm">{{ $item->kode }}</td>
                        <td class="text-center text-sm">{{ $item->brng_keluar }}</td>
                        <td class="text-center text-sm">{{ $item->tanggal_keluar }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
</div><!-- /.content-wrapper -->
@endsection
