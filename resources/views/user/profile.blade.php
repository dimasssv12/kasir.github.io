@extends('layout.app')

@section('title', ' - User')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>User Profile</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Hi, {{ auth()->user()->nama }}!</h2>
        <p class="section-lead">
            Change information about yourself on this page.
        </p>

        <div class="row mt-sm-4">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Your Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="user-avatar mb-3 d-flex justify-content-center align-items-center" style="width: 180px; height: 180px;">
                            <img src="https://cdn-icons-png.flaticon.com/512/9187/9187604.png" alt="User Avatar" class="img-fluid" style="margin-right: -70px;">
                        </div>

                        <div class="user-details">
                            <p class="font-weight-bold">{{ auth()->user()->nama }}</p>
                            <p class="text-muted">{{ auth()->user()->level }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="card card-primary">
                    <form method="post" class="needs-validation" novalidate="">
                        <div class="card-header">
                            <h4>Profile</h4>
                        </div>
                        <div class="card-body">
                            <form action="/{{auth()->user()->level}}/profile/{{auth()->user()->id}}/update" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kode">Kode</label>
                                            <input type="text" name="kode" class="form-control" value="{{$user->kode}}"
                                                disabled>
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
                                            <input type="email" name="email" class="form-control"
                                                value="{{$user->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Level">Level</label>
                                            <input type="text" class="form-control" value="{{$user->level}}"
                                                name="level" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password">Password Baru</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Opsional">
                                        </div>
                                    </div>
                                    <div class="col-md-12" hidden>
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" class="form-control-file mt-2" name="foto">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@push('script')
<script>
    const passwordInput = document.getElementById('password');
    passwordInput.addEventListener('input', function () {
        const password = passwordInput.value;

        // Periksa panjang password
        const isLengthValid = password.length >= 8;

        // Periksa apakah setidaknya satu huruf kapital ada di dalam password
        const hasCapitalLetter = /[A-Z]/.test(password);

        if (!isLengthValid || !hasCapitalLetter) {
            // Tampilkan pesan kesalahan
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
