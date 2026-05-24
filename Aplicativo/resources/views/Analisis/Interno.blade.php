@extends('layouts.default')
@section('content')

<!-- content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="align-items-center">
                <h5 class="font-weight-bold text-primary m-0">ANALISIS INTERNO</h5>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="align-items-center">
                                <h5 class="font-weight-bold text-primary">Fortalezas de la Empresa</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th>Fortaleza</th>
                                            <th width="20%" class="text-center">Creado Por</th>
                                            <th width="15%" class="text-center">Origen</th>
                                            <!--th width="8%"><center>Acciones</center></th-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Fortalezas as $Fortaleza)
                                        <tr>
                                            <td>{{ $Fortaleza->Fortaleza }}</td>
                                            <td class="text-center">{{ $Fortaleza->Nombre }} {{ $Fortaleza->Apellido }}</td>
                                            <td class="text-center">{{ $Fortaleza->Origen == "cadena" ? "Cadena de Valor" : "Participacion de Mercado" }}</td>
                                            <!--td class="text-center">
                                                <a href="#" class="btn btn-success btn-sm text-uppercase" title="Editar" data-toggle="modal" data-target="#EditFortaleza{{ $Fortaleza->Id }}"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                                <- Editar Modal->
                                                <div class="modal fade" id="EditFortaleza{{ $Fortaleza->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content user">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Editar Fortaleza</b></h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form class="user" action="/analisis/edit_fortaleza" method="post">
                                                            <div class="modal-body" style="text-align: start;">
                                                                <input type="hidden" name="id" value="{{ $Fortaleza->Id }}">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <div class="form-group">
                                                                    <label for="fortaleza"><strong>Fortaleza:</strong></label>
                                                                    <input type="text" class="form-control" name="fortaleza" placeholder="Fortaleza..." title="Fortaleza" value="{{ $Fortaleza['Fortaleza'] }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fortaleza"><strong>Como Mantener la Fortaleza?:</strong></label>
                                                                    <textarea class="form-control" name="accion" placeholder="Como Mantener la Fortaleza..." title="Como Mantener la Fortaleza?" rows="5">{{ $Fortaleza['Accion'] }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="submit" class="btn btn-primary btn-block" value="Editar Fortaleza">
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <- Editar Modal->
                                                <a href="#" class="btn btn-danger btn-sm text-uppercase" title="Eliminar" data-toggle="modal" data-target="#DeleteFortaleza{{ $Fortaleza->Id }}"><i class="fa fa-trash" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                                <- Delete Modal->
                                                <div class="modal fade" id="DeleteFortaleza{{ $Fortaleza->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Desea eliminar el registro?</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Haga clic en "Eliminar" si desea eliminar la Fortaleza seleccionada.</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                                <a class="btn btn-primary" href="/analisis/delete_fortaleza/{{ $Fortaleza->Id }}">Eliminar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <- Delete Modal->
                                            </td-->
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="align-items-center">
                                <h5 class="font-weight-bold text-primary">Debilidades de la Empresa</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th>Debilidad</th>
                                            <th width="20%" class="text-center">Creado Por</th>
                                            <th width="15%" class="text-center">Origen</th>
                                            <!--th width="8%"><center>Acciones</center></th-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Debilidades as $Debilidad)
                                        <tr>
                                            <td>{{ $Debilidad->Debilidad }}</td>
                                            <td class="text-center">{{ $Debilidad->Nombre }} {{ $Debilidad->Apellido }}</td>
                                            <td class="text-center">{{ $Debilidad->Origen == "cadena" ? "Cadena de Valor" : "Participacion de Mercado" }}</td>
                                            <!--td class="text-center">
                                                <a href="#" class="btn btn-success btn-sm text-uppercase" title="Editar" data-toggle="modal" data-target="#EditDebilidad{{ $Debilidad->Id }}"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                                <- Editar Modal->
                                                <div class="modal fade" id="EditDebilidad{{ $Debilidad->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content user">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Editar Debilidad</b></h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form class="user" action="/analisis/edit_debilidad" method="post">
                                                            <div class="modal-body" style="text-align: start;">
                                                                <input type="hidden" name="id" value="{{ $Debilidad->Id }}">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <div class="form-group">
                                                                    <label for="debilidad"><strong>Debilidad:</strong></label>
                                                                    <input type="text" class="form-control" name="debilidad" placeholder="Debilidad..." title="Debilidad" value="{{ $Debilidad['Debilidad'] }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fortaleza"><strong>Como Corregir la Debilidad?:</strong></label>
                                                                    <textarea class="form-control" name="accion" placeholder="Como Corregir la Debilidad..." title="Como Corregir la Debilidad?" rows="5">{{ $Debilidad['Accion'] }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="submit" class="btn btn-primary btn-block" value="Editar Debilidad">
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <- Editar Modal->
                                                <a href="#" class="btn btn-danger btn-sm text-uppercase" title="Eliminar" data-toggle="modal" data-target="#DeleteDebilidad{{ $Debilidad->Id }}"><i class="fa fa-trash" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                                <- Delete Modal->
                                                <div class="modal fade" id="DeleteDebilidad{{ $Debilidad->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Desea eliminar el registro?</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Haga clic en "Eliminar" si desea eliminar la Debilidad seleccionada.</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                                <a class="btn btn-primary" href="/analisis/delete_debilidad/{{ $Debilidad->Id }}">Eliminar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <- Delete Modal->
                                            </td-->
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

@stop