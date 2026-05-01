@extends('layouts.default')
@section('content')

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
                <form class="form" action="/analisis/save_came" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th class="text-center align-middle" width="10%">Acciones</th>
                            <th class="text-center">Corregir las Debilidades</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="{{ count($Debilidades) + 1}}" width="10%" class="text-center align-middle" style="font-size: 40px;">C</th>
                        </tr>
                        @foreach($Came as $C)
                            @foreach($Debilidades as $D)
                                @if($C->Tipo[0] == 'C' && substr($C->Tipo, 1) == $D->Id)
                                    <tr>
                                        <td class="text-center align-middle">A{{ $C->Id }}</td>
                                        <td>
                                            <input type="text" class="form-control" name="{{ $C->Tipo }}" value="{{ $C->Accion }}">
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th class="text-center align-middle" width="10%">Acciones</th>
                            <th class="text-center">Afrontar las Amenazas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="{{ count($Amenazas) + 1}}" width="10%" class="text-center align-middle" style="font-size: 40px;">A</th>
                        </tr>
                        @foreach($Came as $A)
                            @foreach($Amenazas as $Am)
                                @if($A->Tipo[0] == 'A' && substr($A->Tipo, 1) == $Am->Id)
                                    <tr>
                                        <td class="text-center align-middle">A{{ $A->Id }}</td>
                                        <td>
                                            <input type="text" class="form-control" name="{{ $A->Tipo }}" value="{{ $A->Accion }}">
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th class="text-center align-middle" width="10%">Acciones</th>
                            <th class="text-center">Mantener las Fortalezas </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="{{ count($Fortalezas) + 1}}" width="10%" class="text-center align-middle" style="font-size: 40px;">M</th>
                        </tr>
                        @foreach($Came as $M)
                            @foreach($Fortalezas as $F)
                                @if($M->Tipo[0] == 'M' && substr($M->Tipo, 1) == $F->Id)
                                    <tr>
                                        <td class="text-center align-middle">A{{ $M->Id }}</td>
                                        <td>
                                            <input type="text" class="form-control" name="{{ $M->Tipo }}" value="{{ $M->Accion }}">
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th class="text-center align-middle" width="10%">Acciones</th>
                            <th class="text-center">Explotar las Oportunidades</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="{{ count($Oportunidades) + 1}}" width="10%" class="text-center align-middle" style="font-size: 40px;">E</th>
                        </tr>
                        @foreach($Came as $E)
                            @foreach($Oportunidades as $O)
                                @if($E->Tipo[0] == 'E' && substr($E->Tipo, 1) == $O->Id)
                                    <tr>
                                        <td class="text-center align-middle">A{{ $E->Id }}</td>
                                        <td>
                                            <input type="text" class="form-control" name="{{ $E->Tipo }}" value="{{ $E->Accion }}">
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                <div class="form-group mt-4 mb-0">
                    <button type="submit" class="btn btn-primary w-100">GUARDAR</button>
                </div>
                </form>
            </div>
        </div>

    </div>


</div>

</div>

@stop