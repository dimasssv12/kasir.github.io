@extends('layout.app')

@section('title', ' - Laporan')

@section('content')
<section class="section">
    <div class="section-header">
        <h1 class="text-center">Laporan</h1>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow">
                    @if(auth()->user()->level == 'admin')
                    <div class="card-header bg-lightblue text-white">
                        <h4 class="text-center">Filter Tanggal</h4>
                    </div>
                    <div class="card-body">
                        <form action="/{{auth()->user()->level}}/laporan/cari">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1" for="tanggalDari">Dari</label>
                                        <input type="date" class="form-control" name="dari" id="tanggalDari" max="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1" for="tanggalSampai">Sampai</label>
                                        <input type="date" class="form-control" name="sampai" id="tanggalSampai" max="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success"><i class="fa fa-search"></i> Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                    @if(auth()->user()->level == 'kasir')
                    <div class="card-header bg-lightblue text-white">
                        <h4 class="text-center">Riwayat Transaksi</h4>
                    </div>
                    @endif
                    <div class="card-body p-2">
                        <div class="table-responsive">
                            <table class="table table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Kode Kasir</th>
                                        <th>Total</th>
                                        <th>Bayar</th>
                                        <th>Kembali</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transaksi as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->kode_transaksi}}</td>
                                        <td>{{$item->tanggal}}</td>
                                        <td>{{$item->kode_kasir}}</td>
                                        <td>{{$item->formatRupiah('total')}}</td>
                                        <td>{{$item->formatRupiah('bayar')}}</td>
                                        <td>{{$item->formatRupiah('kembali')}}</td>
                                        <td>
                                            <a href="/{{auth()->user()->level}}/laporan/{{$item->kode_transaksi}}"
                                                class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i> Detail</a>
                                            <a href="/{{auth()->user()->level}}/laporan/{{$item->kode_transaksi}}/print" target="_blank"
                                                class="btn btn-sm btn-outline-danger"><i class="fa fa-print"></i> Print</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@push('script')
<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });

    var tanggal_dari = document.getElementById('tanggalDari');
    var tanggal_sampai = document.getElementById('tanggalSampai');

    // Mendapatkan tanggal hari ini
    var today = new Date();
    var year = today.getFullYear();
    var month = String(today.getMonth() + 1).padStart(2, '0');
    var day = String(today.getDate()).padStart(2, '0');


    var formattedDate = year + '-' + month + '-' + day;

    tanggal_dari.value = formattedDate;
    tanggal_sampai.value = formattedDate;
</script>
@endpush
