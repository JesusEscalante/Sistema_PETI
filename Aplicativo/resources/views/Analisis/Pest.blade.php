@extends('layouts.default')
@section('content')

<!-- content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">ANÁLISIS INTERNO MACROENTORNO: PEST</h5></div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <p><b>A continuación seleccione el valor que mejor describa su empresa en función de cada una de las afirmaciones, de tal forma que 0= En total en desacuerdo; 1= No está de acuerdo; 2= Está de acuerdo; 3= Está bastante de acuerdo; 4= En total acuerdo.</b></p>
            </div>
            <div class="table-responsive">
                <form class="form" action="/analisis/pest_calcular" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th rowspan="3" width="15px" class="text-center align-middle">N°</th>
                            <th rowspan="3" width="60%" class="align-middle">AUTODIAGNÓSTICO ENTORNO GLOBAL P.E.S.T.</th>
                            <th colspan="5" class="text-center p-0">VALORACIÓN</th>
                        </tr>
                        <tr>
                            <th class="text-center p-0">En total desacuerdo</th>
                            <th class="text-center p-0">No está de acuerdo</th>
                            <th class="text-center p-0">Está de acuerdo</th>
                            <th class="text-center p-0">Está bastante de acuerdo</th>
                            <th class="text-center p-0">En total acuerdo</th>
                        </tr>
                        <tr>
                            <th class="text-center p-0">0</th>
                            <th class="text-center p-0">1</th>
                            <th class="text-center p-0">2</th>
                            <th class="text-center p-0">3</th>
                            <th class="text-center p-0">4</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Pest as $Pest)
                        <tr>
                            <td class="text-center">{{ $Pest->Id }}</td>
                            <td>{{ $Pest->Pregunta }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input ml-0" type="radio" name="valor{{ $Pest->Id }}" value="0" {{ $Pest->Valor == 0 ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input ml-0" type="radio" name="valor{{ $Pest->Id }}" value="1" {{ $Pest->Valor == 1 ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input ml-0" type="radio" name="valor{{ $Pest->Id }}" value="2" {{ $Pest->Valor == 2 ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input ml-0" type="radio" name="valor{{ $Pest->Id }}" value="3" {{ $Pest->Valor == 3 ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input ml-0" type="radio" name="valor{{ $Pest->Id }}" value="4" {{ $Pest->Valor == 4 ? 'checked' : '' }}>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <!--tfooter>
                        <tr>
                            <td colspan="2" class="text-center font-weight-bold">TOTAL</td>
                            <td class="text-center font-weight-bold">{{ $Pest->where('Valor', 0)->count() }}</td>
                            <td class="text-center font-weight-bold">{{ $Pest->where('Valor', 1)->count() }}</td>
                            <td class="text-center font-weight-bold">{{ $Pest->where('Valor', 2)->count() }}</td>
                            <td class="text-center font-weight-bold">{{ $Pest->where('Valor', 3)->count() }}</td>
                            <td class="text-center font-weight-bold">{{ $Pest->where('Valor', 4)->count() }}</td>
                        </tr>
                    </tfooter-->
                </table>
                <div class="form-group mt-4 mb-0">
                    <button type="submit" class="btn btn-primary w-100">CALCULAR</button>
                </div>
                </form>
            </div>
        </div>
        <div class="card-footer">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th rowspan="5" class="text-center align-middle" width="220px">CONCLUSIÓNES</th>
                            <th class="text-start align-middle">{{ $Conclusion01 }}</th>
                        </tr>
                        <tr>
                            <th class="text-start align-middle">{{ $Conclusion02 }}</th>
                        </tr>
                        <tr>
                            <th class="text-start align-middle">{{ $Conclusion03 }}</th>
                        </tr>
                        <tr>
                            <th class="text-start align-middle">{{ $Conclusion04 }}</th>
                        </tr>
                        <tr>
                            <th class="text-start align-middle">{{ $Conclusion05 }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-lg-6">
                    <a href="#" class="btn btn-dark btn-icon-split w-100" data-toggle="modal" data-target="#AddOportunidad">
                        <i class="fa fa-plus"></i>
                        <span class="text">Agregar Oportunidad</span>
                    </a>
                    <!-- Agregar Modal-->
                    <div class="modal fade" id="AddOportunidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content user">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Agregar Oportunidad</b></h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form class="user" action="/empresa/add_oportunidad" method="post">
                                <div class="modal-body" style="text-align: start;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="modulo" value="pest">
                                    <div class="form-group">
                                        <label for="oportunidad"><strong>Oportunidad:</strong></label>
                                        <input type="text" class="form-control" name="oportunidad" placeholder="Oportunidad..." title="Oportunidad">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary btn-block" value="Agregar Oportunidad">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Agregar Modal-->              
                </div>

                <div class="col-lg-6">
                    <a href="#" class="btn btn-dark btn-icon-split w-100" data-toggle="modal" data-target="#AddAmenaza">
                        <i class="fa fa-plus"></i>
                        <span class="text">Agregar Amenaza</span>
                    </a>
                    <!-- Agregar Modal-->
                    <div class="modal fade" id="AddAmenaza" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content user">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Agregar Amenaza</b></h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form class="user" action="/analisis/add_amenaza" method="post">
                                <div class="modal-body" style="text-align: start;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="modulo" value="pest">
                                    <div class="form-group">
                                        <label for="amenaza"><strong>Amenaza:</strong></label>
                                        <input type="text" class="form-control" name="amenaza" placeholder="Amenaza..." title="Amenaza">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary btn-block" value="Agregar Amenaza">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Agregar Modal-->                  
                </div>
            </div>
        </div>
    </div>

</div>

</div>

@stop