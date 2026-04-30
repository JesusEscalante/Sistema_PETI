@extends('layouts.default')
@section('content')

<!-- title -->
<div class="app-title mb-3">
    <h1>Nuevo Usuario</h1>
</div>
<!-- title -->

<!-- menu de navegación -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/usuario/listar">Listado de usuarios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar</li>
    </ol>
</nav>
<!-- menu de navegación -->

<!-- content -->
<div class="row">
    <div class="col-md-12">
        <form action="/usuario/actagregar" method="POST">
            <div class="tile">
                <div class="tile-body">     
                    <div class="form-group">
                        <label class="control-label"><b>Nombre:</b></label>
                        <input class="form-control" name="Nombre" type="text" minlength="1" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Apellido:</b></label>
                        <input class="form-control" name="Apellido" type="text" minlength="1" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Correo electrónico:</b></label>
                        <input class="form-control" name="Correo" type="email" minlength="3" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Tipo de Usuario:</b></label>
                        <select name="TipoUsuarioId" class="form-control" required>
                            <option value="" selected>[SELECCIONE UN TIPO DE USUARIO]</option>
                            @foreach($ListadoTipoUsuario as $TipoUsuario)
                            <option value="{{ $TipoUsuario->Id }}">{{ $TipoUsuario->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="tile-footer">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-primary text-uppercase" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Crear Usuario</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- content -->

@stop