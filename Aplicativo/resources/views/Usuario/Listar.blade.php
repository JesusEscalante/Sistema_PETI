@extends('layouts.default')
@section('content')

<!-- title -->
<div class="app-title mb-3">
    <h1><i class="fa fa-folder"></i> Listado de Usuarios</h1>
    <a href="#" class="btn btn-secondary" title="Agregar Usuario" data-toggle="modal" data-target="#AgregarUsuario"><i class="app-menu__icon fa fa-plus"></i> Agregar Usuario</a>
    <!-- Agregar Modal-->
      <div class="modal fade" id="AgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content user">
                  <div class="modal-header">
                      <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Agregar Usuario</b></h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <form class="user" action="/usuario/add_usuario" method="post">
                  <div class="modal-body" style="text-align: start;">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group row">
                        <div class="col-lg-6">
                          <label for="nombre"><strong>Nombre:</strong></label>
                          <input type="text" class="form-control" name="nombre" placeholder="Nombre..." title="Nombre">
                        </div>
                        <div class="col-lg-6">
                          <label for="apellido"><strong>Apellido:</strong></label>
                          <input type="text" class="form-control" name="apellido" placeholder="Apellido..." title="Apellido">
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="correo"><strong>Correo:</strong></label>
                          <input type="email" class="form-control" name="correo" placeholder="Correo..." title="Correo">
                      </div>
                      <div class="form-group row">
                        <div class="col-lg-6">
                          <label for="rol"><strong>Rol:</strong></label>
                          <select class="form-control" name="rol" placeholder="Rol..." title="Rol">
                            <option value="Editor">Editor</option>
                            <option value="Visualizador">Visualizador</option>
                          </select>
                        </div>
                        <div class="col-lg-6">
                          <label for="estado"><strong>Estado:</strong></label>
                          <select class="form-control" name="estado" placeholder="Estado..." title="Estado">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <input type="submit" class="btn btn-primary btn-block" value="Agregar">
                  </div>
                  </form>
              </div>
          </div>
      </div>
      <!-- Agregar Modal-->
</div>
<!-- content -->
<div class="row">

  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body table-responsive">
        <table class="table table-hover table-bordered" id="TableData">
          <thead>
            <tr>
              <th class="text-center" width="25px">N°</th>
              <th>NOMBRE</th>
              <th>CORREO ELECTRÓNICO</th>
              <th class="text-center">ROL</th>
              <th class="text-center" width="100px">ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ListadoUsuario as $key => $Usuario)
              <tr>
                  <td class="text-center">{{ $Usuario->Id }}</td>
                  <td>{{$Usuario->Nombre}} {{$Usuario->Apellido}}</td>
                  <td>{{$Usuario->Correo}}</td>
                  <td class="text-center">{{$Usuario->Rol}}</td>
                  <td class="text-center">
                    <a href="#" class="btn btn-success btn-sm text-uppercase" title="Editar" data-toggle="modal" data-target="#EditarUsuario{{ $Usuario->Id }}"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                    <!-- Editar Modal-->
                    <div class="modal fade" id="EditarUsuario{{ $Usuario->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content user">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Editar Usuario</b></h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form class="user" action="/usuario/edit_usuario" method="post">
                                <div class="modal-body" style="text-align: start;">
                                    <input type="hidden" name="id" value="{{ $Usuario->Id }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group row">
                                      <div class="col-lg-6">
                                        <label for="nombre"><strong>Nombre:</strong></label>
                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre..." title="Nombre" value="{{ $Usuario->Nombre }}">
                                      </div>
                                      <div class="col-lg-6">
                                        <label for="apellido"><strong>Apellido:</strong></label>
                                        <input type="text" class="form-control" name="apellido" placeholder="Apellido..." title="Apellido" value="{{ $Usuario->Apellido }}">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="correo"><strong>Correo:</strong></label>
                                        <input type="email" class="form-control" name="correo" placeholder="Correo..." title="Correo" value="{{ $Usuario->Correo }}">
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-lg-6">
                                        <label for="rol"><strong>Rol:</strong></label>
                                        @if($Usuario->Rol == 'Administrador')
                                        <input type="text" class="form-control" name="rol" placeholder="Rol..." title="Rol" value="{{ $Usuario->Rol }}" readonly>
                                        @else
                                        <select class="form-control" name="rol" placeholder="Rol..." title="Rol">
                                          <option value="Editor" <?= $Usuario->Rol == 'Editor' ? 'selected' : '' ?>>Editor</option>
                                          <option value="Visualizador" <?= $Usuario->Rol == 'Visualizador' ? 'selected' : '' ?>>Visualizador</option>
                                        </select>
                                        @endif
                                      </div>
                                      <div class="col-lg-6">
                                        <label for="estado"><strong>Estado:</strong></label>
                                        <select class="form-control" name="estado" placeholder="Estado..." title="Estado">
                                          <option value="1" <?= $Usuario->Estado == '1' ? 'selected' : '' ?>>Activo</option>
                                          <option value="0" <?= $Usuario->Estado == '0' ? 'selected' : '' ?>>Inactivo</option>
                                        </select>
                                      </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary btn-block" value="Editar">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Editar Modal-->
                  </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

@stop