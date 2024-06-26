<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login Kasir</title>
    <link rel="icon" href="{{asset('assets/img/unsplash/logo.png')}}" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">

</head>
<style>

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


    .section {
        padding: 60px 0;
    }

    .login-brand {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-brand img {
        width: 80px;
        margin-top: 10px;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #17a2b8;
        color: #fff;
        border-bottom: none;
        border-radius: 10px 10px 0 0;
        padding: 15px;
    }

    .card-body {
        padding: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #138496;
    }

    a {
        color: #17a2b8;
    }

    a:hover {
        color: #138496;
    }

    .text-info {
        color: #17a2b8;
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
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <h3>Login Admin dan Kasir</h3>
                            <img src="{{asset('assets/img/unsplash/logo.png')}}" alt="Logo"> <!-- Tambahkan ikon di sini -->
                        </div>

                        <div class="card card-info shadow">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <form method="POST" action="/postlogin" class="needs-validation">
                                    @csrf
                                    <div class="form-group">
                                        <label class="text-info" for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" autofocus placeholder="Masukkan Email">
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label text-info">Password</label>
                                            <div class="float-right d-none">
                                                <a href="/forgot-password" class="text-small text-info">
                                                    Lupa Password?
                                                </a>
                                            </div>
                                            <input id="password" type="password" class="form-control" name="password" tabindex="2" placeholder="Masukan Password">
                                            <div class="invalid-feedback">
                                                please fill in your password
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span>Belum punya akun? </span>
                                        <a href="/daftar" class="text-info">
                                            Daftar
                                        </a>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
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
        iziToast.success({
            title: 'Password Reset!',
            message: '{{session('status')}}',
            position: 'topRight'
        });
    </script>
    @elseif(session('gagal'))
    <script>
        iziToast.error({
            title: 'Gagal Login!',
            message: '{{session('gagal')}}',
            position: 'topRight'
        });
    </script>
    @elseif(session('sukses'))
    <script>
        iziToast.success({
            title: 'Sukses!',
            message: '{{session('sukses')}}',
            position: 'topRight'
        });
    </script>
    @endif
</body>

</html>
