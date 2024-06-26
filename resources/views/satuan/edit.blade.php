@extends('layout.app')

@section('title', ' - Edit')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Satuan Barang</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header bg-info d-flex justify-content-between align-items-center" style="background-color: #87CEEB;">
                <h4 class="text-dark">Edit Data Satuan Barang</h4>
            </div>
            <div class="card-body">
                <form action="/{{auth()->user()->level}}/satuan/{{$satuan->id}}" method="POST" class="modern-form">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" value="{{$satuan->nama}}" name="nama" style="border-radius: 8px; padding: 10px;">
                    </div>
                    <div class="button-group mt-3">
                        <button type="submit" class="btn btn-success btn-lg btn-block" style="border-radius: 8px;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/{{auth()->user()->level}}/satuan" class="btn btn-secondary btn-lg btn-block mt-2" style="border-radius: 8px;"><i class="fas fa-caret-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
