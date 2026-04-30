@extends('layouts.default')
@section('content')

<!-- title -->
<div class="app-title mb-3">
    <div>
    <h1>{{ $Usuario->Nombre.' '.$Usuario->Apellido }}</h1>
    <p>{{ $Usuario->Correo }}</p>
    </div>
</div>
<!-- title -->

<!-- menu de navegación -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/usuario/listar">Listado de usuarios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar</li>
    </ol>
</nav>
<!-- menu de navegación -->

<!-- content -->
<div class="row">
    <div class="col-md-12">
        <form action="/usuario/acteditar" method="POST">
            <div class="tile">
                <div class="w-100">
                    <h4>Editar</h4>
                </div>
                <hr>
                <div class="tile-body">     
                    <div class="form-group">
                        <label class="control-label"><b>Nombre: *</b></label>
                        <input class="form-control" name="Nombre" type="text" value="{{ $Usuario->Nombre }}" minlength="1" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Apellido:</b></label>
                        <input class="form-control" name="Apellido" type="text" value="{{ $Usuario->Apellido }}" minlength="1" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Correo electrónico: *</b></label>
                        <input class="form-control" name="Correo" type="email" value="{{ $Usuario->Correo }}"readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><b>Tipo de Usuario:</b></label>
                                <?php if($Usuario->TipoUsuarioId == 1){ ?>
                                <input name="TipoUsuarioId" type="hidden" value="{{ $Usuario->TipoUsuarioId }}" >
                                <input class="form-control" type="text" value="Administrador" readonly>
                                <?php } else { ?>
                                <select name="TipoUsuarioId" class="form-control" required>
                                    @foreach($ListadoTipoUsuario as $TipoUsuario)
                                    @if($TipoUsuario->Id != 1 && $TipoUsuario->Id != 2)
                                    <option value="{{ $TipoUsuario->Id }}" {{$TipoUsuario->Id==$Usuario->TipoUsuarioId?'selected':''}}>{{ $TipoUsuario->Nombre }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><b>Estado:</b></label>
                                <select name="Estado" class="form-control" required>
                                    <option value="1" {{ $Usuario->Estado==1?'selected':'' }}>Activo</option>
                                    <option value="0" {{ $Usuario->Estado==0?'selected':'' }}>Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tile-footer">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="Id" value="{{ $Usuario->Id }}" required>
                        <button class="btn btn-primary text-uppercase" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- content -->
@stop