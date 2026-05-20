@extends('layouts.default')
@section('content')
<!-- title -->
<div class="app-title">
    <div>
    <h1>{{ $Usuario->Nombre.' '.$Usuario->Apellido }}</h1>
    <p>{{ $Usuario->Correo }}</p>
    </div>
</div>
<!-- content -->
<div class="row">
    <div class="col-md-12">
        <form action="/perfil/editar" method="POST">
            <div class="tile">
                <div class="w-100">
                    <h4>Perfil de Usuario</h4>
                </div>
                <hr>
                <div class="tile-body">     
                    <div class="form-group">
                        <label class="control-label"><b>Nombre: *</b></label>
                        <input class="form-control" name="Nombre" type="text" value="{{ $Usuario->Nombre }}" minlength="1" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Apellido: *</b></label>
                        <input class="form-control" name="Apellido" type="text" value="{{ $Usuario->Apellido }}" minlength="1" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Correo electrónico: *</b></label>
                        <input class="form-control" name="Correo" type="email" value="{{ $Usuario->Correo }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Contraseña:</b></label>
                        <input class="form-control" name="Password" type="password" maxlength="50" placeholder="Ingrese una nueva contraseña si desea cambiarla...">
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

@stop