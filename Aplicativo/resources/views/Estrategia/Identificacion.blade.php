@extends('layouts.default')
@section('content')

<!-- content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6 col-sm-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">IDENTIFICACIÓN DE ESTRATEGIAS </h5></div>
                    </div>
                </div>

                <div class="card-body">

                    <form method="POST" action="/estrategia/identificacion_calcular">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">ESTRATEGIA OFENSIVA / FO</h5></div>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th colspan="2" rowspan="2" class="text-center align-middle"></th>
                                            <th colspan="{{ count($Oportunidades) }}" class="text-center align-middle">OPORTUNIDADES</th>
                                        </tr>
                                        <tr>
                                            @foreach($Oportunidades as $Oportunidad)
                                            <th class="text-center">O{{ $Oportunidad->Id }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th rowspan="{{ count($Fortalezas) + 1 }}" class="text-center align-middle">FORTALEZAS</th>
                                        </tr>
                                        @foreach($Fortalezas as $Fortaleza)
                                        <tr>
                                            <td>F{{ $Fortaleza->Id }}</td>
                                            @foreach($Oportunidades as $Oportunidad)
                                            <?php foreach($Foda as $item){ if($item->Codigo == 'F'. $Fortaleza->Id . 'O'. $Oportunidad->Id){ $Valor =  $item->Valor; } } ?>
                                            <td class="text-center">
                                                <input type="number" class="form-control" name="FO{{ $Fortaleza->Id }}{{ $Oportunidad->Id }}" min="0" max="4" value="{{ $Valor }}">
                                            </td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">ESTRATEGIA DEFENSIVA / FA</h5></div>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th colspan="2" rowspan="2" class="text-center align-middle"></th>
                                            <th colspan="{{ count($Amenazas) }}" class="text-center align-middle">AMENAZAS</th>
                                        </tr>
                                        <tr>
                                            @foreach($Amenazas as $Amenaza)
                                            <th class="text-center">A{{ $Amenaza->Id }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th rowspan="{{ count($Fortalezas) + 1 }}" class="text-center align-middle">FORTALEZAS</th>
                                        </tr>
                                        @foreach($Fortalezas as $Fortaleza)
                                        <tr>
                                            <td>F{{ $Fortaleza->Id }}</td>
                                            @foreach($Amenazas as $Amenaza)
                                            <?php foreach($Foda as $item){ if($item->Codigo == 'F'. $Fortaleza->Id . 'A'. $Amenaza->Id){ $Valor =  $item->Valor; } } ?>
                                            <td class="text-center">
                                                <input type="number" class="form-control" name="FA{{ $Fortaleza->Id }}{{ $Amenaza->Id }}" min="0" max="4" value="{{ $Valor }}">
                                            </td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">ESTRATEGIA DE REORIENTACIÓN / DO</h5></div>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th colspan="2" rowspan="2" class="text-center align-middle"></th>
                                            <th colspan="{{ count($Oportunidades) }}" class="text-center align-middle">OPORTUNIDADES</th>
                                        </tr>
                                        <tr>
                                            @foreach($Oportunidades as $Oportunidad)
                                            <th class="text-center">O{{ $Oportunidad->Id }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th rowspan="{{ count($Debilidades) + 1 }}" class="text-center align-middle">DEBILIDADES</th>
                                        </tr>
                                        @foreach($Debilidades as $Debilidad)
                                        <tr>
                                            <td>D{{ $Debilidad->Id }}</td>
                                            @foreach($Oportunidades as $Oportunidad)
                                            <?php foreach($Foda as $item){ if($item->Codigo == 'D'. $Debilidad->Id . 'O'. $Oportunidad->Id){ $Valor =  $item->Valor; } } ?>
                                            <td class="text-center">
                                                <input type="number" class="form-control" name="DO{{ $Debilidad->Id }}{{ $Oportunidad->Id }}" min="0" max="4" value="{{ $Valor }}">
                                            </td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">ESTRATEGIA DE SUPERVIVENCIA / DA</h5></div>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th colspan="2" rowspan="2" class="text-center align-middle"></th>
                                            <th colspan="{{ count($Amenazas) }}" class="text-center align-middle">AMENAZAS</th>
                                        </tr>
                                        <tr>
                                            @foreach($Amenazas as $Amenaza)
                                            <th class="text-center">A{{ $Amenaza->Id }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th rowspan="{{ count($Debilidades) + 1 }}" class="text-center align-middle">DEBILIDADES</th>
                                        </tr>
                                        @foreach($Debilidades as $Debilidad)
                                        <tr>
                                            <td>D{{ $Debilidad->Id }}</td>
                                            @foreach($Amenazas as $Amenaza)
                                            <?php foreach($Foda as $item){ if($item->Codigo == 'D'. $Debilidad->Id . 'A'. $Amenaza->Id){ $Valor =  $item->Valor; } } ?>
                                            <td class="text-center">
                                                <input type="number" class="form-control" name="DA{{ $Debilidad->Id }}{{ $Amenaza->Id }}" min="0" max="4" value="{{ $Valor }}">
                                            </td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4 mb-0">
                        <button type="submit" class="btn btn-primary w-100">IDENTIFICAR ESTRATEGIA</button>
                    </div>
                    </form>
                </div>

            </div>
        
        </div>

        <div class="col-lg-6 col-sm-12">
            <div class="sticky-table-container">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" width="10%"></th>
                                <th class="text-center" width="10%">CODIGO</th>
                                <th class="text-center">DESCRIPCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="{{ count($Fortalezas) + 1}}" class="text-center align-middle">FORTALEZAS</th>
                            </tr>
                            @foreach($Fortalezas as $Fortaleza)
                            <tr>
                                <td>F{{ $Fortaleza->Id }}</td>
                                <td>{{ $Fortaleza->Fortaleza }}</td>
                            </tr>
                            @endforeach

                            <tr>
                                <th rowspan="{{ count($Debilidades) + 1}}" class="text-center align-middle">DEBILIDADES</th>
                            </tr>
                            @foreach($Debilidades as $Debilidad)
                            <tr>
                                <td>D{{ $Debilidad->Id }}</td>
                                <td>{{ $Debilidad->Debilidad }}</td>
                            </tr>
                            @endforeach

                            <tr>
                                <th rowspan="{{ count($Oportunidades) + 1}}" class="text-center align-middle">OPORTUNIDADES</th>
                            </tr>
                            @foreach($Oportunidades as $Oportunidad)
                            <tr>
                                <td>O{{ $Oportunidad->Id }}</td>
                                <td>{{ $Oportunidad->Oportunidad }}</td>
                            </tr>
                            @endforeach

                            <tr>
                                <th rowspan="{{ count($Amenazas) + 1}}" class="text-center align-middle">AMENAZAS</th>
                            </tr>
                            @foreach($Amenazas as $Amenaza)
                            <tr>
                                <td>A{{ $Amenaza->Id }}</td>
                                <td>{{ $Amenaza->Amenaza }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th colspan="3" class="text-center align-middle">SINTESIS DE RESULTADOS</th>
                </tr>
                <tr>
                    <th class="text-center">Relación</th>
                    <th class="text-center">Tipo de Estrategia</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <tr class="{{ $Estrategia->Estrategia == 'FO' ? 'table-success' : '' }}">
                    <td class="text-center"><strong>FO</strong></td>
                    <td class="text-center">OFENSIVA</td>
                    <td>Deberá adoptar estrategias de crecimiento.</td>
                </tr>
                <tr class="{{ $Estrategia->Estrategia == 'FA' ? 'table-success' : '' }}">
                    <td class="text-center"><strong>FA</strong></td>
                    <td class="text-center">DEFENSIVA</td>
                    <td>La empresa está preparada para enfrentarse a las amenazas.</td>
                </tr>
                <tr class="{{ $Estrategia->Estrategia == 'DO' ? 'table-success' : '' }}">
                    <td class="text-center"><strong>DO</strong></td>
                    <td class="text-center">REORIENTACIÓN</td>
                    <td>La empresa no puede aprovechar las oportunidades porque carece de preparación adecuada.</td>
                </tr>
                <tr class="{{ $Estrategia->Estrategia == 'DA' ? 'table-success' : '' }}">
                    <td class="text-center"><strong>DA</strong></td>
                    <td class="text-center">SUPERVIVENCIA</td>
                    <td>Se enfrenta a amenazas externas sin las fortalezas necesarias para luchar con la competencia.</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

</div>

@stop