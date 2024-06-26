@extends('layout.app')

@section('title', ' - Satuan Barang')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Satuan Barang</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-info d-flex justify-content-between align-items-center" style="background-color: #87CEEB;">
                        <h4 class="text-dark" >Data Satuan</h4>
                        <div class="card-header-form">
                            <button type="button" class="btn btn-sm btn-outline-warning ml-auto" data-toggle="modal" data-target="#form-tambah" style="border-width: 2px;">
                                <i class="fa fa-plus"></i> <span style="color: #000000;">Tambah</span>
                            </button>

                        </div>
                    </div>



                    <div class="card-body p-2">
                        <table class="table table-hover" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th style="width: 70%">Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($satuan as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>
                                        <form action="/{{auth()->user()->level}}/satuan/{{$item->id}}" id="delete-form">
                                            <a href="/{{auth()->user()->level}}/satuan/{{$item->id}}/edit"
                                                class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i> Edit</a>
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                id="{{$item->nama}}" data-id="{{$item->id}}"
                                                onclick="confirmDelete(this)"><i class="fa fa-trash"></i> Delete</a>
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
</section>
@include('satuan.form');
@endsection

@push('script')
<script>
$(document).ready(function () {
        $('#table').DataTable();
    });

    var data_anggota = $(this).attr('data-id')
    function confirmDelete(button) {

        event.preventDefault()
        const id = button.getAttribute('data-id');
        const kode = button.getAttribute('id');
        swal({
                title: 'Apa Anda Yakin ?',
                text: 'Anda akan menghapus data: "' + kode + '". Ketika Anda tekan OK, maka data tidak dapat dikembalikan !',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
              const form = document.getElementById('delete-form');
              form.action = '/{{auth()->user()->level}}/satuan/' + id; 
              form.submit();
            }
        });
    }
</script>
@endpush
