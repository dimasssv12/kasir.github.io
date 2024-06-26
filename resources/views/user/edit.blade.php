@extends('layout.app')

@section('title', ' - Edit')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>User</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header bg-info d-flex justify-content-between align-items-center" style="background-color: #87CEEB;">
                <h4 class="text-dark">Edit Data User</h4>
            </div>
            <div class="card-body">
                <form action="/{{auth()->user()->level}}/user/{{$user->id}}" method="POST" class="modern-form">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" name="kode" class="form-control" value="{{$user->kode}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{$user->nama}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password Baru</label>
                                <input type="password" name="password" class="form-control" placeholder="Opsional">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Level">Level</label>
                                <input type="text" class="form-control" value="{{$user->level}}" name="level" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="button-group mt-3">
                        <button type="submit" class="btn btn-success btn-lg btn-block" style="border-radius: 8px;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/{{auth()->user()->level}}/user" class="btn btn-secondary btn-lg btn-block mt-2" style="border-radius: 8px;"><i class="fas fa-caret-left"></i> Kembali</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
