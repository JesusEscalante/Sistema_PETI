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

                <div class="col-lg-6">
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
                                                <form class="user" action="/empresa/add_producto" method="post">
                                                <div class="modal-body" style="text-align: start;">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="form-group row">
                                                        <div class="col-lg-8">
                                                            <label for="unidad"><strong>Nombre de Producto:</strong></label>
                                                            <input type="text" class="form-control" name="nombre" placeholder="Nombre de Producto..." title="Nombre de Producto">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label for="unidad"><strong>Ventas:</strong></label>
                                                            <input type="number" class="form-control" name="ventas" placeholder="Ventas..." title="Ventas">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary btn-block" value="Agregar Unidad">
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
                                            <th class="text-center align-middle" width="110px">VENTAS</th>
                                            <th class="text-center align-middle" width="110px">% VENTAS</th>
                                            <th class="text-center align-middle" width="110px">ACCIONES</th>
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
                                                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de Producto..." title="Nombre de Producto">
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="unidad"><strong>Ventas:</strong></label>
                                                                        <input type="number" class="form-control" name="ventas" placeholder="Ventas..." title="Ventas">
                                                                    </div>
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

                <div class="col-lg-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">PERIODOS</h5></div>
                                <div class="col-lg-6 col-sm-12 d-flex justify-content-end row">
                                    <a href="#" class="btn btn-primary btn-icon-split ml-1" data-toggle="modal" data-target="#AddPeriodo">
                                        <i class="fa fa-plus"></i>
                                        <span class="text">Agregar</span>
                                    </a>
                                    <!-- Agregar Modal-->
                                    <div class="modal fade" id="AddPeriodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content user">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Agregar Periodos</b></h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form class="user" action="/empresa/add_periodos" method="post">
                                                <div class="modal-body" style="text-align: start;">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label for="desde"><strong>Desde:</strong></label>
                                                            <input type="number" class="form-control" name="desde" id="desde" title="Desde" min="{{ date('Y') - 10}}" max="{{ date('Y') }}" onchange="validarHasta()">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="hasta"><strong>Hasta:</strong></label>
                                                            <input type="number" class="form-control" name="hasta" id="hasta" title="Hasta" min="" max="{{ date('Y') }}" readonly>
                                                        </div>
                                                        <script>
                                                            function validarHasta() {
                                                                var desdeInput = document.getElementById('desde');
                                                                var hastaInput = document.getElementById('hasta');
                                                                var desdeValue = parseInt(desdeInput.value);
                                                                var fechaActual = new Date().getFullYear();
                                                                
                                                                // Limpiar y habilitar el input hasta
                                                                hastaInput.value = '';
                                                                hastaInput.removeAttribute('readonly');
                                                                
                                                                // Establecer el mínimo permitido como el año seleccionado en "desde"
                                                                hastaInput.min = desdeValue;
                                                                
                                                                // Validar que "hasta" no sea menor que "desde"
                                                                hastaInput.addEventListener('change', function() {
                                                                    var hastaValue = parseInt(hastaInput.value);
                                                                    if (hastaValue < desdeValue) {
                                                                        swal("Oops!", "El año Hasta no puede ser menor que el año Desde", {
                                                                        icon: "warning",
                                                                        timer: 3000,
                                                                        });
                                                                        hastaInput.value = '';
                                                                    }
                                                                });
                                                                
                                                                // Si el año seleccionado es el actual, establecer "hasta" automáticamente
                                                                if (desdeValue === añoActual) {
                                                                    hastaInput.value = desdeValue;
                                                                    hastaInput.setAttribute('readonly'); // Bloquear porque solo hay esa opción
                                                                } else {
                                                                    // Enfocar el input hasta para que el usuario pueda ingresar
                                                                    hastaInput.focus();
                                                                }
                                                            }                                                            
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary btn-block" value="Agregar Periodos">
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

        </div>

    </div>


</div>

</div>

@stop