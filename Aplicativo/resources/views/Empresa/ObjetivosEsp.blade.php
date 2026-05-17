@extends('layouts.default')
@section('content')

<div class="container-fluid">
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-lg-10 col-sm-12"><h5 class="font-weight-bold text-primary">Objetivos Específicos de Objetibo General [{{ $ObjetivoGeneral->Objetivo }}]</h5></div>
                <div class="col-lg-2 col-sm-12 d-flex justify-content-end row">
                    @if(auth()->user()->Rol == "Administrador")
                    <a href="#" class="btn btn-primary btn-icon-split ml-1" data-toggle="modal" data-target="#AddObjetivo">
                        <i class="fa fa-plus"></i>
                        <span class="text">Agregar</span>
                    </a>
                    <!-- Agregar Modal-->
                    <div class="modal fade" id="AddObjetivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content user">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Agregar Objetivo Específico</b></h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form class="user" action="/empresa/add_objetivo_especifico" method="post">
                                <div class="modal-body" style="text-align: start;">
                                    <input type="hidden" name="objgeneral_id" value="{{ $ObjetivoId }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group row">
                                        <div class="col-lg-6 col-sm-12">
                                            
                                            <label for="unidad"><strong>Tipo de Objetivo Específico:</strong></label>
                                            <select class="form-control" name="tipo" required>
                                                <option value="" disabled selected>Seleccione el tipo de objetivo específico...</option>
                                                <option value="Funcional">Funcional</option>
                                                <option value="Operativo">Operativo</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-sm-0"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="objetivo"><strong>Objetivo Específico:</strong></label>
                                        <input type="text" class="form-control" name="objetivo" placeholder="Objetivo Específico..." title="Objetivo Específico">
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
                            <th width="20%">Tipo de Objetivo Específico</th>
                            <th>Objetivo Específico</th>
                            @if(auth()->user()->Rol == "Administrador")
                            <th width="20%"><center>Acciones</center></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ObjetivosEspecificos as $Objetivo)
                        <tr>
                            <td>{{ $Objetivo->Tipo }}</td>
                            <td>{{ $Objetivo->Objetivo }}</td>
                            @if(auth()->user()->Rol == "Administrador")
                            <td class="text-center">
                                <a href="#" class="btn btn-success btn-sm text-uppercase" title="Editar" data-toggle="modal" data-target="#EditObjetivo{{ $Objetivo->Id }}"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                <!-- Editar Modal-->
                                <div class="modal fade" id="EditObjetivo{{ $Objetivo->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content user">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Editar Objetivo Específico</b></h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form class="user" action="/empresa/edit_objetivo_especifico" method="post">
                                            <div class="modal-body" style="text-align: start;">
                                                <input type="hidden" name="id" value="{{ $Objetivo->Id }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="form-group row">
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label for="unidad"><strong>Tipo de Objetivo Específico:</strong></label>
                                                        <select class="form-control" name="tipo" required>
                                                            <option value="" disabled selected>Seleccione el tipo de objetivo específico...</option>
                                                            <option value="Funcional" {{ $Objetivo->Tipo == 'Funcional' ? 'selected' : '' }}>Funcional</option>
                                                            <option value="Operativo" {{ $Objetivo->Tipo == 'Operativo' ? 'selected' : '' }}>Operativo</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-0"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="objetivo"><strong>Objetivo Específico:</strong></label>
                                                    <input type="text" class="form-control" name="objetivo" placeholder="Objetivo Específico..." title="Objetivo Específico" value="{{ $Objetivo->Objetivo }}">
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
                                                <a class="btn btn-primary" href="/empresa/delete_objetivo_especifico/{{ $Objetivo->Id }}">Eliminar</a>
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

</div>
@stop