<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Educación Continua | Iniciar Sesión</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE-3.0.4/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE-3.0.4/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE-3.0.4/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .login-page,
        .register-page {
            -ms-flex-align: center;
            align-items: center;
            background: #e9ecef;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            height: auto;
            -ms-flex-pack: center;
            justify-content: center;
            margin-top: 60px;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="http://www.utsalamanca.edu.mx/assets/img/pagina-principal/logo-uts-10-aniversario.png" alt="Logo UTS" style="width: 130px">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div class="login-logo">
                    <a href="http://utsalamanca.edu.mx" target="_blank"><b>Educación</b>Continua</a>
                </div>

                @error('error')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

                <form method="post" action="{{ route('admin.login.post') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        @error('email')
                        <div class="callout callout-danger">
                            <p class="text-red">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        @error('password')
                        <div class="callout callout-danger">
                            <p class="text-red">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <footer>
        <div class="text-center mt-3 pb-5">
            <h6 class="card-subtitle mb-2 text-muted">Universidad Tecnológica de Salamanca</h6>
            <a href="http://www.utsalamanca.edu.mx/assets/content/avisos-privacidad/Avisos-de-Privacidad-Simplificado_UTS_2017.pdf" target="_blank">Aviso de privacidad</a>
            <h6 class="card-subtitle mt-2 mb-2 text-muted">Copyright ©
                <?php echo date("Y"); ?>. Todos los derechos reservados.</h6>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="{{ asset('assets/AdminLTE-3.0.4/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/AdminLTE-3.0.4/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/AdminLTE-3.0.4/dist/js/adminlte.min.js') }}"></script>

</body>

</html>