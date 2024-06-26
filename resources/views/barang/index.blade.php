@extends('layout.app')

@section('title', ' - Barang')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Barang</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-info d-flex justify-content-between align-items-center" style="background-color: #87CEEB;">
                        <h4 class="text-dark" >Data Barang</h4>
                        <div class="card-header-form">
                            <button type="button" class="btn btn-sm btn-outline-warning ml-auto" data-toggle="modal" data-target="#form-tambah" style="border-width: 2px;">
                                <i class="fa fa-plus"></i> <span style="color: #000000;">Tambah</span>
                            </button>

                        </div>
                    </div>

                    <div class="card-body p-2">
                        <div class="table-responsive">
                            <table class="table table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode</th>
                                        <th style="width: 20%">Nama</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                        <th>Diskon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barang as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->kode}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->formatRupiah('harga_beli')}}</td>
                                        <td>{{$item->formatRupiah('harga_jual')}}</td>
                                        @if($item->stok <= 0)
                                        <td><span class="text-danger">Stok Habis</span></td>
                                        @endif
                                        @if($item->stok > 0)
                                        <td>{{$item->stok}}</td>
                                        @endif
                                        <td>{{$item->diskon}}%</td>
                                        <td>
                                            <form action="/{{auth()->user()->level}}/barang/{{$item->id}}" id="delete-form">
                                                <a href="/{{auth()->user()->level}}/barang/{{$item->id}}/show" class="btn btn-sm btn-outline-info" style="margin-right: 3px;"><i class="fa fa-eye"></i> Detail</a>
                                                <a href="/{{auth()->user()->level}}/barang/{{$item->id}}/edit" class="btn btn-sm btn-outline-warning" ata-toggle="modal" data-target="#form-edit" style="margin-right: 3px;"><i class="fa fa-edit"></i> Edit</a>
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-sm btn-outline-danger mt-1" id="{{$item->kode}}" data-id="{{$item->id}}" onclick="confirmDelete(this)"><i class="fa fa-trash"></i> Delete</button>
                                            </form>
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
@include('barang.form');
@endsection

@push('script')
<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });

    $(document).ready(function () {
        $('.jumlah').on('input', function () {
            if ($(this).val() < 0) {
                $(this).val(0);
            }
        });
    })

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

    var data_anggota = $(this).attr('data-id')

    function confirmDelete(button) {

        event.preventDefault()
        const id = button.getAttribute('data-id');
        const kode = button.getAttribute('id');
        swal({
                title: 'Apa Anda Yakin ?',
                text: 'Anda akan menghapus data: "' + kode +
                    '". Ketika Anda tekan OK, maka data tidak dapat dikembalikan !',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    const form = document.getElementById('delete-form');

                    form.action = '/{{auth()->user()->level}}/barang/' + id;
                    form.submit();
                }
            });
    }

</script>
@endpush
