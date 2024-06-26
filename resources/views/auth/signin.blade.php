<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Daftar Kasir</title>
    <link rel="icon" href="{{asset('assets/img/unsplash/logo.png')}}" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">

</head>
<style>
/* Animasi hover untuk tombol daftar */
.btn-info {
    transition: all 0.3s ease;
}
.btn-info:hover {
    transform: translateY(-3px);
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}

.card-header {
        background-color: #17a2b8;
        color: #fff;
        border-bottom: none;
        border-radius: 10px 10px 0 0;
        padding: 15px;
    }

.form-control:hover {
    transform: scale(1.04);
}

/* Animasi warna latar belakang yang bergerak */
@keyframes moveBackground {
    0% { background-position: 0 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0 50%; }
}

body {
    animation: moveBackground 5s linear infinite alternate;
    background: linear-gradient(-45deg, #ffcc00, #ff0066, #30758c, #226b22);
    background-size: 400% 400%;
}


@keyframes moveLight {
    0% { opacity: 0.5; }
    50% { opacity: 1; }
    100% { opacity: 0.5; }
}

.light {
    animation: moveLight 5s ease-in-out infinite;
}

h3 {
        color: #17a2b8;
        font-size: 24px;
        text-transform: uppercase;
        margin-bottom: 20px;
        letter-spacing: 1px;
        text-align: center;
        font-weight: bold;
    }

</style>
<body >
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 mt-3">
                        <div class="login-brand">
                            <h3>Register Akun Admin dan Kasir</h3>
                        </div>

                        <div class="card card-info shadow">
                            <div class="card-header">
                            </div>
                            @error('status')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="card-body">
                                <form method="POST" action="/user/daftar" class="needs-validation" id="form-daftar">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info" for="email">Nama</label>
                                                <input id="email" type="text" class="form-control" name="nama"
                                                    tabindex="1" autofocus placeholder="Masukkan Nama" oninput="validasiInput(this)">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info" for="email">Email</label>
                                                <input id="email" type="email" class="form-control" name="email"
                                                    tabindex="1" autofocus placeholder="Masukkan Email">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="d-block">
                                                    <label for="password"
                                                        class="control-label text-info">Password</label>
                                                    <input id="password" type="password" class="form-control"
                                                        name="password" tabindex="2" placeholder="Masukan Password">
                                                    <div id="warning-message" style="color: red; display: none;">
                                                        Password minimal 8 karakter dan 1 huruf kapital
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label text-info" for="Level">Level</label>
                                                <select class="custom-select" name="level" id="">
                                                    <option value="">Pilih Level...</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="kasir">Kasir</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <span>Sudah punya akun? </span>
                                        <a href="/login" class="text-info">
                                            Login
                                        </a>
                                    </div>

                                    <div class="form-group col-sm-5 mx-auto">
                                        <button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">
                                            Daftar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>


    @if(session('status'))
    <script>
        iziToast.error({
            title: 'Gagal Daftar!',
            message: '{{session('status')}}',
            position: 'topRight'
        });

    </script>
    @endif
    <script>
    function validasiInput(inputElement) {

      inputElement.value = inputElement.value.replace(/[^a-zA-Z]/g, '');
    }


    const passwordInput = document.getElementById('password');


    passwordInput.addEventListener('input', function() {

        const password = passwordInput.value;


        const isLengthValid = password.length >= 8;

        const hasCapitalLetter = /[A-Z]/.test(password);


        if (!isLengthValid || !hasCapitalLetter) {

            document.getElementById('warning-message').style.display = 'block';
        } else {

            document.getElementById('warning-message').style.display = 'none';
        }
    });
  </script>
</body>

</html>
