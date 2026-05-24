@extends('layouts.default')
@section('content')

<?php $count = 1; ?>

<!-- content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">MATRIZ CAME</h5></div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <p><b>Reflexione y anote acciones a llevar a cabo teniendo en cuenta que estas acciones deben favorecer la ejecución exitosa de la estrategia general identificada.</b></p>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th class="text-center align-middle" width="8%">Acciones</th>
                            <th class="text-center">Corregir las Debilidades</th>
                            <th class="text-center" width="5%">Detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="{{ count($Debilidades) + 1}}" width="10%" class="text-center align-middle" style="font-size: 40px;">C</th>
                        </tr>
                        @foreach($Debilidades as $D)
                            <tr>
                                <td class="text-center align-middle">A{{ $count++ }}</td>
                                <td>{{ $D->Accion }}</td>
                                <td>
                                    <center><a class="btn btn-outline-secondary" title="Detalle" data-toggle="modal" data-target="#D{{ $D->Id }}"><i class="fa fa-search" aria-hidden="true" style="margin: 0 auto;"></i></a></center>
                                    <!-- Colaboradores Modal-->
                                    <div class="modal fade" id="D{{ $D->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Debilidad</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{ $D->Debilidad }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Colaboradores Modal-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th class="text-center align-middle" width="8%">Acciones</th>
                            <th class="text-center">Afrontar las Amenazas</th>
                            <th class="text-center" width="5%">Detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="{{ count($Amenazas) + 1}}" width="10%" class="text-center align-middle" style="font-size: 40px;">A</th>
                        </tr>
                        @foreach($Amenazas as $Am)
                            <tr>
                                <td class="text-center align-middle">A{{ $count++ }}</td>
                                <td>{{ $Am->Accion }}</td>
                                <td>
                                    <center><a class="btn btn-outline-secondary" title="Detalle" data-toggle="modal" data-target="#A{{ $Am->Id }}"><i class="fa fa-search" aria-hidden="true" style="margin: 0 auto;"></i></a></center>
                                    <!-- Colaboradores Modal-->
                                    <div class="modal fade" id="A{{ $Am->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Amenaza</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{ $Am->Amenaza }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Colaboradores Modal-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th class="text-center align-middle" width="8%">Acciones</th>
                            <th class="text-center">Mantener las Fortalezas </th>
                            <th class="text-center" width="5%">Detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="{{ count($Fortalezas) + 1}}" width="10%" class="text-center align-middle" style="font-size: 40px;">M</th>
                        </tr>
                        @foreach($Fortalezas as $F)
                            <tr>
                                <td class="text-center align-middle">A{{ $count++ }}</td>
                                <td>{{ $F->Accion }}</td>
                                <td>
                                    <center><a class="btn btn-outline-secondary" title="Detalle" data-toggle="modal" data-target="#F{{ $F->Id }}"><i class="fa fa-search" aria-hidden="true" style="margin: 0 auto;"></i></a></center>
                                    <!-- Colaboradores Modal-->
                                    <div class="modal fade" id="F{{ $F->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Fortaleza</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{ $F->Fortaleza }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Colaboradores Modal-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th class="text-center align-middle" width="8%">Acciones</th>
                            <th class="text-center">Explotar las Oportunidades</th>
                            <th class="text-center" width="5%">Detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="{{ count($Oportunidades) + 1}}" width="10%" class="text-center align-middle" style="font-size: 40px;">E</th>
                        </tr>
                        @foreach($Oportunidades as $O)
                            <tr>
                                <td class="text-center align-middle">A{{ $count++ }}</td>
                                <td>{{ $O->Accion }}</td>
                                <td>
                                    <center><a class="btn btn-outline-secondary" title="Detalle" data-toggle="modal" data-target="#O{{ $O->Id }}"><i class="fa fa-search" aria-hidden="true" style="margin: 0 auto;"></i></a></center>
                                    <!-- Colaboradores Modal-->
                                    <div class="modal fade" id="O{{ $O->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Oportunidad</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{ $O->Oportunidad }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Colaboradores Modal-->
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