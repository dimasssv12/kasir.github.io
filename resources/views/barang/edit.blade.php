@extends('layout.app')

@section('title', ' - Edit')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Barang</h1>
    </div>

    <div class="section-body">
        <div class="card shadow">
            <div class="card-header bg-info d-flex justify-content-between align-items-center" style="background-color: #87CEEB;">
                <h4 class="text-dark">Edit Data Barang</h4>
            </div>
            <div class="card-body">
                <form action="/{{auth()->user()->level}}/barang/{{$barang->id}}" method="POST" class="modern-form">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <!-- Kode -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control" name="kode" value="{{$barang->kode}}" disabled>
                            </div>
                        </div>
                        <!-- Nama -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{$barang->nama}}">
                            </div>
                        </div>
                        <!-- Kategori -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="custom-select" name="kategori_id">
                                    @foreach ($kategori as $kat)
                                    <option value="{{ $kat->id }}"
                                        {{ $kat->id == $barang->kategori_id ? 'selected' : '' }}>
                                        {{ $kat->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Satuan -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <select class="custom-select" name="satuan_id">
                                    @foreach ($satuan as $sat)
                                    <option value="{{ $sat->id }}"
                                        {{ $sat->id == $barang->satuan_id ? 'selected' : '' }}>
                                        {{ $sat->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Harga Beli -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga_beli">Harga Beli</label>
                                <input type="text" class="form-control jumlah" name="harga_beli" value="{{$barang->harga_beli}}">
                            </div>
                        </div>
                        <!-- Harga Jual -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga_jual">Harga Jual</label>
                                <input type="text" class="form-control jumlah" name="harga_jual" value="{{$barang->harga_jual}}">
                            </div>
                        </div>
                        <!-- Stok -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control jumlah" name="stok" value="{{$barang->stok}}">
                            </div>
                        </div>
                        <!-- Diskon -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="diskon">Diskon</label>
                                <div class="input-group">
                                    <input type="text" class="form-control jumlah" name="diskon" value="{{$barang->diskon}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block" style="border-radius: 8px;"><i class="fas fa-save"></i> Simpan</button>
                    <a href="/{{auth()->user()->level}}/barang" class="btn btn-secondary btn-lg btn-block mt-2" style="border-radius: 8px;"><i class="fas fa-caret-left"></i> Kembali</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
    $(document).ready(function () {
        $('.jumlah').on('input', function () {
            if ($(this).val() < 0) {
                $(this).val(0);
            }
        });
    });

    // Mengambil elemen input
    var harga_beli = document.getElementById('harga-beli');
    var harga_jual = document.getElementById('harga-jual');
    var diskon = document.getElementById('diskon');


    harga_beli.addEventListener('input', function() {

      this.value = this.value.replace(/[^0-9]/g, '');
    });


    harga_jual.addEventListener('input', function() {

      this.value = this.value.replace(/[^0-9]/g, '');
    });


    diskon.addEventListener('input', function() {

      this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
@endpush
