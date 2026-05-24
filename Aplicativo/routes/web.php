<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request; 

//Auth
Route::get('/', 'Auth\LoginController@FrmLogin')->middleware('guest');
Route::post('login', 'Auth\LoginController@Login');

//start middleware
Route::middleware('Administrador')->group(function(){

Route::get('logout', 'Auth\LoginController@Logout');

//Empresa
Route::prefix('empresa')->group(function () {
    Route::get('/home', 'EmpresaController@Home');
    Route::get('/objetivo/{ObjetivoId}', 'EmpresaController@ObjetivoEspecifico');
    Route::post('/edit_nombre', 'EmpresaController@EditarNombre');
    Route::post('/edit_descripcion', 'EmpresaController@EditarDescripcion');
    Route::post('/edit_mision', 'EmpresaController@EditarMision');
    Route::post('/edit_vision', 'EmpresaController@EditarVision');
    Route::post('/add_unidad', 'EmpresaController@AgregarUnidad');
    Route::post('/edit_unidad', 'EmpresaController@EditarUnidad');
    Route::get('/delete_unidad/{UnidadId}', 'EmpresaController@EliminarUnidad');
    Route::post('/add_valor', 'EmpresaController@AgregarValor');
    Route::post('/edit_valor', 'EmpresaController@EditarValor');
    Route::get('/delete_valor/{ValorId}', 'EmpresaController@EliminarValor');
    Route::post('/add_objetivo_general', 'EmpresaController@AgregarObjetivoGeneral');
    Route::post('/edit_objetivo_general', 'EmpresaController@EditarObjetivoGeneral');
    Route::get('/delete_objetivo_general/{ObjetivoId}', 'EmpresaController@EliminarObjetivoGeneral');
    Route::post('/add_objetivo_especifico', 'EmpresaController@AgregarObjetivoEspecifico');
    Route::post('/edit_objetivo_especifico', 'EmpresaController@EditarObjetivoEspecifico');
    Route::get('/delete_objetivo_especifico/{ObjetivoId}', 'EmpresaController@EliminarObjetivoEspecifico');
});

//Analisis
Route::prefix('analisis')->group(function () {
    // -- START ANALISIS INTERNO ----------------------------------
    Route::get('/interno/{PlanId}', 'AnalisisController@Interno');
    Route::post('/add_fortaleza', 'AnalisisController@AgregarFortaleza');
    Route::post('/edit_fortaleza', 'AnalisisController@EditarFortaleza');
    Route::get('/delete_fortaleza/{FortalezaId}', 'AnalisisController@EliminarFortaleza');
    Route::post('/add_debilidad', 'AnalisisController@AgregarDebilidad');
    Route::post('/edit_debilidad', 'AnalisisController@EditarDebilidad');
    Route::get('/delete_debilidad/{DebilidadId}', 'AnalisisController@EliminarDebilidad');
    // -- END ANALISIS INTERNO ----------------------------------
    // -- START ANALISIS EXTERNO ----------------------------------
    Route::get('/externo/{PlanId}', 'AnalisisController@Externo');
    Route::post('/add_oportunidad', 'AnalisisController@AgregarOportunidad');
    Route::post('/edit_oportunidad', 'AnalisisController@EditarOportunidad');
    Route::get('/delete_oportunidad/{OportunidadId}', 'AnalisisController@EliminarOportunidad');
    Route::post('/add_amenaza', 'AnalisisController@AgregarAmenaza');
    Route::post('/edit_amenaza', 'AnalisisController@EditarAmenaza');
    Route::get('/delete_amenaza/{AmenazaId}', 'AnalisisController@EliminarAmenaza');
    // -- END ANALISIS EXTERNO ----------------------------------
    // -- START ANALISIS - CADENA DE VALOR ----------------------------------
    Route::get('/cadena/{PlanId}', 'AnalisisController@CadenaValor');
    Route::post('/cadena_calcular', 'AnalisisController@CalcularCadenaValor');
    // -- END ANALISIS - CADENA DE VALOR ----------------------------------
    // -- START ANALISIS - PARTICIPACIÓN ----------------------------------
    Route::get('/participacion/{PlanId}', 'AnalisisController@Participacion');
    Route::post('/add_producto', 'AnalisisController@AgregarProducto');
    Route::post('/edit_producto', 'AnalisisController@EditarProducto');
    Route::get('/delete_producto/{ProductoId}', 'AnalisisController@EliminarProducto');
    Route::post('/add_periodo', 'AnalisisController@AgregarPeriodo');
    Route::post('/save_tcm', 'AnalisisController@GuardarTCM');
    Route::post('/save_edgs', 'AnalisisController@GuardarEDGS');
    Route::get('/add_competidor/{PlanId}', 'AnalisisController@AgregarCompetidor');
    Route::post('/save_competidores', 'AnalisisController@GuardarCompetidores');
    // -- END ANALISIS - PARTICIPACIÓN ----------------------------------
    // -- START ANALISIS - PORTER ----------------------------------
    Route::get('/porter/{PlanId}', 'AnalisisController@Porter');
    Route::post('/porter_calcular', 'AnalisisController@CalcularPorter');
    // -- END ANALISIS - PORTER ----------------------------------
    // -- START ANALISIS - PEST ----------------------------------
    Route::get('/pest/{PlanId}', 'AnalisisController@PEST');
    Route::post('/pest_calcular', 'AnalisisController@CalcularPEST');
    // -- END ANALISIS - PEST ----------------------------------
    // -- START ANALISIS - CAME ----------------------------------
    Route::get('/came/{PlanId}', 'AnalisisController@CAME');
    Route::post('/save_came', 'AnalisisController@GuardarCAME');
    // -- END ANALISIS - CAME ----------------------------------

    Route::get('/graficos/{PlanId}', 'AnalisisController@Graficos');
});

//Estrategia
Route::prefix('estrategia')->group(function () {
    Route::get('/identificacion/{PlanId}', 'EstrategiaController@Identificacion');
    Route::post('/identificacion_calcular', 'EstrategiaController@CalcularIdentificacion');
});

//Plan Estratégico
Route::prefix('plan')->group(function () {
    Route::get('/list', 'PlanController@PlanesEstrategicos');
    Route::get('/add_plan', 'PlanController@AgregarPlan');
    Route::post('/save_conclucion', 'PlanController@GuardarConclucion');
    Route::get('/detalle/{PlanId}', 'PlanController@Detalle');
    Route::get('/delete_plan/{PlanId}', 'PlanController@EliminarPlan');
    Route::post('/add_colaborador', 'PlanController@AgregarColaborador');
    Route::get('/delete_colaborador/{ColaboradorId}', 'PlanController@EliminarColaborador');
});

//Usuario
Route::prefix('usuario')->group(function () {
    Route::get('/listar', 'UsuarioController@Listar');
    Route::post('/add_usuario', 'UsuarioController@Agregar');
    Route::post('/edit_usuario', 'UsuarioController@Editar');
});

//Perfil
Route::prefix('perfil')->group(function () {
    Route::get('/view', 'Auth\LoginController@FrmPerfil');
    Route::post('/edit', 'Auth\LoginController@ActEditarPerfil');
});

});
//end middleware
?>