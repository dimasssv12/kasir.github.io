@extends('layout.app')

@section('title', ' - Dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="alert alert-info">
        <p>Hallo <span class="font-weight-bold">{{auth()->user()->nama}}</span>, Kamu Login Sebagai <span class="font-weight-bold">{{auth()->user()->level}}</span>.</p>
    </div>

    @if(auth()->user()->level=='kasir')
    <div class="section-body">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Transaksi</h4>
                        </div>
                        <div class="card-body">
                            {{$transaksi->count()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Transaksi Hari ini</h4>
                        </div>
                        <div class="card-body">
                            {{$transaksi_hari_ini->count()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header bg-white">
                <h4 class="text-info"><i class="fas fa-certificate"></i> Detail Transaksi</h4>
            </div>
            <div class="card-body p-2">
                <div class="table-responsive">
                    <table class="table table-hover" id="table">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Kode Transaksi <i class="fas fa-barcode"></i></th>
                                <th class="text-center">Nama Barang <i class="fas fa-box"></i></th>
                                <th class="text-center">Harga <i class="fas fa-money-bill-wave"></i></th>
                                <th class="text-center">Jumlah <i class="fas fa-sort-numeric-up"></i></th>
                                <th class="text-center">Diskon <i class="fas fa-percent"></i></th>
                                <th class="text-center">Total <i class="fas fa-dollar-sign"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail as $item)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$item->kode_transaksi}}</td>
                                    <td>{{$item->barang}}</td>
                                    <td class="text-center">{{$item->formatRupiah('harga')}}</td>
                                    <td class="text-center">{{$item->jumlah}}</td>
                                    <td class="text-center">{{$item->diskon}}%</td>
                                    <td class="text-center">{{$item->formatRupiah('total')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif



    @if(auth()->user()->level=='admin')
    <div class="section-body">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-cubes"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Barang</h4>
                        </div>
                        <div class="card-body">
                            {{$barang->count()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1" id="stokCard">
                    <div class="card-icon bg-info">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Stok Kosong</h4>
                        </div>
                        <div class="card-body">
                            {{$stok_kosong->count()}}
                        </div>
                        <a href="stok-kosong" data-toggle="modal" data-target="#stok-kosong">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4> Total Transaksi</h4>
                        </div>
                        <div class="card-body">
                            {{$transaksi->count()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Transaksi Hari ini</h4>
                        </div>
                        <div class="card-body">
                            {{$transaksi_hari_ini->count()}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header bg-white">
                        <h4 class="text-info"><i class="fas fa-certificate"></i> Detail Transaksi</h4>
                    </div>
                    <div class="card-body p-2">
                        <div class="table-responsive">
                            <table class="table table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Kode Transaksi <i class="fas fa-barcode"></i></th>
                                        <th class="text-center">Nama Barang <i class="fas fa-box"></i></th>
                                        <th class="text-center">Harga <i class="fas fa-money-bill-wave"></i></th>
                                        <th class="text-center">Jumlah <i class="fas fa-sort-numeric-up"></i></th>
                                        <th class="text-center">Diskon <i class="fas fa-percent"></i></th>
                                        <th class="text-center">Total <i class="fas fa-dollar-sign"></i></th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($detail as $item)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="text-center">{{$item->kode_transaksi}}</td>
                                        <td>{{$item->barang}}</td>
                                        <td class="text-center">{{$item->formatRupiah('harga')}}</td>
                                        <td class="text-center">{{$item->jumlah}}</td>
                                        <td class="text-center">{{$item->diskon}}%</td>
                                        <td class="text-center">{{$item->formatRupiah('total')}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

    @endif
</section>
@include('dashboard.kosong')
@endsection

@push('script')
<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });

    $(document).ready(function () {
        $('#data-table').DataTable();
    });

    var colors = ['#FCFF52', '#ffff'];
    var lastColorIndex = -1;

    function changeBackgroundColor() {
        var card = document.getElementById('stokCard');
        var randomColorIndex = Math.floor(Math.random() * colors.length);
        while (randomColorIndex === lastColorIndex) {
            randomColorIndex = Math.floor(Math.random() * colors.length);
        }

        var randomColor = colors[randomColorIndex];
        card.style.backgroundColor = randomColor;
        lastColorIndex = randomColorIndex;
    }

    var stockCount = {{$stok_kosong->count()}};
    if (stockCount > 0) {
        setInterval(changeBackgroundColor, 300);
    }
</script>
@endpush
