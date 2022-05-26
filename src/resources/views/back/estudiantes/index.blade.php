@extends('back.layouts.app')

@section('titulo', 'Estudiantes')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Estudiantes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Estudiantes</li>
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Estudiantes</h3>
                        <div class="card-tools">
                            @can('crear estudiantes')
                            <a href="{{ route('estudiantes.create') }}" class="btn btn-primary btn-flat">
                                <i class="nav-icon far fa-plus-square"></i> Registrar Estudiante</a>
                            @endcan
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(count($estudiantes)>0)
                        <div class="table-responsive-md">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nombre</th>
                                        <th>Matricula</th>
                                        <th>Tipo de Usuario</th>
                                        <!-- <th>Estado</th>
                                        <th>Ciudad</th>
                                        <th>Colonia</th> -->
                                        <th style="width: 40px">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($estudiantes as $estudiante)
                                    <tr>
                                        <td>{{ $estudiante->id }}</td>
                                        <td>{{ $estudiante->perfil->nombre_completo }}</td>
                                        <td>{{ $estudiante->login }}</td>
                                        <td>{{ $estudiante->perfil->tipo_estudiante->nombre }}</td>
                                        @if($estudiante->activo == 1)
                                        <td><span class="badge bg-success">Activo</span></td>
                                        @else
                                        <td><span class="badge bg-danger">Inactivo</span></td>
                                        @endif

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3">
                                    <div class="text-center text-sm-left">
                                        @if(count($estudiantes)>0)
                                        Mostrando del {{ $estudiantes->firstItem() }} al {{ $estudiantes->lastItem() }}
                                        de {{$estudiantes->total()}} registros
                                        @else
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="pagination pagination-sm m-0 justify-content-center justify-content-sm-end">
                                        {!! $estudiantes->links() !!}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="alert alert-info">
                            <p>No hay usuarios registrados.</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection