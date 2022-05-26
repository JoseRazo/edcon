@extends('back.layouts.app')

@section('titulo', 'Registrar Usuario')

@section('styles')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets/AdminLTE-3.0.4/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/AdminLTE-3.0.4/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">


@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Registrar Usuario</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Registrar Usuario</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" name="FormUsuario" action="{{ route('estudiantes.store') }}" onsubmit="return validateForm()">
                        @csrf
                        <div class="card-body">
                            @include('back.partials.errors')
                            <h5>Información General</h5>
                            <hr>
                            <label for="apellido_paterno">Nombre:<span class="text-danger"> * </span>
                                <small> Coloca el nombre como aparece en tu Acta de Nacimiento </small></label>
                            <div class="form-group">
                                <div class="row text-center">
                                    <div class="col-sm-4">
                                        <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" placeholder="-" value="{{ old('apellido_paterno') }}">
                                        <label for="apellido_paterno">Primer Apellido</span></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" placeholder="-" value="{{ old('apellido_materno') }}">
                                        <label for="apellido_materno">Segundo Apellido</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="-" value="{{ old('nombre') }}">
                                        <label for="nombre">Nombre(s)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="tipo_estudiante">Tipo de Usuario:<span class="text-danger"> * </span></label>
                                        <select name="tipo_estudiante_id" id="tipo_estudiante" class="form-control select2bs4 required" style="width: 100%;">
                                            <option></option>
                                            @foreach($tipos_estudiantes as $tipo_estudiante)
                                            <option value="{{ $tipo_estudiante->id }}">{{ $tipo_estudiante->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mt-4">Domicilio Actual</h5>
                            <hr>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="estado">Estado:<span class="text-danger"> * </span></label>
                                        <select name="estado_id" id="estado" class="form-control select2bs4 required" style="width: 100%;">
                                            <option></option>
                                            @foreach($estados as $estado)
                                            <option value="{{ $estado->cve_estado }}">{{ $estado->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="ciudad">Ciudad:<span class="text-danger"> * </span></label>
                                        <select name="ciudad_id" id="ciudad" class="form-control select2bs4 required" style="width: 100%;">
                                            <option value="">-</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="colonia">Colonia:<span class="text-danger"> * </span></label>
                                        <select name="colonia_id" id="colonia" class="form-control select2bs4 required" style="width: 100%;">
                                            <option value="">-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="calle">Calle:<span class="text-danger"> * </span></label>
                                        <input type="text" name="calle" class="form-control" id="calle" placeholder="-" value="{{ old('calle') }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="num_exterior">Número Exterior:</label>
                                        <input type="text" name="num_exterior" class="form-control" id="num_exterior" placeholder="-" value="{{ old('num_exterior') }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="num_interior">Número Interior:</label>
                                        <input type="text" name="num_interior" class="form-control" id="num_interior" placeholder="-" value="{{ old('num_interior') }}">
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="telefono">Teléfono:</label>
                                        <input type="text" name="telefono" class="form-control" id="telefono" placeholder="-" value="{{ old('telefono') }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="mail">E-mail:</label>
                                        <input type="email" name="mail" class="form-control" id="mail" placeholder="-" value="{{ old('mail') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('scripts')
<!-- Select2 -->
<script src="{{ asset('assets/AdminLTE-3.0.4/plugins/select2/js/select2.full.min.js') }}"></script>

<script type="text/javascript">
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4',
            placeholder: "Selecciona una opción...",
            allowClear: true,
            language: {
                noResults: function(params) {
                    return "Oops, no se encontraron resultados!";
                }
            }
        })

    })
</script>

<script type="text/javascript">
    function validateForm() {
        var apellido_paterno = document.forms["FormUsuario"]["apellido_paterno"].value;
        var apellido_materno = document.forms["FormUsuario"]["apellido_materno"].value;
        if (apellido_paterno == "" && apellido_materno == "") {
            alert("Debes introducir al menos uno de tus apellidos.");
            document.getElementById("apellido_paterno").focus();
            return false;
        }
    }
</script>

<script type="text/javascript">
    // Cargar Ciudad Dimamicamente
    $(function() {
        $('#estado').on('change', onSelectEstadoChange);
    });

    function onSelectEstadoChange() {
        var cve_estado = $(this).val();

        if (!cve_estado) {
            $('#ciudad').html('<option value="">-</option>');
            return;
        }
        //AJAX
        $.get('/api/v1/estado/' + cve_estado + '/ciudades', function(data) {
            var html_select = '<option value="">Selecciona una opción...</option>';
            for (var i = 0; i < data.length; ++i)
                html_select += '<option value="' + data[i].cve_ciudad + '">' + data[i].nombre + '</option>';
            $('#ciudad').html(html_select);
        });
        /*################### CAMBIAR API URL AL SUBIR A PRODUCCION #####################
           http://www.utsalamanca.edu.mx/api/v1/
        ######################################################*/
    }

    // Cargar Colonia Dimamicamente
    $(function() {
        $('#ciudad').on('change', onSelectCiudadChange);
    });

    function onSelectCiudadChange() {
        var cve_ciudad = $(this).val();

        if (!cve_ciudad) {
            $('#colonia').html('<option value="">-</option>');
            return;
        }
        //AJAX
        $.get('/api/v1/ciudad/' + cve_ciudad + '/colonias', function(data) {
            var html_select = '<option value="">Selecciona una opción...</option>';
            for (var i = 0; i < data.length; ++i)
                html_select += '<option value="' + data[i].cve_colonia + '">' + data[i].nombre + '</option>';
            $('#colonia').html(html_select);
        });
        /*################### CAMBIAR API URL AL SUBIR A PRODUCCION #####################
           http://www.utsalamanca.edu.mx/api/v1/
        ######################################################*/
    }
</script>
@endsection