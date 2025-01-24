
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RIS-Studio | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin') }}/dist/css/adminlte.min.css">
  <!-- sweetalert 2 -->
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/sweetalert2/sweetalert2.min.css">
</head>
<body class="hold-transition login-page bg-image"style="background-image: url({{ asset('admin') }}/img/bg.jpg);" >
    <div class="login-box" id="login">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>RIS</b>-Studio</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan Login Untuk Masuk</p>
    
                <form action="/login" method="post">
                    @csrf
                    <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="row">
                    
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <!-- /.col -->
                    </div>
                </form>
    
                <div class="social-auth-links text-center mb-3">
                    <p>- ATAU -</p>
                    
                    <p class="mb-1">
                    <a href="/register">Daftar Akun</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
    
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin') }}/dist/js/adminlte.min.js"></script>
<!-- sweet alert -->
<script src="{{ asset('admin') }}/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script>
    var login = document.getElementById('login');
        @if (session()->has('error'))
            @if (session('error') == '1')
                login.classList.add('d-none');
                Swal.fire({
                    title: "Gagal Login",
                    text: "Email/Password Anda Salah!",
                    icon: "error"
                }).then((result) => {
                    // Cek jika tombol OK diklik
                    if (result.isConfirmed) {
                        login.classList.remove('d-none');
                    }
                });
            @elseif (session('error') == '2')
                Swal.fire({
                        title: "Berhasil",
                        text: "Silahkan Login!",
                        icon: "success"
                    });
            @endif
        @endif
    
</script>
</body>
</html>
