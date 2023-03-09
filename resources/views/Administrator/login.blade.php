<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::asset('Assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{URL::asset('Assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::asset('Assets/dist/css/adminlte.min.css')}}">

    <link rel="stylesheet" href="{{URL::asset('Assets/Toast/toastr.min.css')}}">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin</b>Panel</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{route('post-login')}}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" autocomplete="off">
                        @error('email')
                        <small class="text-danger" data-error='email'>{{ $message }}</small>
                        @enderror

                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password" autocomplete="off">
                        @error('password')
                        <small class="text-danger" data-error='password'>{{ $message }}</small>
                        @enderror

                    </div>
                    <div class="row">
                        {{-- <div class="col-8">
                                <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                                </div>
                            </div> --}}
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                {{-- <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> --}}
                            <!-- /.social-auth-links -->

                            {{-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> --}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{URL::asset('Assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{URL::asset('Assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{URL::asset('Assets/dist/js/adminlte.min.js')}}"></script>
    <script src="{{URL::asset('Assets/Toast/toastr.min.js')}}"></script>
    <script src="{{URL::asset('Assets/alphanum/jquery.alphanum.js')}}"></script>

    @section('module_script')
    <script type="text/javascript">
        $(function() {
            $("[name='email']").on("focus", function() {
                // $(this).alpha();
                $("[data-error='email']").html("");
                $(this).removeClass("is-invalid");
            });
            $("[name='password']").on("focus", function() {
                // $(this).alpha();
                $("[data-error='password']").html("");
                $(this).removeClass("is-invalid");
            });
        });
    </script>
    @endsection

    <!-- <script>
        @if(Session::has('success'))

        toastr.success("{{ Session::get('success')}}")

        @endif

        @if(session('error'))

        toastr.info("{{ Session::get('info')}}")

        @endif
    </script> -->
</body>

</html>
