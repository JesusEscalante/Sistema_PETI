@extends('layouts.default')
@section('content')

<!-- content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">ANALISIS EXTERNO</h5></div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="align-items-center">
                                <h5 class="font-weight-bold text-primary">Oportunidades de la Empresa</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th>Oportunidad</th>
                                            <th width="20%" class="text-center">Creado Por</th>
                                            <th width="15%" class="text-center">Origen</th>
                                            <!--th width="20%"><center>Acciones</center></th-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Oportunidades as $Oportunidad)
                                        <tr>
                                            <td>{{ $Oportunidad->Oportunidad }}</td>
                                            <td class="text-center">{{ $Oportunidad->Nombre }} {{ $Oportunidad->Apellido }}</td>
                                            <td class="text-center">{{ $Oportunidad->Origen == "porter" ? "Fuerzas de Porter" : "PEST" }}</td>
                                            <!--td class="text-center">
                                                <a href="#" class="btn btn-success btn-sm text-uppercase" title="Editar" data-toggle="modal" data-target="#EditOportunidad{{ $Oportunidad->Id }}"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                                <!-- Editar Modal->
                                                <div class="modal fade" id="EditOportunidad{{ $Oportunidad->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content user">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Editar Oportunidad</b></h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form class="user" action="/analisis/edit_oportunidad" method="post">
                                                            <div class="modal-body" style="text-align: start;">
                                                                <input type="hidden" name="id" value="{{ $Oportunidad->Id }}">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <div class="form-group">
                                                                    <label for="oportunidad"><strong>Oportunidad:</strong></label>
                                                                    <input type="text" class="form-control" name="oportunidad" placeholder="Oportunidad..." title="Oportunidad" value="{{ $Oportunidad['Oportunidad'] }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="submit" class="btn btn-primary btn-block" value="Editar Oportunidad">
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Editar Modal->
                                                <a href="#" class="btn btn-danger btn-sm text-uppercase" title="Eliminar" data-toggle="modal" data-target="#DeleteOportunidad{{ $Oportunidad->Id }}"><i class="fa fa-trash" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                                <!-- Delete Modal->
                                                <div class="modal fade" id="DeleteOportunidad{{ $Oportunidad->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Desea eliminar el registro?</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Haga clic en "Eliminar" si desea eliminar la Oportunidad seleccionada.</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                                <a class="btn btn-primary" href="/analisis/delete_oportunidad/{{ $Oportunidad->Id }}">Eliminar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Delete Modal->
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
                                <h5 class="font-weight-bold text-primary">Amenazas para la Empresa</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th>Amenaza</th>
                                            <th width="20%" class="text-center">Creado Por</th>
                                            <th width="15%" class="text-center">Origen</th>
                                            <!--th width="20%"><center>Acciones</center></th-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Amenazas as $Amenaza)
                                        <tr>
                                            <td>{{ $Amenaza->Amenaza }}</td>
                                            <td class="text-center">{{ $Amenaza->Nombre }} {{ $Amenaza->Apellido }}</td>
                                            <td class="text-center">{{ $Amenaza->Origen == "porter" ? "Fuerzas de Porter" : "PEST" }}</td>
                                            <!--td class="text-center">
                                                <a href="#" class="btn btn-success btn-sm text-uppercase" title="Editar" data-toggle="modal" data-target="#EditAmenaza{{ $Amenaza->Id }}"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                                <!-- Editar Modal->
                                                <div class="modal fade" id="EditAmenaza{{ $Amenaza->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content user">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Editar Amenaza</b></h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form class="user" action="/analisis/edit_amenaza" method="post">
                                                            <div class="modal-body" style="text-align: start;">
                                                                <input type="hidden" name="id" value="{{ $Amenaza->Id }}">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <div class="form-group">
                                                                    <label for="amenaza"><strong>Amenaza:</strong></label>
                                                                    <input type="text" class="form-control" name="amenaza" placeholder="Amenaza..." title="Amenaza" value="{{ $Amenaza['Amenaza'] }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="submit" class="btn btn-primary btn-block" value="Editar Amenaza">
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Editar Modal->
                                                <a href="#" class="btn btn-danger btn-sm text-uppercase" title="Eliminar" data-toggle="modal" data-target="#DeleteAmenaza{{ $Amenaza->Id }}"><i class="fa fa-trash" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                                <!-- Delete Modal->
                                                <div class="modal fade" id="DeleteAmenaza{{ $Amenaza->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Desea eliminar el registro?</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Haga clic en "Eliminar" si desea eliminar la Amenaza seleccionada.</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                                <a class="btn btn-primary" href="/analisis/delete_amenaza/{{ $Amenaza->Id }}">Eliminar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Delete Modal->
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

</div>

@stop