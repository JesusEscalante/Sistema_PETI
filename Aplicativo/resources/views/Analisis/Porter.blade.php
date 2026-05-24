@extends('layouts.default')
@section('content')

<!-- content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">ANALISIS EXTERNO MICROENTORNO: MATRIZ DE PORTER</h5></div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <p><b>A continuación seleccione las casillas que estime conveniente según el estado actual de su empresa. Valore su perfil competitivo en la escala Hostil-Favorable. Al finalizar lea la conclusión, para su caso particular, relativa al análisis del entorno próximo.</b></p>
            </div>

            <form action="/analisis/porter_calcular" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="planid" value="{{ $PlanId }}">

            <div class="row">

                <div class="col-lg-6 col-sm-12">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th colspan="8" class="text-center align-middle">RIVALIDAD DE EMPRESAS DEL SECTOR</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle">PERFIL COMPETITIVO</th>
                                    <th class="text-center align-middle">Hostil</th>
                                    <th class="text-center align-middle">Nada</th>
                                    <th class="text-center align-middle">Poco</th>
                                    <th class="text-center align-middle">Medio</th>
                                    <th class="text-center align-middle">Alto</th>
                                    <th class="text-center align-middle">Muy Alto</th>
                                    <th class="text-center align-middle">Favorable</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Fuerza01 as $Fuerza01)
                                <tr>
                                    <td>{{ $Fuerza01->Perfil }}</td>
                                    <td class="text-center">{{ $Fuerza01->Hostil }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza01->Codigo }}_ID{{ $Fuerza01->Id }}" value="1" {{ $Fuerza01->Valor == 1 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza01->Codigo }}_ID{{ $Fuerza01->Id }}" value="2" {{ $Fuerza01->Valor == 2 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza01->Codigo }}_ID{{ $Fuerza01->Id }}" value="3" {{ $Fuerza01->Valor == 3 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza01->Codigo }}_ID{{ $Fuerza01->Id }}" value="4" {{ $Fuerza01->Valor == 4 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza01->Codigo }}_ID{{ $Fuerza01->Id }}" value="5" {{ $Fuerza01->Valor == 5 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $Fuerza01->Favorable }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th colspan="8" class="text-center align-middle">BARRERAS DE ENTRADA</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle">PERFIL COMPETITIVO</th>
                                    <th class="text-center align-middle">Hostil</th>
                                    <th class="text-center align-middle">Nada</th>
                                    <th class="text-center align-middle">Poco</th>
                                    <th class="text-center align-middle">Medio</th>
                                    <th class="text-center align-middle">Alto</th>
                                    <th class="text-center align-middle">Muy Alto</th>
                                    <th class="text-center align-middle">Favorable</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Fuerza02 as $Fuerza02)
                                <tr>
                                    <td>{{ $Fuerza02->Perfil }}</td>
                                    <td class="text-center">{{ $Fuerza02->Hostil }}</td>

                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza02->Codigo }}_ID{{ $Fuerza02->Id }}" value="1" {{ $Fuerza02->Valor == 1 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza02->Codigo }}_ID{{ $Fuerza02->Id }}" value="2" {{ $Fuerza02->Valor == 2 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza02->Codigo }}_ID{{ $Fuerza02->Id }}" value="3" {{ $Fuerza02->Valor == 3 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza02->Codigo }}_ID{{ $Fuerza02->Id }}" value="4" {{ $Fuerza02->Valor == 4 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza02->Codigo }}_ID{{ $Fuerza02->Id }}" value="5" {{ $Fuerza02->Valor == 5 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $Fuerza02->Favorable }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th colspan="8" class="text-center align-middle">PODER DE LOS CLIENTES</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle">PERFIL COMPETITIVO</th>
                                    <th class="text-center align-middle">Hostil</th>
                                    <th class="text-center align-middle">Nada</th>
                                    <th class="text-center align-middle">Poco</th>
                                    <th class="text-center align-middle">Medio</th>
                                    <th class="text-center align-middle">Alto</th>
                                    <th class="text-center align-middle">Muy Alto</th>
                                    <th class="text-center align-middle">Favorable</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Fuerza03 as $Fuerza03)
                                <tr>
                                    <td>{{ $Fuerza03->Perfil }}</td>
                                    <td class="text-center">{{ $Fuerza03->Hostil }}</td>

                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza03->Codigo }}_ID{{ $Fuerza03->Id }}" value="1" {{ $Fuerza03->Valor == 1 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza03->Codigo }}_ID{{ $Fuerza03->Id }}" value="2" {{ $Fuerza03->Valor == 2 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza03->Codigo }}_ID{{ $Fuerza03->Id }}" value="3" {{ $Fuerza03->Valor == 3 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza03->Codigo }}_ID{{ $Fuerza03->Id }}" value="4" {{ $Fuerza03->Valor == 4 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza03->Codigo }}_ID{{ $Fuerza03->Id }}" value="5" {{ $Fuerza03->Valor == 5 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $Fuerza03->Favorable }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th colspan="8" class="text-center align-middle">PRODUCTOS SUSTITUTIVOS</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle">PERFIL COMPETITIVO</th>
                                    <th class="text-center align-middle">Hostil</th>
                                    <th class="text-center align-middle">Nada</th>
                                    <th class="text-center align-middle">Poco</th>
                                    <th class="text-center align-middle">Medio</th>
                                    <th class="text-center align-middle">Alto</th>
                                    <th class="text-center align-middle">Muy Alto</th>
                                    <th class="text-center align-middle">Favorable</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Fuerza04 as $Fuerza04)
                                <tr>
                                    <td>{{ $Fuerza04->Perfil }}</td>
                                    <td class="text-center">{{ $Fuerza04->Hostil }}</td>

                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza04->Codigo }}_ID{{ $Fuerza04->Id }}" value="1" {{ $Fuerza04->Valor == 1 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza04->Codigo }}_ID{{ $Fuerza04->Id }}" value="2" {{ $Fuerza04->Valor == 2 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza04->Codigo }}_ID{{ $Fuerza04->Id }}" value="3" {{ $Fuerza04->Valor == 3 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza04->Codigo }}_ID{{ $Fuerza04->Id }}" value="4" {{ $Fuerza04->Valor == 4 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-check-input ml-0" type="radio" name="{{ $Fuerza04->Codigo }}_ID{{ $Fuerza04->Id }}" value="5" {{ $Fuerza04->Valor == 5 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $Fuerza04->Favorable }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="form-group mt-3">
                <button class="btn btn-primary w-100" type="submit">CALCULAR</button>
            </div>

            </form>
        </div>

        <div class="card-footer">
            <div class="table-responsive mt-2">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center align-middle" width="220px">CONCLUSIÓN</th>
                            <th class="text-center align-middle">{{ $Conclusion }}</th>
                            <th class="text-center">
                                Total:<br>
                                {{ $SUMA }}
                            </th>
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
                                    <input type="hidden" name="modulo" value="porter">
                                    <input type="hidden" name="planid" value="{{ $PlanId}}">
                                    <div class="form-group">
                                        <label for="oportunidad"><strong>Oportunidad:</strong></label>
                                        <input type="text" class="form-control" name="oportunidad" placeholder="Oportunidad..." title="Oportunidad">
                                    </div>
                                    <div class="form-group">
                                        <label for="fortaleza"><strong>Como Explotar la Oportunidad?:</strong></label>
                                        <textarea class="form-control" name="accion" placeholder="Como Explotar la Oportunidad..." title="Como Explotar la Oportunidad?" rows="5"></textarea>
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
                    
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th>Oportunidad</th>
                                    <th width="20%"><center>Acciones</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Oportunidades as $Oportunidad)
                                @if($Oportunidad->Origen == "porter")
                                <tr>
                                    <td>{{ $Oportunidad->Oportunidad }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-success btn-sm text-uppercase" title="Editar" data-toggle="modal" data-target="#EditOportunidad{{ $Oportunidad->Id }}"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                        <!-- Editar Modal-->
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
                                                        <div class="form-group">
                                                            <label for="fortaleza"><strong>Como Explotar la Oportunidad?:</strong></label>
                                                            <textarea class="form-control" name="accion" placeholder="Como Explotar la Oportunidad..." title="Como Explotar la Oportunidad?" rows="5">{{ $Oportunidad['Accion'] }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary btn-block" value="Editar Oportunidad">
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Editar Modal-->
                                        <a href="#" class="btn btn-danger btn-sm text-uppercase" title="Eliminar" data-toggle="modal" data-target="#DeleteOportunidad{{ $Oportunidad->Id }}"><i class="fa fa-trash" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                        <!-- Delete Modal-->
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
                                        <!-- Delete Modal-->
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
                                    <input type="hidden" name="modulo" value="porter">
                                    <input type="hidden" name="planid" value="{{ $PlanId}}">
                                    <div class="form-group">
                                        <label for="amenaza"><strong>Amenaza:</strong></label>
                                        <input type="text" class="form-control" name="amenaza" placeholder="Amenaza..." title="Amenaza">
                                    </div>
                                    <div class="form-group">
                                        <label for="fortaleza"><strong>Como Afrontar la Amenaza?:</strong></label>
                                        <textarea class="form-control" name="accion" placeholder="Como Afrontar la Amenaza..." title="Como Afrontar la Amenaza?" rows="5"></textarea>
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

                    <hr>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th>Amenaza</th>
                                    <th width="20%"><center>Acciones</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Amenazas as $Amenaza)
                                @if($Amenaza->Origen == "porter")
                                <tr>
                                    <td>{{ $Amenaza->Amenaza }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-success btn-sm text-uppercase" title="Editar" data-toggle="modal" data-target="#EditAmenaza{{ $Amenaza->Id }}"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                        <!-- Editar Modal-->
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
                                                        <div class="form-group">
                                                            <label for="fortaleza"><strong>Como Afrontar la Amenaza?:</strong></label>
                                                            <textarea class="form-control" name="accion" placeholder="Como Afrontar la Amenaza..." title="Como Afrontar la Amenaza?" rows="5">{{ $Amenaza['Accion'] }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary btn-block" value="Editar Amenaza">
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Editar Modal-->
                                        <a href="#" class="btn btn-danger btn-sm text-uppercase" title="Eliminar" data-toggle="modal" data-target="#DeleteAmenaza{{ $Amenaza->Id }}"><i class="fa fa-trash" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                        <!-- Delete Modal-->
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
                                        <!-- Delete Modal-->
                                    </td>
                                </tr>
                                @endif
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

@stop