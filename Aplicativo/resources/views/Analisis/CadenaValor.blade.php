@extends('layouts.default')
@section('content')

<!-- content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">ANÁLISIS INTERNO: LA CADENA DE VALOR</h5></div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <p><b>A continuación seleccione el valor que mejor describa su empresa en función de cada una de las afirmaciones, de tal forma que 0= En total en desacuerdo; 1= No está de acuerdo; 2=Está de acuerdo; 3= Está bastante de acuerdo; 4=En total acuerdo.</b></p>
            </div>
            <div class="table-responsive">
                <form class="form" action="/analisis/cadena_calcular" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th rowspan="3" width="15px" class="text-center align-middle">N°</th>
                            <th rowspan="3" width="60%" class="align-middle">AUTODIAGNÓSTICO DE LA CADENA DE VALOR INTERNA</th>
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
                        @foreach($CadenaValor as $Valor)
                        <tr>
                            <td class="text-center">{{ $Valor->Id }}</td>
                            <td>{{ $Valor->Pregunta }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input ml-0" type="radio" name="valor{{ $Valor->Id }}" value="0" {{ $Valor->Valor == 0 ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input ml-0" type="radio" name="valor{{ $Valor->Id }}" value="1" {{ $Valor->Valor == 1 ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input ml-0" type="radio" name="valor{{ $Valor->Id }}" value="2" {{ $Valor->Valor == 2 ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input ml-0" type="radio" name="valor{{ $Valor->Id }}" value="3" {{ $Valor->Valor == 3 ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input ml-0" type="radio" name="valor{{ $Valor->Id }}" value="4" {{ $Valor->Valor == 4 ? 'checked' : '' }}>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="form-group mt-4 mb-0">
                    <button type="submit" class="btn btn-primary w-100">CALCULAR</button>
                </div>
                </form>
            </div>
        </div>
        <div class="card-footer">
            <div class="table-responsive mt-2">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr height="100px">
                            <th width="15%" class="text-center align-middle">CONCLUSIÓN</th>
                            <th class="align-middle">POTENCIAL DE MEJORA DE LA CADENA DE VALOR INTERNA</th>
                            <th class="text-center align-middle">{{ $Potencial }}%</th>
                        </tr>
                    </thead>
                </table>
                
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-lg-6">
                    <a href="#" class="btn btn-dark btn-icon-split w-100" data-toggle="modal" data-target="#AddUnidad">
                        <i class="fa fa-plus"></i>
                        <span class="text">Agregar Fortaleza</span>
                    </a>
                    <!-- Agregar Modal-->
                    <div class="modal fade" id="AddUnidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content user">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Agregar Fortaleza</b></h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form class="user" action="/analisis/add_fortaleza" method="post">
                                <div class="modal-body" style="text-align: start;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="modulo" value="cadena">
                                    <div class="form-group">
                                        <label for="fortaleza"><strong>Fortaleza:</strong></label>
                                        <input type="text" class="form-control" name="fortaleza" placeholder="Fortaleza..." title="Fortaleza">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary btn-block" value="Agregar Fortaleza">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Agregar Modal-->                
                </div>

                <div class="col-lg-6">
                    <a href="#" class="btn btn-dark btn-icon-split w-100" data-toggle="modal" data-target="#AddDebilidad">
                        <i class="fa fa-plus"></i>
                        <span class="text">Agregar Debilidad</span>
                    </a>
                    <!-- Agregar Modal-->
                    <div class="modal fade" id="AddDebilidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content user">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Agregar Debilidad</b></h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form class="user" action="/analisis/add_debilidad" method="post">
                                <div class="modal-body" style="text-align: start;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="modulo" value="cadena">
                                    <div class="form-group">
                                        <label for="debilidad"><strong>Debilidad:</strong></label>
                                        <input type="text" class="form-control" name="debilidad" placeholder="Debilidad..." title="Debilidad">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary btn-block" value="Agregar Debilidad">
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