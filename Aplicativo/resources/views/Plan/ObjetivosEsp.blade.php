@extends('layouts.default')
@section('content')

<div class="container-fluid">
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-lg-10 col-sm-12"><h5 class="font-weight-bold text-primary">OBJETIVOS ESPECÍFICOS PARA EL PLAN ESTRATEGICO</h5></div>
                <div class="col-lg-2 col-sm-12 d-flex justify-content-end row">
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
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="planid" value="{{ $PlanId }}">
                                    <div class="form-group">
                                        <label for="objetivo"><strong>Objetivo General:</strong></label>
                                        <ul class="list-group">
                                        @foreach($ObjetivosGenerales as $item)
                                        <li class="list-group-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="objgeneral_id" value="{{ $item->Id }}">
                                            <label class="form-check-label">
                                                {{ $item->Objetivo }}
                                            </label>
                                        </div>
                                        </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="unidad"><strong>Tipo de Objetivo Específico:</strong></label>
                                            <select class="form-control" name="tipo" required>
                                                <option value="" selected>Seleccione el tipo de objetivo específico...</option>
                                                <option value="Funcional">Funcional</option>
                                                <option value="Operativo">Operativo</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-sm-0"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="objetivo"><strong>Objetivo Específico:</strong></label>
                                        <textarea class="form-control" name="objetivo" placeholder="Objetivo Específico..." title="Objetivo Específico"></textarea>
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
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="text-center">Objetivo General</th>
                            <th class="text-center" width="15%">Tipo de Objetivo Específico</th>
                            <th>Objetivo Específico</th>
                            <th width="15%"><center>Acciones</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ObjetivosEspecificos as $item)
                        <tr>
                            <td class="text-center">OG-{{ $item->ObjGeneral_Id }}</td>
                            <td class="text-center">{{ $item->Tipo }}</td>
                            <td>{{ $item->Objetivo }}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-success btn-sm text-uppercase" data-toggle="modal" data-target="#EditObjetivo{{ $item->Id }}"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                <!-- Agregar Modal-->
                                <div class="modal fade" id="EditObjetivo{{ $item->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="planid" value="{{ $PlanId }}">
                                                <div class="form-group">
                                                    <label for="objetivo"><strong>Objetivo General:</strong></label>
                                                    <ul class="list-group">
                                                    @foreach($ObjetivosGenerales as $og)
                                                    <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="objgeneral_id" value="{{ $og->Id }}" {{ $og->Id == $item->ObjGeneral_Id ? 'checked' : '' }}>
                                                        <label class="form-check-label">
                                                            {{ $og->Objetivo }}
                                                        </label>
                                                    </div>
                                                    </li>
                                                    @endforeach
                                                    </ul>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label for="unidad"><strong>Tipo de Objetivo Específico:</strong></label>
                                                        <select class="form-control" name="tipo" required>
                                                            <option value="" selected>Seleccione el tipo de objetivo específico...</option>
                                                            <option value="Funcional" {{ $item->Tipo == 'Funcional' ? 'selected' : '' }}>Funcional</option>
                                                            <option value="Operativo" {{ $item->Tipo == 'Operativo' ? 'selected' : '' }}>Operativo</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-0"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="objetivo"><strong>Objetivo Específico:</strong></label>
                                                    <textarea class="form-control" name="objetivo" rows="3" placeholder="Objetivo Específico..." title="Objetivo Específico">{{ $item->Objetivo }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-primary btn-block" value="Editar Objetivo">
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Agregar Modal-->
                                <a href="#" class="btn btn-danger btn-sm text-uppercase" title="Eliminar" data-toggle="modal" data-target="#DeleteValor{{ $item->Id }}"><i class="fa fa-trash" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                <!-- Delete Modal-->
                                <div class="modal fade" id="DeleteValor{{ $item->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Desea eliminar el registro?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Haga clic en "Eliminar" si desea eliminar el Objetivo Especifico seleccionado.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                <a class="btn btn-primary" href="/empresa/delete_objetivo_especifico/{{ $item->Id }}">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Modal-->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br><br>

    <!-- Botones de navegación flotantes (solo 2 botones) -->
    <div class="floating-nav-container">
        <div class="nav-buttons">
            <a class="btn-nav btn-nav-prev" id="prevBtn" disabled style="Opacity: 0.5; pointerEvents: none;">
                <i class="fas fa-arrow-left"></i> Anterior
            </a>
            <a href="/analisis/cadena/{{ $PlanId }}" class="btn-nav btn-nav-next" id="nextBtn">
                Siguiente <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
    
</div>

</div>
@stop