@extends('layout.app')

@section('title', ' - User')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>User</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-info d-flex justify-content-between align-items-center" style="background-color: #87CEEB;">
                        <h4 class="text-dark" >Data User</h4>
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
                                        <th style="width: 20%">Email</th>
                                        <th style="width: 10%">Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->kode}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->email}}</td>
                                        @if($item->level == 'admin')
                                        <td><div class="badge badge-success">Admin</div></td>
                                        @elseif($item->level == 'kasir')
                                        <td><div class="badge badge-info">Kasir</div></td>
                                        @endif
                                        <td>
                                            <form action="/{{auth()->user()->level}}/user/{{$item->id}}" id="delete-form">
                                                <a href="/{{auth()->user()->level}}/user/{{$item->id}}/edit"
                                                    class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i>
                                                    Edit</a>
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
    </div>
</section>

@include('user.form');
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
              form.action = '/{{auth()->user()->level}}/user/' + id;
              form.submit();
            }
        });
    }

    const passwordInput = document.getElementById('password');

    passwordInput.addEventListener('input', function() {
        const password = passwordInput.value;

        // Periksa panjang password
        const isLengthValid = password.length >= 8;

        // Periksa apakah setidaknya satu huruf kapital ada di dalam password
        const hasCapitalLetter = /[A-Z]/.test(password);

        // Jika panjang password tidak mencukupi atau tidak memiliki huruf kapital
        if (!isLengthValid || !hasCapitalLetter) {

            document.getElementById('warning-message').style.display = 'block';
        } else {
            document.getElementById('warning-message').style.display = 'none';
        }
    });

    function validasiInput(inputElement) {
      inputElement.value = inputElement.value.replace(/[^a-zA-Z]/g, '');
    }
</script>
@endpush
