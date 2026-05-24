@extends('layouts.default')
@section('content')

<!-- content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">ANÁLISIS INTERNO: MATRIZ DE CRECIMIENTO - PARTICIPACIÓN BCG</h5></div>
            </div>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <p><b>Reflexione y anote acciones a llevar a cabo teniendo en cuenta que estas acciones deben favorecer la ejecución exitosa de la estrategia general identificada.</b></p>
            </div>

            <div class="row">

                <div class="col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">PRODUCTOS</h5></div>
                                <div class="col-lg-6 col-sm-12 d-flex justify-content-end row">
                                    <a href="#" class="btn btn-primary btn-icon-split ml-1" data-toggle="modal" data-target="#AddProducto">
                                        <i class="fa fa-plus"></i>
                                        <span class="text">Agregar</span>
                                    </a>
                                    <!-- Agregar Modal-->
                                    <div class="modal fade" id="AddProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content user">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Agregar Producto</b></h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form class="user" action="/analisis/add_producto" method="post">
                                                <div class="modal-body" style="text-align: start;">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="planid" value="{{ $PlanId }}">
                                                    <div class="form-group row">
                                                        <div class="col-lg-8">
                                                            <label for="unidad"><strong>Nombre de Producto:</strong></label>
                                                            <input type="text" class="form-control" name="nombre" placeholder="Nombre de Producto..." title="Nombre de Producto">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label for="unidad"><strong>Ventas:</strong></label>
                                                            <input type="number" class="form-control" name="ventas" placeholder="Ventas..." title="Ventas" min="0" max="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary btn-block" value="Agregar">
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
                                    <thead class="table-light">
                                        <tr>
                                            <th colspan="4" class="text-center align-middle">PREVISIÓN DE VENTAS</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center align-middle">PRODUCTOS</th>
                                            <th class="text-center align-middle" width="15%">VENTAS</th>
                                            <th class="text-center align-middle" width="15%">% VENTAS</th>
                                            <th class="text-center align-middle" width="15%">ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Productos as $Item)
                                        <tr>
                                            <td>{{ $Item->Nombre }}</td>
                                            <td class="text-center align-middle">{{ $Item->Ventas }}</td>
                                            <td class="text-center align-middle">{{ $Item->Porcentaje }}%</td>
                                            <td class="text-center align-middle">
                                                <a href="#" class="btn btn-success btn-sm text-uppercase" title="Editar" data-toggle="modal" data-target="#EditProducto{{ $Item->Id }}"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                                <!-- Editar Modal-->
                                                <div class="modal fade" id="EditProducto{{ $Item->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content user">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Editar Producto</b></h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form class="user" action="/analisis/edit_producto" method="post">
                                                            <div class="modal-body" style="text-align: start;">
                                                                <input type="hidden" name="id" value="{{ $Item->Id }}">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <div class="form-group row">
                                                                    <div class="col-lg-8">
                                                                        <label for="unidad"><strong>Nombre de Producto:</strong></label>
                                                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de Producto..." title="Nombre de Producto" value="{{ $Item->Nombre }}">
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="unidad"><strong>Ventas:</strong></label>
                                                                        <input type="number" class="form-control" name="ventas" placeholder="Ventas..." title="Ventas" value="{{ $Item->Ventas }}" min="0" max="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="submit" class="btn btn-primary btn-block" value="Editar">
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Editar Modal-->
                                                <a href="#" class="btn btn-danger btn-sm text-uppercase" title="Eliminar" data-toggle="modal" data-target="#DeleteProducto{{ $Item->Id }}"><i class="fa fa-trash" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                                <!-- Delete Modal-->
                                                <div class="modal fade" id="DeleteProducto{{ $Item->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Desea eliminar el registro?</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Haga clic en "Eliminar" si desea eliminar el producto seleccionado.</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                                <a class="btn btn-primary" href="/analisis/delete_producto/{{ $Item->Id }}">Eliminar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Delete Modal-->
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <th class="text-center align-middle">TOTAL</th>
                                            <th class="text-center align-middle">{{ $TotalProductos }}</th>
                                            <th class="text-center align-middle">100%</th>
                                            <th></th>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">PERIODOS</h5></div>
                                <div class="col-lg-6 col-sm-12 d-flex justify-content-end row">
                                    <a href="#" class="btn btn-primary btn-icon-split ml-1" data-toggle="modal" data-target="#AddPeriodo">
                                        <i class="fa fa-plus"></i>
                                        <span class="text">Modificar</span>
                                    </a>
                                    <!-- Modificar Modal-->
                                    <div class="modal fade" id="AddPeriodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content user">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Modificar Periodos</b></h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form class="user" action="/analisis/add_periodo" method="post">
                                                <div class="modal-body" style="text-align: start;">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="planid" value="{{ $PlanId }}">
                                                    <div class="form-group">
                                                        <label for="desde"><strong>Desde:</strong></label>
                                                        <input type="number" class="form-control" name="desde" id="desde" 
                                                            title="Desde" min="{{ date('Y') - 10 }}" max="{{ date('Y') }}" required>
                                                        <small class="text-muted">Año entre {{ date('Y') - 10 }} y {{ date('Y') }}</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="hasta"><strong>Hasta:</strong></label>
                                                        <input type="number" class="form-control" name="hasta" id="hasta" 
                                                            title="Hasta" max="{{ date('Y') }}" required>
                                                        <small id="hastaHelp" class="text-muted">Debe ser mayor que "Desde"</small>
                                                    </div>

                                                    <script>
                                                        (function() {
                                                            const desde = document.getElementById('desde');
                                                            const hasta = document.getElementById('hasta');
                                                            const maxAnio = parseInt(hasta.getAttribute('max'));
                                                            const minDesde = parseInt(desde.getAttribute('min'));

                                                            function actualizarValidacion() {
                                                                const desdeVal = parseInt(desde.value);
                                                                const hastaVal = parseInt(hasta.value);

                                                                // Actualizar el atributo min del campo Hasta basado en Desde (si es válido)
                                                                if (!isNaN(desdeVal) && desdeVal >= minDesde && desdeVal <= maxAnio) {
                                                                    hasta.min = desdeVal + 1;   // Solo permite mayores estrictos
                                                                } else {
                                                                    hasta.min = '';  // Sin restricción mínima si Desde no es válido
                                                                }

                                                                // Validar y mostrar mensajes
                                                                if (!isNaN(desdeVal) && !isNaN(hastaVal)) {
                                                                    if (hastaVal <= desdeVal) {
                                                                        mostrarAyuda('El año "Hasta" debe ser mayor que "' + desdeVal + '"', 'error');
                                                                        hasta.setCustomValidity('El año Hasta debe ser mayor que el año Desde');
                                                                    } else if (hastaVal > maxAnio) {
                                                                        mostrarAyuda('El año no puede superar ' + maxAnio, 'warning');
                                                                        hasta.setCustomValidity('Máximo ' + maxAnio);
                                                                    } else {
                                                                        mostrarAyuda('', 'ok');
                                                                        hasta.setCustomValidity('');
                                                                    }
                                                                } else if (!isNaN(desdeVal) && isNaN(hastaVal)) {
                                                                    mostrarAyuda('Ingrese un año mayor a ' + desdeVal, 'info');
                                                                    hasta.setCustomValidity('');
                                                                } else if (isNaN(desdeVal) && desde.value !== '') {
                                                                    mostrarAyuda('Ingrese un año "Desde" válido (' + minDesde + ' - ' + maxAnio + ')', 'error');
                                                                    hasta.setCustomValidity('');
                                                                } else if (desde.value === '') {
                                                                    mostrarAyuda('Primero complete el año "Desde"', 'info');
                                                                    hasta.setCustomValidity('');
                                                                } else {
                                                                    mostrarAyuda('Debe ser mayor que "Desde"', 'muted');
                                                                    hasta.setCustomValidity('');
                                                                }
                                                            }

                                                            function mostrarAyuda(mensaje, tipo) {
                                                                const helpSpan = document.getElementById('hastaHelp');
                                                                if (!helpSpan) return;
                                                                helpSpan.textContent = mensaje || 'Debe ser mayor que "Desde"';
                                                                helpSpan.className = ''; // reset
                                                                if (tipo === 'error') helpSpan.className = 'text-danger';
                                                                else if (tipo === 'warning') helpSpan.className = 'text-warning';
                                                                else if (tipo === 'ok') helpSpan.className = 'text-success';
                                                                else if (tipo === 'info') helpSpan.className = 'text-info';
                                                                else helpSpan.className = 'text-muted';
                                                            }

                                                            // Eventos: cualquier cambio en Desde o Hasta dispara la validación
                                                            desde.addEventListener('input', actualizarValidacion);
                                                            hasta.addEventListener('input', actualizarValidacion);

                                                            // Validación inicial (por si hay valores precargados)
                                                            actualizarValidacion();
                                                        })();
                                                    </script>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary btn-block" value="Modificar">
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modificar Modal-->
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center align-middle">PERIODO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Periodos as $Item)
                                        <tr>
                                            <td class="text-center align-middle">{{ $Item->Periodo }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class=" align-middle">
                        <h5 class="font-weight-bold text-primary">TASAS DE CRECIMIENTO DEL MERCADO (TCM)</h5>
                    </div>
                </div>

                <div class="card-body">
                    <form class="form" action="/analisis/save_tcm" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="planid" value="{{ $PlanId }}">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="text-center align-middle" colspan="2" rowspan="2">PERIODOS</th>
                                    <th class="text-center" colspan="{{ count($Productos) }}">MERCADOS</th>
                                </tr>
                                <tr>
                                    @foreach($Productos as $Item)
                                    <th class="text-center">{{ $Item->Nombre }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Periodos as $Item)
                                <tr>
                                    <td class="text-center">{{ $Item->Periodo }}</td>
                                    <td class="text-center">{{ $Item->Periodo + 1 }}</td>
                                    @foreach($Productos as $ItemP)
                                        @foreach($TCM as $tcm)
                                            @if($tcm->Periodo == $Item->Periodo && $tcm->ProductoId == $ItemP->Id)
                                            <td>
                                                <div class="d-flex justify-content-around align-items-center">
                                                    <input type="number" class="form-control w-75" name="PE{{ $Item->Periodo }}PR{{ $ItemP->Id }}" value="{{ $tcm->Valor }}" min="0" max="100" placeholder="0 - 100">
                                                    <span class="fa fa-percent"></span>
                                                </div>
                                            </td>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <button type="submit" class="btn btn-primary w-100">Guardar Cambios</button>
                    </div>
                    </form>
                </div>

                <div class="card-footer">
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered table-light">
                            <thead>
                                <tr>
                                    <th class="text-center">BCG</th>
                                    @foreach($Productos as $Item)
                                    <th class="text-center">{{ $Item->Nombre }}
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-center">TCM</th>
                                    @foreach($Productos as $ItemP)
                                        @foreach($TCMSuma as $Item)
                                            @if($Item->ProductoId == $ItemP->Id)
                                                <td class="text-center">{{ $Item->total_valor / count($Productos) > 100 / count($Productos) ? number_format((float)100 / count($Productos), 2, '.', '') : number_format((float)$Item->total_valor / count($Productos), 2, '.', '') }}%</td>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tr>
                                <tr>
                                    <th class="text-center">PRM</th>
                                    @foreach($Productos as $ItemP)
                                        @foreach($PRM as $prm)
                                            @if($prm->ProductoId == $ItemP->Id)
                                            <td class="text-center">{{ number_format((float)$prm->mayor_venta, 2, '.', '') }}</td>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tr>
                                <tr>
                                    <th class="text-center">% S/VTAS</th>
                                    @foreach($Productos as $ItemP)
                                    <!--td class="text-center">{{ round($ItemP->Porcentaje, 0) }}%</td-->
                                    <td class="text-center">{{ $ItemP->Porcentaje }}%</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class=" align-middle">
                        <h5 class="font-weight-bold text-primary">EVOLUCIÓN DE LA DEMANDA GLOBAL SECTOR (en miles de soles)</h5>
                    </div>
                </div>

                <div class="card-body">
                    <form class="form" action="/analisis/save_edgs" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="planid" value="{{ $PlanId }}">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="text-center align-middle" rowspan="2">AÑOS</th>
                                    <th class="text-center" colspan="{{ count($Productos) }}">MERCADOS</th>
                                </tr>
                                <tr>
                                    @foreach($Productos as $Item)
                                    <th class="text-center">{{ $Item->Nombre }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Periodos as $Item)
                                <tr>
                                    <td class="text-center">{{ $Item->Periodo }}</td>
                                    @foreach($Productos as $ItemP)
                                        @foreach($EDGS as $edgs)
                                            @if($edgs->Periodo == $Item->Periodo && $edgs->ProductoId == $ItemP->Id)
                                            <td>
                                                <div class="d-flex justify-content-around align-items-center">
                                                    <input type="number" class="form-control w-75" name="PE{{ $Item->Periodo }}PR{{ $ItemP->Id }}" value="{{ $edgs->Valor }}" min="0" max="100" placeholder="0 - 100">
                                                    <span class="fa fa-percent"></span>
                                                </div>
                                            </td>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <button type="submit" class="btn btn-primary w-100">Guardar Cambios</button>
                    </div>
                    </form>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">NIVELES DE VENTA DE LOS COMPETIDORES DE CADA PRODUCTO</h5></div>
                        <div class="col-lg-6 col-sm-12 d-flex justify-content-end row">
                            <a href="/analisis/add_competidor/{{ $PlanId }}" class="btn btn-primary btn-icon-split ml-1">
                                <i class="fa fa-plus"></i>
                                <span class="text">Agregar</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="/analisis/save_competidores" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="planid" value="{{ $PlanId }}">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="bg-gray-100">
                                <tr>
                                    @foreach($Productos as $Item)
                                    <th colspan="2" class="text-center" width="{{ (100 / count($Productos)) }}">{{ $Item->Nombre }}</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach($Productos as $Item)
                                    <th class="text-center">EMPRESA</th>
                                    <th class="text-center">{{ $Item->Ventas }}</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach($Productos as $Item)
                                    <td class="text-center">Competidor</td>
                                    <td class="text-center">Ventas</td>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($OrdenCompetidores as $ItemO)    
                                    <tr>
                                        @foreach($Productos as $Producto)
                                            @foreach($Competidores as $Item)
                                                @if($Item->Competidor == $ItemO->Competidor && $Item->ProductoId == $Producto->Id)
                                                <td class="text-center">CP{{ $Item->ProductoId }}-{{ $Item->Competidor }}</td>
                                                <td class="text-center">
                                                    <input type="number" class="form-control" name="C{{ $Item->Id }}P{{ $Item->ProductoId }}" value="{{ $Item->Venta }}" min="0" max="">
                                                </td>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfooter class="bg-gray-100">
                                <tr>
                                    @foreach($Productos as $Producto)
                                        @foreach($CompetidoresMAYOR as $Item)
                                            @if($Item->ProductoId == $Producto->Id)
                                            <th class="text-center">Mayor</th>
                                            <th class="text-center">{{ $Item->mayor_venta }}</th>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tr>
                            </tfooter>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <button type="submit" class="btn btn-primary w-100">Guardar Cambios</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="card-footer">

            <div class="row mt-2 mb-2">
                <div class="col-lg-6">
                    <a href="#" class="btn btn-dark btn-icon-split w-100" data-toggle="modal" data-target="#AddFortaleza">
                        <i class="fa fa-plus"></i>
                        <span class="text">Agregar Fortaleza</span>
                    </a>
                    <!-- Agregar Modal-->
                    <div class="modal fade" id="AddFortaleza" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input type="hidden" name="planid" value="{{ $PlanId}}">
                                    <input type="hidden" name="modulo" value="cadena">
                                    <div class="form-group">
                                        <label for="fortaleza"><strong>Fortaleza:</strong></label>
                                        <input type="text" class="form-control" name="fortaleza" placeholder="Fortaleza..." title="Fortaleza">
                                    </div>
                                    <div class="form-group">
                                        <label for="fortaleza"><strong>Como Mantener la Fortaleza?:</strong></label>
                                        <textarea class="form-control" name="accion" placeholder="Como Mantener la Fortaleza..." title="Como Mantener la Fortaleza?" rows="5"></textarea>
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
                    
                    <hr>
                     
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th>Fortaleza</th>
                                    <th width="20%"><center>Acciones</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Fortalezas as $Fortaleza)
                                @if($Fortaleza->Origen == "participacion")
                                <tr>
                                    <td>{{ $Fortaleza->Fortaleza }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-success btn-sm text-uppercase" title="Editar" data-toggle="modal" data-target="#EditFortaleza{{ $Fortaleza->Id }}"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                        <!-- Editar Modal-->
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
                                        <!-- Editar Modal-->
                                        <a href="#" class="btn btn-danger btn-sm text-uppercase" title="Eliminar" data-toggle="modal" data-target="#DeleteFortaleza{{ $Fortaleza->Id }}"><i class="fa fa-trash" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                        <!-- Delete Modal-->
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
                                    <input type="hidden" name="planid" value="{{ $PlanId}}">
                                    <input type="hidden" name="modulo" value="cadena">
                                    <div class="form-group">
                                        <label for="debilidad"><strong>Debilidad:</strong></label>
                                        <input type="text" class="form-control" name="debilidad" placeholder="Debilidad..." title="Debilidad">
                                    </div>
                                    <div class="form-group">
                                        <label for="fortaleza"><strong>Como Corregir la Debilidad?:</strong></label>
                                        <textarea class="form-control" name="accion" placeholder="Como Corregir la Debilidad..." title="Como Corregir la Debilidad?" rows="5"></textarea>
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
                    
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th>Debilidad</th>
                                    <th width="20%"><center>Acciones</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Debilidades as $Debilidad)
                                @if($Debilidad->Origen == "participacion")
                                <tr>
                                    <td>{{ $Debilidad->Debilidad }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-success btn-sm text-uppercase" title="Editar" data-toggle="modal" data-target="#EditDebilidad{{ $Debilidad->Id }}"><i class="fa fa-pencil" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                        <!-- Editar Modal-->
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
                                        <!-- Editar Modal-->
                                        <a href="#" class="btn btn-danger btn-sm text-uppercase" title="Eliminar" data-toggle="modal" data-target="#DeleteDebilidad{{ $Debilidad->Id }}"><i class="fa fa-trash" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                        <!-- Delete Modal-->
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