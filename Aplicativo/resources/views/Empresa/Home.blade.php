@extends('layouts.default')
@section('content')
<!-- title -->

<!-- content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Información de la Empresa</h4>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label for="TxtNombre"><b>Nombre de la Empresa:</b></label>
                        <div class="row">
                            @if(auth()->user()->Rol == "Administrador")
                            <div class="col-lg-11">
                            @else
                            <div class="col-lg-12">
                            @endif
                                <input type="text" class="form-control" id="TxtNombre" value="{{$Empresa->Nombre}}" readonly>
                            </div>
                            @if(auth()->user()->Rol == "Administrador")
                            <div class="col-lg-1 text-center pl-0">
                                <a href="#" class="btn btn-light btn-sm" title="Editar" data-toggle="modal" data-target="#EditNombre"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                            </div>
                            <!-- Editar Modal-->
                            <div class="modal fade bd-example-modal-lg" id="EditNombre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content user">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Editar Nombre de la Empresa</b></h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form class="user" action="/empresa/edit_nombre" method="post">
                                        <div class="modal-body" style="text-align: start;">
                                            <input type="hidden" name="id" value="{{ $Empresa->Id }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <label for="nombre"><strong>Nombre:</strong></label>
                                                <input type="text" class="form-control" name="nombre" placeholder="Nombre..." value="<?= $Empresa['Nombre'] ?>" title="Nombre" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary btn-block" value="Guardar Cambios">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Editar Modal-->
                             @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="TxtDescripcion"><b>Descripción de la Empresa:</b></label>
                        <div class="row">
                            @if(auth()->user()->Rol == "Administrador")
                            <div class="col-lg-11">
                            @else
                            <div class="col-lg-12">
                            @endif
                                <textarea class="form-control" id="TxtDescripcion" rows="5" readonly>{{$Empresa->Descripcion}}</textarea>
                            </div>
                            @if(auth()->user()->Rol == "Administrador")
                            <div class="col-lg-1 text-center pl-0">
                                <a href="#" class="btn btn-light btn-sm" title="Editar" data-toggle="modal" data-target="#EditDescripcion"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                            </div>
                            <!-- Editar Modal-->
                            <div class="modal fade bd-example-modal-lg" id="EditDescripcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content user">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Editar Descripción de la Empresa</b></h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form class="user" action="/empresa/edit_descripcion" method="post">
                                        <div class="modal-body" style="text-align: start;">
                                            <input type="hidden" name="id" value="{{ $Empresa->Id }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <label for="descripcion"><strong>Descripción:</strong></label>
                                                <textarea class="form-control" name="descripcion" placeholder="Descripción..." title="Descripción" rows="5"><?= $Empresa['Descripcion'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary btn-block" value="Guardar Cambios">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Editar Modal-->
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="TxtMision"><b>Misión de la Empresa:</b></label>
                        <div class="row">
                            @if(auth()->user()->Rol == "Administrador")
                            <div class="col-lg-11">
                            @else
                            <div class="col-lg-12">
                            @endif
                                <textarea class="form-control" id="TxtMision" rows="5" readonly>{{$Empresa->Mision}}</textarea>
                            </div>
                            @if(auth()->user()->Rol == "Administrador")
                            <div class="col-lg-1 text-center pl-0">
                                <a href="#" class="btn btn-light btn-sm" title="Editar" data-toggle="modal" data-target="#EditMision"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                            </div>
                            <!-- Editar Modal-->
                            <div class="modal fade bd-example-modal-lg" id="EditMision" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content user">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Editar Misión de la Empresa</b></h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form class="user" action="/empresa/edit_mision" method="post">
                                        <div class="modal-body" style="text-align: start;">
                                            <input type="hidden" name="id" value="{{ $Empresa->Id }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <label for="mision"><strong>Misión:</strong></label>
                                                <textarea class="form-control" name="mision" placeholder="Misión..." title="Misión" rows="5" required><?= $Empresa['Mision'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary btn-block" value="Guardar Cambios">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Editar Modal-->
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="TxtVision"><b>Visión de la Empresa:</b></label>
                        <div class="row">
                            @if(auth()->user()->Rol == "Administrador")
                            <div class="col-lg-11">
                            @else
                            <div class="col-lg-12">
                            @endif
                                <textarea class="form-control" id="TxtVision" rows="5" readonly>{{$Empresa->Vision}}</textarea>
                            </div>
                            @if(auth()->user()->Rol == "Administrador")
                            <div class="col-lg-1 text-center pl-0">
                                <a href="#" class="btn btn-light btn-sm" title="Editar" data-toggle="modal" data-target="#EditVision"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                            </div>
                            <!-- Editar Modal-->
                            <div class="modal fade bd-example-modal-lg" id="EditVision" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content user">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Editar Visión de la Empresa</b></h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form class="user" action="/empresa/edit_vision" method="post">
                                        <div class="modal-body" style="text-align: start;">
                                            <input type="hidden" name="id" value="{{ $Empresa->Id }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <label for="vision"><strong>Visión:</strong></label>
                                                <textarea class="form-control" name="vision" placeholder="Visión..." title="Visión" rows="5"><?= $Empresa['Vision'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary btn-block" value="Guardar Cambios">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Editar Modal-->
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary">Unidades Estratégicas de la Empresa</h5></div>
                        <div class="col-lg-6 col-sm-12 d-flex justify-content-end row">
                            @if(auth()->user()->Rol == "Administrador")
                            <a href="#" class="btn btn-primary btn-icon-split ml-1" data-toggle="modal" data-target="#AddUnidad">
                                <i class="fa fa-plus"></i>
                                <span class="text">Agregar</span>
                            </a>
                            <!-- Agregar Modal-->
                            <div class="modal fade" id="AddUnidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content user">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Agregar Unidad Estratégica</b></h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form class="user" action="/empresa/add_unidad" method="post">
                                        <div class="modal-body" style="text-align: start;">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <label for="unidad"><strong>Unidad Estratégica:</strong></label>
                                                <input type="text" class="form-control" name="unidad" placeholder="Unidad Estratégica..." title="Unidad Estratégica">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary btn-block" value="Agregar Unidad">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Agregar Modal-->
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th>Unidad Estratégica</th>
                                    @if(auth()->user()->Rol == "Administrador")
                                    <th width="20%"><center>Acciones</center></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($UnidadesEstrategicas as $Unidad)
                                <tr>
                                    <td>{{ $Unidad->Unidad }}</td>
                                    @if(auth()->user()->Rol == "Administrador")
                                    <td class="text-center">
                                        <a href="#" class="btn btn-success btn-sm text-uppercase" title="Editar" data-toggle="modal" data-target="#EditUnidad{{ $Unidad->Id }}"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                        <!-- Editar Modal-->
                                        <div class="modal fade" id="EditUnidad{{ $Unidad->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content user">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Editar Unidad Estratégica</b></h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form class="user" action="/empresa/edit_unidad" method="post">
                                                    <div class="modal-body" style="text-align: start;">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="id" value="{{ $Unidad->Id }}">
                                                        <div class="form-group">
                                                            <label for="unidad"><strong>Unidad Estratégica:</strong></label>
                                                            <input type="text" class="form-control" name="unidad" placeholder="Unidad Estratégica..." title="Unidad Estratégica" value="{{ $Unidad['Unidad'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary btn-block" value="Editar Unidad">
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Editar Modal-->
                                        <a href="#" class="btn btn-danger btn-sm text-uppercase" title="Eliminar" data-toggle="modal" data-target="#DeleteUnidad{{ $Unidad->Id }}"><i class="fa fa-trash" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="DeleteUnidad{{ $Unidad->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Desea eliminar el registro?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Haga clic en "Eliminar" si desea eliminar el Objetivo seleccionado.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                        <a class="btn btn-primary" href="/empresa/delete_unidad/{{ $Unidad->Id }}">Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Delete Modal-->
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                
        </div>
        
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary">Valores de la Empresa</h5></div>
                                <div class="col-lg-6 col-sm-12 d-flex justify-content-end row">
                                    @if(auth()->user()->Rol == "Administrador")
                                    <a href="#" class="btn btn-primary btn-icon-split ml-1" data-toggle="modal" data-target="#AddValor">
                                        <i class="fa fa-plus"></i>
                                        <span class="text">Agregar</span>
                                    </a>
                                    <!-- Agregar Modal-->
                                    <div class="modal fade" id="AddValor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content user">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Agregar Valor</b></h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form class="user" action="/empresa/add_valor" method="post">
                                                <div class="modal-body" style="text-align: start;">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="form-group">
                                                        <label for="valor"><strong>Valor:</strong></label>
                                                        <input type="text" class="form-control" name="valor" placeholder="Valor..." title="Valor">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary btn-block" value="Agregar Valor">
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Agregar Modal-->
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th>Valor</th>
                                            @if(auth()->user()->Rol == "Administrador")
                                            <th width="20%"><center>Acciones</center></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Valores as $Valor)
                                        <tr>
                                            <td>{{ $Valor->Valor }}</td>
                                            @if(auth()->user()->Rol == "Administrador")
                                            <td class="text-center">
                                                <a href="#" class="btn btn-success btn-sm text-uppercase" title="Editar" data-toggle="modal" data-target="#EditValor{{ $Valor->Id }}"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                                <!-- Editar Modal-->
                                                <div class="modal fade" id="EditValor{{ $Valor->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content user">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Editar Valor</b></h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form class="user" action="/empresa/edit_valor" method="post">
                                                            <div class="modal-body" style="text-align: start;">
                                                                <input type="hidden" name="id" value="{{ $Valor->Id }}">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <div class="form-group">
                                                                    <label for="valor"><strong>Valor:</strong></label>
                                                                    <input type="text" class="form-control" name="valor" placeholder="Valor..." value="{{ $Valor['Valor'] }}" title="Valor">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="submit" class="btn btn-primary btn-block" value="Guardar Cambios">
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Editar Modal-->
                                                <a href="#" class="btn btn-danger btn-sm text-uppercase" title="Eliminar" data-toggle="modal" data-target="#DeleteValor{{ $Valor->Id }}"><i class="fa fa-trash" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                                <!-- Delete Modal-->
                                                <div class="modal fade" id="DeleteValor{{ $Valor->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Desea eliminar el registro?</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Haga clic en "Eliminar" si desea eliminar el Valor seleccionado.</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                                <a class="btn btn-primary" href="/empresa/delete_valor/{{ $Valor->Id }}">Eliminar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Delete Modal-->
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary">Objetivos Generales de la Empresa</h5></div>
                                <div class="col-lg-6 col-sm-12 d-flex justify-content-end row">
                                    @if(auth()->user()->Rol == "Administrador")
                                    <a href="#" class="btn btn-primary btn-icon-split ml-1" data-toggle="modal" data-target="#AddObjetivo">
                                        <i class="fa fa-plus"></i>
                                        <span class="text">Agregar</span>
                                    </a>
                                    <!-- Agregar Modal-->
                                    <div class="modal fade" id="AddObjetivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content user">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Agregar Objetivo</b></h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form class="user" action="/empresa/add_objetivo_general" method="post">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="modal-body" style="text-align: start;">
                                                        <div class="form-group">
                                                            <label for="objetivo"><strong>Objetivo:</strong></label>
                                                            <input type="text" class="form-control" name="objetivo" placeholder="Objetivo..." title="Objetivo">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary btn-block" value="Agregar Objetivo">
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Agregar Modal-->
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th>Objetivo</th>
                                            <th width="20%"><center>Acciones</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ObjetivosGenerales as $Objetivo)
                                        <tr>
                                            <td>{{ $Objetivo->Objetivo }}</td>
                                            <td class="text-center">
                                                <a href="/empresa/objetivo/{{ $Objetivo->Id }}" class="btn btn-info btn-sm text-uppercase" title="Objetivos Especificos"><i class="fa fa-list" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                                @if(auth()->user()->Rol == "Administrador")
                                                <a href="#" class="btn btn-success btn-sm text-uppercase" title="Editar" data-toggle="modal" data-target="#EditObjetivo{{ $Objetivo->Id }}"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                                <!-- Editar Modal-->
                                                <div class="modal fade" id="EditObjetivo{{ $Objetivo->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content user">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Editar Objetivo</b></h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form class="user" action="/empresa/edit_objetivo_general" method="post">
                                                            <div class="modal-body" style="text-align: start;">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="hidden" name="id" value="{{ $Objetivo->Id }}">
                                                                <div class="form-group">
                                                                    <label for="objetivo"><strong>Objetivo:</strong></label>
                                                                    <input type="text" class="form-control" name="objetivo" placeholder="Objetivo..." title="Objetivo" value="{{ $Objetivo['Objetivo'] }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="submit" class="btn btn-primary btn-block" value="Editar Objetivo">
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Editar Modal-->
                                                <a href="#" class="btn btn-danger btn-sm text-uppercase" title="Eliminar" data-toggle="modal" data-target="#DeleteObjetivo{{ $Objetivo->Id }}"><i class="fa fa-trash" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                                <!-- Delete Modal-->
                                                <div class="modal fade" id="DeleteObjetivo{{ $Objetivo->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Desea eliminar el registro?</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Haga clic en "Eliminar" si desea eliminar el Objetivo seleccionado.</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                                <a class="btn btn-primary" href="/empresa/delete_objetivo_general/{{ $Objetivo->Id }}">Eliminar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Delete Modal-->
                                                 @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- content -->
    
</div>

@stop