@extends('layout.app')

@section('title', ' - Detail Laporan')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Laporan</h1>
    </div>

    <div class="section-body">
        <div class="card shadow">
            <div class="card-header bg-info d-flex justify-content-between align-items-center" style="background-color: #87CEEB;">
                <h4 class="text-dark">Detail Laporan</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode transaksi</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Diskon</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->kode_transaksi}}</td>
                            <td>{{$item->barang}}</td>
                            <td>{{$item->formatRupiah('harga')}}</td>
                            <td>{{$item->jumlah}}</td>
                            <td>{{$item->diskon}}%</td>
                            <td>{{$item->formatRupiah('total')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-white">
                <a href="/{{auth()->user()->level}}/laporan" class="btn btn-warning btn-sm"><i class="fas fa-caret-left"></i> Kembali</a>
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
</script>
@endpush
