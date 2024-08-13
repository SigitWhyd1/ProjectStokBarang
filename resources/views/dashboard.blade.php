@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manajemen Stok</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Manajemen Stok</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Kotak kecil (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- kotak kecil -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $totalStok }}</h3>
                            <p>Stok</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <a href="{{ route('stokDetail') }}" class="small-box-footer">Info selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- kotak kecil -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalKeluar }}</h3>
                            <p>Barang Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <a href="{{ route('keluarDetail') }}" class="small-box-footer">Info selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- kotak kecil -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $lowStockItems }}</h3>
                            <p>Barang Hampir Habis</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <a href="{{ route('lowStockDetail') }}" class="small-box-footer">Info selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- kotak kecil -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $outOfStockItems }}</h3>
                            <p>Kehabisan Stok</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <a href="{{ route('outOfStockDetail') }}" class="small-box-footer">Info selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
