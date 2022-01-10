<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

    @if ( session()->has('success'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ( session()->has('loginError'))
        <div class="alert alert-danger  alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
    
            <form action="/" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control 
                    @error('username') is-invalid @enderror" placeholder="Username"
                    value="{{ old('username') }}">

                    @error('username')
                        <div class="invalid-feedback">
                                {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                   <input type="password" name="password" class="form-control 
                        @error('password') is-invalid @enderror" placeholder="Password">
                    @error('password')
                        <div class="invalid-feedback">
                                {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block">Sign In</button>

            </form>
    
           
            <!-- /.social-auth-links -->
    
            {{-- <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
            </p> --}}
            <p class="mb-0 mt-3">
                <a href="/register" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>