@extends('layout.app')

@section('title', ' - Detail')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Barang</h1>
    </div>

    <div class="section-body">
        <div class="card shadow">
            <div class="card-header bg-info d-flex justify-content-between align-items-center" style="background-color: #87CEEB;">
                <h4 class="text-dark">View Data Barang</h4>
            </div>
            <div class="card-body">
                <form action="/barang/store" method="POST" class="modern-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control" name="kode" value="{{$barang->kode}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{$barang->nama}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" class="form-control" value="{{$barang->kategori->nama}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" class="form-control" value="{{$barang->satuan->nama}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga_beli">Harga Beli</label>
                                <input type="number" class="form-control" name="harga_beli" value="{{$barang->harga_beli}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga_jual">Harga Jual</label>
                                <input type="number" class="form-control" name="harga_jual" value="{{$barang->harga_jual}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" name="stok" value="{{$barang->stok}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="diskon">Diskon</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="diskon" value="{{$barang->diskon}}" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-group mt-3">
                        <a href="/{{auth()->user()->level}}/barang" class="btn btn-warning btn-lg btn-block" style="border-radius: 8px;"><i class="fas fa-caret-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
