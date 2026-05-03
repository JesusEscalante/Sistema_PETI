@extends('layouts.default')
@section('content')

<!-- content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">PLANES ESTRATEGICOS</h5></div>
                <div class="col-lg-6 col-sm-12 d-flex justify-content-end row">
                    <a href="/plan/add_plan" class="btn btn-primary btn-icon-split ml-1">
                        <i class="fa fa-plus"></i>
                        <span class="text">Generar Plan Estratégico</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-gray-100">
                        <tr>
                            <th>CODIGO</th>
                            <th>FECHA</th>
                            <th width="20%"><center>ACCIONES</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Planes as $Plan)
                        <tr>
                            <td>PE-{{ str_pad($Plan->Id, 3, "0", STR_PAD_LEFT) }}</td>
                            <td>{{ date('d/m/Y h:i:s', strtotime($Plan->Fecha)) }}</td>
                            <td class="text-center">
                                <a href="/plan/detalle/{{ $Plan->Id }}" class="btn btn-success btn-sm text-uppercase" title="Resumen de Plan Estratégico"><i class="fa fa-bars" aria-hidden="true" style="margin: 0 auto;"></i></a>

                                <a href="#" class="btn btn-danger btn-sm text-uppercase" title="Eliminar" data-toggle="modal" data-target="#DeleteValor{{ $Plan->Id }}"><i class="fa fa-trash" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                <!-- Delete Modal-->
                                <div class="modal fade" id="DeleteValor{{ $Plan->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <a class="btn btn-primary" href="/plan/delete_plan/{{ $Plan->Id }}">Eliminar</a>
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


</div>

</div>

@stop