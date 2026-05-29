<?php

namespace App\Http\Controllers;

// Importación de modelos necesarios
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fortalezas as Fortalezas;
use App\Models\Debilidades as Debilidades;
use App\Models\Oportunidades as Oportunidades;
use App\Models\Amenazas as Amenazas;
use App\Models\CadenaValor as CadenaValor;
use App\Models\Tcm as Tcm;
use App\Models\Edgs as Edgs;
use App\Models\Productos as Productos;
use App\Models\Periodos as Periodos;
use App\Models\Competidores as Competidores;
use App\Models\FuerzasPorter as FuerzasPorter;
use App\Models\Pest as Pest;
use App\Models\Came as Came;
use Illuminate\Support\Facades\Auth;

class AnalisisController extends Controller
{
    // -- START ANALISIS INTERNO ------------------------------------------------------------------------------

    public function Interno($PlanId){
        $objFortalezas = Fortalezas::ObtenerPorPlanId($PlanId);
        $objDebilidades = Debilidades::ObtenerPorPlanId($PlanId);
        return view('Analisis.Interno',[
            'Fortalezas' => $objFortalezas,
            'Debilidades' => $objDebilidades,
            'PlanId' => $PlanId
        ]);
    }

    public function AgregarFortaleza(Request $request)
    {
        try
        {
            $ObjFortaleza = new Fortalezas();
            $ObjFortaleza->UsuarioId = auth()->user()->Id;
            $ObjFortaleza->PlanId = $request->input('planid');
            $ObjFortaleza->Fortaleza = $request->input('fortaleza');
            $ObjFortaleza->Accion = $request->input('accion');
            $ObjFortaleza->Origen = $request->input('modulo');
            
            if(Fortalezas::Agregar($ObjFortaleza))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se agregó correctamente la fortaleza";
                if($ObjFortaleza->Origen == "cadena"){
                    return redirect()->action('AnalisisController@CadenaValor', ['PlanId' => $ObjFortaleza->PlanId]);
                }
                if($ObjFortaleza->Origen == "participacion"){
                    return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjFortaleza->PlanId]);
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar la fortaleza";
            if($request->input('modulo') == "cadena"){
                return redirect()->action('AnalisisController@CadenaValor', ['PlanId' => $ObjFortaleza->PlanId]);
            }
            if($request->input('modulo') == "participacion"){
                return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjFortaleza->PlanId]);
            }
        }
    }

    public function EditarFortaleza(Request $request)
    {
        try
        {
            $ObjFortaleza = Fortalezas::ObtenerPorId($request->input('id'));
            $ObjFortaleza->Fortaleza = $request->input('fortaleza');
            $ObjFortaleza->Accion = $request->input('accion');
            
            if(Fortalezas::Editar($ObjFortaleza))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modifico correctamente la fortaleza";
                if($ObjFortaleza->Origen == "cadena"){
                    return redirect()->action('AnalisisController@CadenaValor', ['PlanId' => $ObjFortaleza->PlanId]);
                }
                if($ObjFortaleza->Origen == "participacion"){
                    return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjFortaleza->PlanId]);
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar la fortaleza";
            if($ObjFortaleza->Origen == "cadena"){
                return redirect()->action('AnalisisController@CadenaValor', ['PlanId' => $ObjFortaleza->PlanId]);
            }
            if($ObjFortaleza->Origen == "participacion"){
                return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjFortaleza->PlanId]);
            }
        }
    }

    public function EliminarFortaleza($FortalezaId)
    {
        try
        {
            $ObjFortaleza = Fortalezas::ObtenerPorId($FortalezaId);

            if(Fortalezas::Eliminar($ObjFortaleza))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se eliminó correctamente la fortaleza";
                if($ObjFortaleza->Origen == "cadena"){
                    return redirect()->action('AnalisisController@CadenaValor', ['PlanId' => $ObjFortaleza->PlanId]);
                }
                if($ObjFortaleza->Origen == "participacion"){
                    return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjFortaleza->PlanId]);
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo eliminar la fortaleza";
            if($ObjFortaleza->Origen == "cadena"){
                return redirect()->action('AnalisisController@CadenaValor', ['PlanId' => $ObjFortaleza->PlanId]);
            }
            if($ObjFortaleza->Origen == "participacion"){
                return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjFortaleza->PlanId]);
            }
        }
    }

    public function AgregarDebilidad(Request $request)
    {
        try
        {
            $ObjDebilidad = new Debilidades();
            $ObjDebilidad->UsuarioId = auth()->user()->Id;
            $ObjDebilidad->PlanId = $request->input('planid');
            $ObjDebilidad->Debilidad = $request->input('debilidad');
            $ObjDebilidad->Accion = $request->input('accion');
            $ObjDebilidad->Origen = $request->input('modulo');
            
            if(Debilidades::Agregar($ObjDebilidad))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se agregó correctamente la debilidad";
                if($ObjDebilidad->Origen == "cadena"){
                    return redirect()->action('AnalisisController@CadenaValor', ['PlanId' => $ObjDebilidad->PlanId]);
                }
                if($ObjDebilidad->Origen == "participacion"){
                    return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjDebilidad->PlanId]);
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar la debilidad";
            if($ObjDebilidad->Origen == "cadena"){
                return redirect()->action('AnalisisController@CadenaValor', ['PlanId' => $ObjDebilidad->PlanId]);
            }
            if($ObjDebilidad->Origen == "participacion"){
                return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjDebilidad->PlanId]);
            }
        }
    }

    public function EditarDebilidad(Request $request)
    {
        try
        {
            $ObjDebilidad = Debilidades::ObtenerPorId($request->input('id'));
            $ObjDebilidad->Debilidad = $request->input('debilidad');
            $ObjDebilidad->Accion = $request->input('accion');
            
            if(Debilidades::Editar($ObjDebilidad))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modifico correctamente la debilidad";
                if($ObjDebilidad->Origen == "cadena"){
                    return redirect()->action('AnalisisController@CadenaValor', ['PlanId' => $ObjDebilidad->PlanId]);
                }
                if($ObjDebilidad->Origen == "participacion"){
                    return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjDebilidad->PlanId]);
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar la debilidad";
            if($ObjDebilidad->Origen == "cadena"){
                return redirect()->action('AnalisisController@CadenaValor', ['PlanId' => $ObjDebilidad->PlanId]);
            }
            if($ObjDebilidad->Origen == "participacion"){
                return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjDebilidad->PlanId]);
            }
        }
    }

    public function EliminarDebilidad($DebilidadId)
    {
        try
        {
            $ObjDebilidad = Debilidades::ObtenerPorId($DebilidadId);

            if(Debilidades::Eliminar($ObjDebilidad))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se eliminó correctamente la debilidad";
                if($ObjDebilidad->Origen == "cadena"){
                    return redirect()->action('AnalisisController@CadenaValor', ['PlanId' => $ObjDebilidad->PlanId]);
                }
                if($ObjDebilidad->Origen == "participacion"){
                    return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjDebilidad->PlanId]);
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo eliminar la debilidad";
            if($ObjDebilidad->Origen == "cadena"){
                return redirect()->action('AnalisisController@CadenaValor', ['PlanId' => $ObjDebilidad->PlanId]);
            }
            if($ObjDebilidad->Origen == "participacion"){
                return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjDebilidad->PlanId]);
            }
        }
    }

    // -- END ANALISIS INTERNO ----------------------------------------------------------------------------------

    // -- START ANALISIS EXTERNO --------------------------------------------------------------------------------

    public function Externo($PlanId){
        $objOportunidades = Oportunidades::ObtenerPorPlanId($PlanId);
        $objAmenazas = Amenazas::ObtenerPorPlanId($PlanId);
        return view('Analisis.Externo',[
            'Oportunidades' => $objOportunidades,
            'Amenazas' => $objAmenazas,
            'PlanId' => $PlanId
        ]);
    }

    public function AgregarOportunidad(Request $request)
    {
        try
        {
            $ObjOportunidad = new Oportunidades();
            $ObjOportunidad->UsuarioId = auth()->user()->Id;
            $ObjOportunidad->PlanId = $request->input('planid');
            $ObjOportunidad->Oportunidad = $request->input('oportunidad');
            $ObjOportunidad->Origen = $request->input('modulo');
            $ObjOportunidad->Accion = $request->input('accion');
            
            if(Oportunidades::Agregar($ObjOportunidad))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se agregó correctamente la oportunidad";
                if($ObjOportunidad->Origen == "porter"){
                    return redirect()->action('AnalisisController@Porter', ['PlanId' => $ObjOportunidad->PlanId]);
                }
                if($ObjOportunidad->Origen == "pest"){
                    return redirect()->action('AnalisisController@PEST', ['PlanId' => $ObjOportunidad->PlanId]);
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar la oportunidad";
            if($ObjOportunidad->Origen == "porter"){
                return redirect()->action('AnalisisController@Porter', ['PlanId' => $ObjOportunidad->PlanId]);
            }
            if($ObjOportunidad->Origen == "pest"){
                return redirect()->action('AnalisisController@PEST', ['PlanId' => $ObjOportunidad->PlanId]);
            }
        }
    }

    public function EditarOportunidad(Request $request)
    {
        try
        {
            $ObjOportunidad = Oportunidades::ObtenerPorId($request->input('id'));
            $ObjOportunidad->Oportunidad = $request->input('oportunidad');
            $ObjOportunidad->Accion = $request->input('accion');
            
            if(Oportunidades::Editar($ObjOportunidad))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modifico correctamente la oportunidad";
                if($ObjOportunidad->Origen == "porter"){
                    return redirect()->action('AnalisisController@Porter', ['PlanId' => $ObjOportunidad->PlanId]);
                }
                if($ObjOportunidad->Origen == "pest"){
                    return redirect()->action('AnalisisController@PEST', ['PlanId' => $ObjOportunidad->PlanId]);
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar la oportunidad";
            if($ObjOportunidad->Origen == "porter"){
                return redirect()->action('AnalisisController@Porter', ['PlanId' => $ObjOportunidad->PlanId]);
            }
            if($ObjOportunidad->Origen == "pest"){
                return redirect()->action('AnalisisController@PEST', ['PlanId' => $ObjOportunidad->PlanId]);
            }
        }
    }

    public function EliminarOportunidad($OportunidadId)
    {
        try
        {
            $ObjOportunidad = Oportunidades::ObtenerPorId($OportunidadId);

            if(Oportunidades::Eliminar($ObjOportunidad))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se eliminó correctamente la oportunidad";
                if($request->input('modulo') == "porter"){
                    return redirect()->action('AnalisisController@Porter', ['PlanId' => $ObjOportunidad->PlanId]);
                }
                if($request->input('modulo') == "pest"){
                    return redirect()->action('AnalisisController@PEST', ['PlanId' => $ObjOportunidad->PlanId]);
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo eliminar la oportunidad";
            if($ObjOportunidad->Origen == "porter"){
                return redirect()->action('AnalisisController@Porter', ['PlanId' => $ObjOportunidad->PlanId]);
            }
            if($ObjOportunidad->Origen == "pest"){
                return redirect()->action('AnalisisController@PEST', ['PlanId' => $ObjOportunidad->PlanId]);
            }
        }
    }

    public function AgregarAmenaza(Request $request)
    {
        try
        {
            $ObjAmenaza = new Amenazas();
            $ObjAmenaza->UsuarioId = auth()->user()->Id;
            $ObjAmenaza->PlanId = $request->input('planid');
            $ObjAmenaza->Amenaza = $request->input('amenaza');
            $ObjAmenaza->Origen = $request->input('modulo');
            $ObjAmenaza->Accion = $request->input('accion');
            
            if(Amenazas::Agregar($ObjAmenaza))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se agregó correctamente la amenaza";
                if($ObjAmenaza->Origen == "porter"){
                    return redirect()->action('AnalisisController@Porter', ['PlanId' => $ObjAmenaza->PlanId]);
                }
                if($ObjAmenaza->Origen == "pest"){
                    return redirect()->action('AnalisisController@PEST', ['PlanId' => $ObjAmenaza->PlanId]);
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar la amenaza";
            if($ObjAmenaza->Origen == "porter"){
                return redirect()->action('AnalisisController@Porter', ['PlanId' => $ObjAmenaza->PlanId]);
            }
            if($ObjAmenaza->Origen == "pest"){
                return redirect()->action('AnalisisController@PEST', ['PlanId' => $ObjAmenaza->PlanId]);
            }
        }
    }

    public function EditarAmenaza(Request $request)
    {
        try
        {
            $ObjAmenaza = Amenazas::ObtenerPorId($request->input('id'));
            $ObjAmenaza->Amenaza = $request->input('amenaza');
            $ObjAmenaza->Accion = $request->input('accion');
            
            if(Amenazas::Editar($ObjAmenaza))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modifico correctamente la amenaza";
                if($ObjAmenaza->Origen == "porter"){
                    return redirect()->action('AnalisisController@Porter', ['PlanId' => $ObjAmenaza->PlanId]);
                }
                if($ObjAmenaza->Origen == "pest"){
                    return redirect()->action('AnalisisController@PEST', ['PlanId' => $ObjAmenaza->PlanId]);
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar la amenaza";
            if($ObjAmenaza->Origen == "porter"){
                return redirect()->action('AnalisisController@Porter', ['PlanId' => $ObjAmenaza->PlanId]);
            }
            if($ObjAmenaza->Origen == "pest"){
                return redirect()->action('AnalisisController@PEST', ['PlanId' => $ObjAmenaza->PlanId]);
            }
        }
    }

    public function EliminarAmenaza($AmenazaId)
    {
        try
        {
            $ObjAmenaza = Amenazas::ObtenerPorId($AmenazaId);

            if(Amenazas::Eliminar($ObjAmenaza))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se eliminó correctamente la amenaza";
                if($ObjAmenaza->Origen == "porter"){
                    return redirect()->action('AnalisisController@Porter', ['PlanId' => $ObjAmenaza->PlanId]);
                }
                if($ObjAmenaza->Origen == "pest"){
                    return redirect()->action('AnalisisController@PEST', ['PlanId' => $ObjAmenaza->PlanId]);
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo eliminar la amenaza";
            if($request->input('modulo') == "porter"){
                return redirect()->action('AnalisisController@Porter', ['PlanId' => $ObjAmenaza->PlanId]);
            }
            if($request->input('modulo') == "pest"){
                return redirect()->action('AnalisisController@PEST', ['PlanId' => $ObjAmenaza->PlanId]);
            }
        }
    }

    // -- END ANALISIS EXTERNO -----------------------------------------------------------------------------------

    // -- START ANALISIS - CADENA DE VALOR -----------------------------------------------------------------------

    public function CadenaValor($PlanId){
        $registrosExistentes = CadenaValor::ObtenerPorPlanId($PlanId);

        if($registrosExistentes != null && count($registrosExistentes) > 0){
            $objCadenaValor = $registrosExistentes;
        } else {
            for ($i=1; $i <= 25; $i++) { 
                $objCadenaValor = new CadenaValor();
                $objCadenaValor->PlanId = $PlanId;
                $objCadenaValor->Pregunta = 'P'.$i;
                CadenaValor::Agregar($objCadenaValor);
            }
            $objCadenaValor = CadenaValor::ObtenerPorPlanId($PlanId);
        }

        $SUMA = 0;
        foreach($objCadenaValor as $Valor){
            $SUMA += $Valor->Valor;
        }
        $Potencial = 1 - ($SUMA / 100);

        $objFortalezas = Fortalezas::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
        $objDebilidades = Debilidades::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);

        return view('Analisis.CadenaValor',[
            'CadenaValor' => $objCadenaValor,
            'Fortalezas' => $objFortalezas,
            'Debilidades' => $objDebilidades,
            'SUMA' => $SUMA,
            'Potencial' => ($Potencial * 100),
            'PlanId' => $PlanId
        ]);
    }

    public function CalcularCadenaValor(Request $request){
        try
        {
            $objCadenaValor = CadenaValor::ObtenerPorPlanId($request->input('planid'));

            foreach($objCadenaValor as $row){
                $inputName = 'V' . $row->Codigo;
                
                if($request->has($inputName)){
                    $row->Valor = $request->input($inputName);
                    CadenaValor::Editar($row);
                }
            }

            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se calculó correctamente el potencial de mejora de la cadena de valor interna";
            return redirect()->action('AnalisisController@CadenaValor', ['PlanId' => $request->input('planid')]);


        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo calcular el potencial de mejora de la cadena de valor interna";
            return redirect()->action('AnalisisController@CadenaValor', ['PlanId' => $request->input('planid')]);
        }
    }

    // -- END ANALISIS - CADENA DE VALOR -------------------------------------------------------------------------

    // -- START ANALISIS - PARTICIPACIÓN -------------------------------------------------------------------------

    public function Participacion($PlanId){
        $ObjProductos = Productos::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
        $ObjPeriodos = Periodos::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
        $ObjFortalezas = Fortalezas::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
        $ObjDebilidades = Debilidades::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);

        $SUMA = 0;

        foreach($ObjProductos as $Item)
        {
            $SUMA += $Item->Ventas;
        }

        // - TCM -------
        foreach($ObjPeriodos as $Item)
        {
            foreach($ObjProductos as $ItemP)
            {
                if(Tcm::ObtenerPorPeriodoProducto($Item->Periodo, $ItemP->Id, auth()->user()->Id, $PlanId) == null)
                {
                    $ObjTCM = new Tcm();
                    $ObjTCM->UsuarioId = auth()->user()->Id;
                    $ObjTCM->PlanId = $PlanId;
                    $ObjTCM->Periodo = $Item->Periodo;
                    $ObjTCM->ProductoId = $ItemP->Id;
                    Tcm::Agregar($ObjTCM);
                }
            } 
        }

        // - EDGS -------
        foreach($ObjPeriodos as $Item)
        {
            foreach($ObjProductos as $ItemP)
            {
                if(Edgs::ObtenerPorPeriodoProducto($Item->Periodo, $ItemP->Id, auth()->user()->Id, $PlanId) == null)
                {
                    $ObjEDGS = new Edgs();
                    $ObjEDGS->UsuarioId = auth()->user()->Id;
                    $ObjEDGS->PlanId = $PlanId;
                    $ObjEDGS->Periodo = $Item->Periodo;
                    $ObjEDGS->ProductoId = $ItemP->Id;
                    Edgs::Agregar($ObjEDGS);
                }
            } 
        }

        $ObjTCM = Tcm::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
        $ObjTCMSuma = Tcm::ListarSUMA(auth()->user()->Id, $PlanId);
        $ObjEDGS = Edgs::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
        $ObjOrdenCompetidores = Competidores::ListarOrden(auth()->user()->Id, $PlanId);
        $ObjCompetidores = Competidores::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
        $ObjCompetidoresMAYOR = Competidores::ListarMAYOR(auth()->user()->Id, $PlanId);

        $PRM = Competidores::ListarMAYOR(auth()->user()->Id, $PlanId);

        foreach($PRM as $prm){
            if($prm->mayor_venta == 0){
                $prm->mayor_venta = $prm->mayor_venta;
            } else{
                $Producto = Productos::ObtenerPorId($prm->ProductoId);
                if(($Producto->Ventas / $prm->mayor_venta) > 2){
                    $prm->mayor_venta = 2;
                }else{
                    $prm->mayor_venta = ($Producto->Ventas / $prm->mayor_venta);
                }
            }
        }

        return view('Analisis.Participacion',[
            'Productos' => $ObjProductos,
            'Periodos' => $ObjPeriodos,
            'Fortalezas' => $ObjFortalezas,
            'Debilidades' => $ObjDebilidades,
            'TCM' => $ObjTCM,
            'TCMSuma' => $ObjTCMSuma,
            'PRM' => $PRM,
            'EDGS' => $ObjEDGS,
            'TotalProductos' => $SUMA,
            'OrdenCompetidores' => $ObjOrdenCompetidores,
            'Competidores' => $ObjCompetidores,
            'CompetidoresMAYOR' => $ObjCompetidoresMAYOR,
            'PlanId' => $PlanId
        ]);
    }

    public function ActualizarPorcentajes($PlanId)
    {
        $ObjProductos = Productos::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
        $SUMA = 0;
        foreach($ObjProductos as $Item)
        {
            $SUMA += $Item->Ventas;
        }

        foreach($ObjProductos as $Item)
        {
            $porcent = ($Item->Ventas * 100) / $SUMA;
            $Item->Porcentaje = number_format((float)$porcent, 2, '.', '');
            Productos::Editar($Item);
        }
    }

    public function AgregarProducto(Request $request)
    {
        try
        {
            $ObjProducto = new Productos();
            $ObjProducto->UsuarioId = auth()->user()->Id;
            $ObjProducto->PlanId = $request->input('planid');
            $ObjProducto->Nombre = $request->input('nombre');
            $ObjProducto->Ventas = $request->input('ventas');
            
            if($ProductoId = Productos::Agregar($ObjProducto))
            {
                $ObjCompetidores = Competidores::ListarOrden(auth()->user()->Id, $request->input('planid'));
                foreach($ObjCompetidores as $Item){
                    $ObjCompetidor = new Competidores();
                    $ObjCompetidor->UsuarioId = auth()->user()->Id;
                    $ObjCompetidor->PlanId = $request->input('planid');
                    $ObjCompetidor->Competidor = $Item->Competidor;
                    $ObjCompetidor->ProductoId = $ProductoId;
                    Competidores::Agregar($ObjCompetidor);
                }

                $this->ActualizarPorcentajes($request->input('planid'));

                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se agrego correctamente el producto";
                return redirect()->action('AnalisisController@Participacion', ['PlanId' => $request->input('planid')]);
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar el producto";
            return redirect()->action('AnalisisController@Participacion', ['PlanId' => $request->input('planid')]);
        }
    }

    public function EditarProducto(Request $request)
    {
        try
        {
            $ObjProducto = Productos::ObtenerPorId($request->input('id'));
            $ObjProducto->Nombre = $request->input('nombre');
            $ObjProducto->Ventas = $request->input('ventas');
            Productos::Editar($ObjProducto);

            $this->ActualizarPorcentajes($ObjProducto->PlanId);

            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se modifico correctamente el producto";
            return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjProducto->PlanId]);

        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar el producto";
            return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjProducto->PlanId]);
        }        
    }

    public function EliminarProducto($ProductoId)
    {
        try
        {
            $ObjProducto = Productos::ObtenerPorId($ProductoId);
            Productos::Eliminar($ObjProducto);

            $this->ActualizarPorcentajes();

            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se eliminó correctamente el producto";
            return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjProducto->PlanId]);

        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo eliminar el producto";
            return redirect()->action('AnalisisController@Participacion', ['PlanId' => $ObjProducto->PlanId]);
        }
    }

    public function AgregarPeriodo(Request $request)
    {
        try
        {
            $desde = $request->input('desde');
            $hasta = $request->input('hasta');
            $PlanId = $request->input('planid');

            if($result = Periodos::Modificar($desde, $hasta, auth()->user()->Id, $PlanId)){
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modifico correctamente los periodos";
                return redirect()->action('AnalisisController@Participacion', ['PlanId' => $PlanId]);
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar los periodos";
            return redirect()->action('AnalisisController@Participacion', ['PlanId' => $PlanId]);
        }
    }

    public function GuardarTCM(Request $request)
    {
        try
        {
            $PlanId = $request->input('planid');
            $ObjProductos = Productos::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
            $ObjPeriodos = Periodos::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);

            foreach($ObjPeriodos as $Periodo){
                foreach($ObjProductos as $Producto){
                    if($ObjTcm = Tcm::ObtenerPorPeriodoProducto($Periodo->Periodo, $Producto->Id, auth()->user()->Id, $PlanId)){
                        $ObjTcm->Valor = $request->input("PE".$Periodo->Periodo."PR".$Producto->Id);
                        Tcm::Editar($ObjTcm);
                    }
                }
            }

            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se guardo correctamente los valores del TCM";
            return redirect()->action('AnalisisController@Participacion', ['PlanId' => $PlanId]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo guardar los valores del TCM";
            return redirect()->action('AnalisisController@Participacion', ['PlanId' => $PlanId]);
        }
    }

    public function GuardarEDGS(Request $request)
    {
        try
        {
            $PlanId = $request->input('planid');
            $ObjProductos = Productos::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
            $ObjPeriodos = Periodos::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);

            foreach($ObjPeriodos as $Periodo){
                foreach($ObjProductos as $Producto){
                    if($ObjEdgs = Edgs::ObtenerPorPeriodoProducto($Periodo->Periodo, $Producto->Id, auth()->user()->Id, $PlanId)){
                        $ObjEdgs->Valor = $request->input("PE".$Periodo->Periodo."PR".$Producto->Id);
                        Edgs::Editar($ObjEdgs);
                    }
                }
            }

            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se guardo correctamente los valores del EDGS";
            return redirect()->action('AnalisisController@Participacion', ['PlanId' => $PlanId]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo guardar los valores del EDGS";
            return redirect()->action('AnalisisController@Participacion', ['PlanId' => $PlanId]);
        }
    }

    public function AgregarCompetidor($PlanId)
    {
        try
        {
            $ObjProductos = Productos::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
            $ObjCompetidores = Competidores::ListarOrden(auth()->user()->Id, $PlanId);

            foreach ($ObjProductos as $Item) {
                $ObjCompetidor = new Competidores();
                $ObjCompetidor->UsuarioId = auth()->user()->Id;
                $ObjCompetidor->PlanId = $PlanId;
                $ObjCompetidor->Competidor = count($ObjCompetidores) + 1;
                $ObjCompetidor->ProductoId = $Item->Id;
                Competidores::Agregar($ObjCompetidor);
            }
            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se agrego correctamente al competidor";
            return redirect()->action('AnalisisController@Participacion', ['PlanId' => $PlanId]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar al conpetidor";
            return redirect()->action('AnalisisController@Participacion', ['PlanId' => $PlanId]);
        }
    }

    public function GuardarCompetidores(Request $request)
    {
        try
        {
            $PlanId = $request->input('planid');
            $ObjCompetidores = Competidores::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);

            foreach($ObjCompetidores as $Item){
                if($ObjCompetidor = Competidores::ObtenerPorIdProductoId($Item->Id, $Item->ProductoId, auth()->user()->Id, $PlanId)){
                    $inputName = "C" . $Item->Id . "P" . $Item->ProductoId;
                    if ($request->exists($inputName)) {
                        $ObjCompetidor->Venta = $request->input($inputName);
                        Competidores::Editar($ObjCompetidor);
                    }
                }
            }

            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se agrego correctamente al competidor";
            return redirect()->action('AnalisisController@Participacion', ['PlanId' => $PlanId]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar al conpetidor";
            return redirect()->action('AnalisisController@Participacion', ['PlanId' => $PlanId]);
        }
    }

    // -- END ANALISIS - PARTICIPACIÓN ----------------------------------------------------------------------------

    // -- START ANALISIS - PORTER ---------------------------------------------------------------------------------

    public function Porter($PlanId){
        $objFuerzasPorter = FuerzasPorter::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
        $objOportunidades = Oportunidades::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
        $objAmenazas = Amenazas::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);

        if(count($objFuerzasPorter) < 1){
            $ObjPreguntasPorter = FuerzasPorter::ListarPreguntas();
            foreach($ObjPreguntasPorter as $Item){
                $ObjPorter = new FuerzasPorter();
                $ObjPorter->UsuarioId = auth()->user()->Id;
                $ObjPorter->PlanId = $PlanId;
                $ObjPorter->Fuerza = $Item->Codigo;
                FuerzasPorter::Agregar($ObjPorter);
            }
            $objFuerzasPorter = FuerzasPorter::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
        }

        $objFuerza01 = [];
        $objFuerza02 = [];
        $objFuerza03 = [];
        $objFuerza04 = [];

        $SUMA = 0;
        $Conclusion = "";

        foreach($objFuerzasPorter as $Fuerza){
            if($Fuerza->Codigo[1] == 1){
                $objFuerza01[] = $Fuerza;
            }
            if($Fuerza->Codigo[1] == 2){
                $objFuerza02[] = $Fuerza;
            }
            if($Fuerza->Codigo[1] == 3){
                $objFuerza03[] = $Fuerza;
            }
            if($Fuerza->Codigo[1] == 4){
                $objFuerza04[] = $Fuerza;
            }
            $SUMA += $Fuerza->Valor;
        }

        switch ($SUMA) {
            case ($SUMA < 30):
                $Conclusion = "Estamos en un mercado altamente competitivo, en el que es muy difícil hacerse un hueco en el mercado.";
                break;
            case ($SUMA < 45):
                $Conclusion = "Estamos en un mercado de competitividad relativamente alta, pero con ciertas modificaciones en el producto y la política comercial de la empresa, podría encontrarse un nicho de mercado.";
                break;
            case ($SUMA < 60):
                $Conclusion = "La situación actual del mercado es favorable a la empresa.";
                break;
            case ($SUMA >= 60):
                $Conclusion = "Estamos en una situación excelente para la empresa.";
                break;
        }

        return view('Analisis.Porter',[
            'FuerzasPorter' => $objFuerzasPorter,
            'Oportunidades' => $objOportunidades,
            'Amenazas' => $objAmenazas,
            'Fuerza01' => $objFuerza01,
            'Fuerza02' => $objFuerza02,
            'Fuerza03' => $objFuerza03,
            'Fuerza04' => $objFuerza04,
            'SUMA' => $SUMA,
            'Conclusion' => $Conclusion,
            'PlanId' => $PlanId
        ]);
    }

    public function CalcularPorter(Request $request)
    {
        try
        {
            $PlanId = $request->input('planid');
            $ObjFuerzasPorter = FuerzasPorter::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
            
            foreach($ObjFuerzasPorter as $FuerzaPorter){
                $FuerzaPorter->Valor = $request->input($FuerzaPorter->Codigo . '_ID' . $FuerzaPorter->Id);
                FuerzasPorter::Editar($FuerzaPorter);
            }

            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se modifico correctamente la fuerza de porter";
            return redirect()->action('AnalisisController@Porter', ['PlanId' => $PlanId]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar el objetivo específico";
            return redirect()->action('AnalisisController@Porter', ['PlanId' => $PlanId]);
        }
    }

    // -- END ANALISIS - PORTER ----------------------------------------------------------------------------------

    // -- START ANALISIS - PEST ----------------------------------------------------------------------------------

    public function PEST($PlanId){
        $objPest = Pest::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
        $objOportunidades = Oportunidades::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
        $objAmenazas = Amenazas::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);

        if(count($objPest) < 1){
            for ($i=1; $i <= 25 ; $i++) {
                $ObjPestNew = new Pest();
                $ObjPestNew->UsuarioId = auth()->user()->Id;
                $ObjPestNew->PlanId = $PlanId;
                $ObjPestNew->Codigo = 'P' . $i;
                Pest::Agregar($ObjPestNew);
            }
            $objPest = Pest::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
        }

        $SUMA01 = 0;
        $SUMA02 = 0;
        $SUMA03 = 0;
        $SUMA04 = 0;
        $SUMA05 = 0;

        $Conclusion01 = "1. ";
        $Conclusion02 = "2. ";
        $Conclusion03 = "3. ";
        $Conclusion04 = "4. ";
        $Conclusion05 = "5. ";

        foreach($objPest as $Pest){
            if($Pest->Id >= 1 && $Pest->Id <= 5){
                $SUMA01 += $Pest->Valor;
            }
            if($Pest->Id >= 6 && $Pest->Id <= 10){
                $SUMA02 += $Pest->Valor;
            }
            if($Pest->Id >= 11 && $Pest->Id <= 15){
                $SUMA03 += $Pest->Valor;
            }
            if($Pest->Id >= 16 && $Pest->Id <= 20){
                $SUMA04 += $Pest->Valor;
            }
            if($Pest->Id >= 21 && $Pest->Id <= 25){
                $SUMA05 += $Pest->Valor;
            }
        }

        $Impacto01 = ($SUMA01 / 20) * 100;
        $Impacto02 = ($SUMA02 / 20) * 100;
        $Impacto03 = ($SUMA03 / 20) * 100;
        $Impacto04 = ($SUMA04 / 20) * 100;
        $Impacto05 = ($SUMA05 / 20) * 100;

        if($Impacto01 >= 70){
            $Conclusion01 .= "HAY UN NOTABLE IMPACTO DE FACTORES SOCIALES Y DEMOGRÁFICOS EN EL FUNCIONAMIENTO DE LA EMPRESA.";
        } else{
            $Conclusion01 .= "NO HAY UN NOTABLE IMPACTO DE FACTORES SOCIALES Y DEMOGRÁFICOS EN EL FUNCIONAMIENTO DE LA EMPRESA.";
        }
        if($Impacto02 >= 70){
            $Conclusion02 .= "HAY UN NOTABLE IMPACTO DE FACTORES POLÍTICOS EN EL FUNCIONAMIENTO DE LA EMPRESA.";
        } else{
            $Conclusion02 .= "NO HAY UN NOTABLE IMPACTO DE FACTORES POLÍTICOS EN EL FUNCIONAMIENTO DE LA EMPRESA.";
        }
        if($Impacto03 >= 70){
            $Conclusion03 .= "HAY UN NOTABLE IMPACTO DE FACTORES ECONÓMICOS EN EL FUNCIONAMIENTO DE LA EMPRESA.";
        } else{
            $Conclusion03 .= "NO HAY UN NOTABLE IMPACTO DE FACTORES ECONÓMICOS EN EL FUNCIONAMIENTO DE LA EMPRESA.";
        }
        if($Impacto04 >= 70){
            $Conclusion04 .= "HAY UN NOTABLE IMPACTO DE FACTORES TECNOLÓGICOS EN EL FUNCIONAMIENTO DE LA EMPRESA.";
        } else{
            $Conclusion04 .= "NO HAY UN NOTABLE IMPACTO DE FACTORES TECNOLÓGICOS EN EL FUNCIONAMIENTO DE LA EMPRESA.";
        }
        if($Impacto05 >= 70){
            $Conclusion05 .= "HAY UN NOTABLE IMPACTO DEL FACTOR MEDIO AMBIENTAL EN EL FUNCIONAMIENTO DE LA EMPRESA.";
        } else{
            $Conclusion05 .= "NO HAY UN NOTABLE IMPACTO DEL FACTOR MEDIO AMBIENTAL EN EL FUNCIONAMIENTO DE LA EMPRESA.";
        }

        return view('Analisis.Pest',[
            'Pest' => $objPest,
            'Oportunidades' => $objOportunidades,
            'Amenazas' => $objAmenazas,
            'Conclusion01' => $Conclusion01,
            'Conclusion02' => $Conclusion02,
            'Conclusion03' => $Conclusion03,
            'Conclusion04' => $Conclusion04,
            'Conclusion05' => $Conclusion05,
            'PlanId' => $PlanId
        ]);
    }

    public function CalcularPEST(Request $request){
        try
        {
            $PlanId = $request->input('planid');
            $objPest = Pest::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);

            foreach($objPest as $Pest){
                $Pest->Valor = $request->input('valor' . $Pest->Id);
                Pest::Editar($Pest);
            }

            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se calculó correctamente el impacto de los factores PEST en el funcionamiento de la empresa";
            return redirect()->action('AnalisisController@PEST', ['PlanId' => $PlanId]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo calcular el impacto de los factores PEST en el funcionamiento de la empresa";
            return redirect()->action('AnalisisController@PEST', ['PlanId' => $PlanId]);
        }
    }

    // -- END ANALISIS - PEST ------------------------------------------------------------------------------------

    // -- START ANALISIS - CAME ----------------------------------------------------------------------------------

    public function CAME($PlanId){
        $ObjFortalezas = Fortalezas::ObtenerPorPlanId($PlanId);
        $ObjDebilidades = Debilidades::ObtenerPorPlanId($PlanId);
        $ObjOportunidades = Oportunidades::ObtenerPorPlanId($PlanId);
        $ObjAmenazas = Amenazas::ObtenerPorPlanId($PlanId);

        return view('Analisis.CAME',[
            'Fortalezas' => $ObjFortalezas,
            'Debilidades' => $ObjDebilidades,
            'Oportunidades' => $ObjOportunidades,
            'Amenazas' => $ObjAmenazas,
            'PlanId' => $PlanId
        ]);
    }

    // -- END ANALISIS - CAME -------------------------------------------------------------------------------------

    // -- START GRAFICOS ------------------------------------------------------------------------------------------

    public function Graficos($PlanId)
    {
        try
        {
            $objPest = Pest::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
            $ObjProductos = Productos::DatosGrafico(auth()->user()->Id, $PlanId);
            $ObjPeriodos = Periodos::ObtenerPorUsuarioIdPlanId(auth()->user()->Id, $PlanId);
            $ObjCompetidores = Competidores::ListarMAYOR(auth()->user()->Id, $PlanId);

            foreach($ObjProductos as $Item){
                $tcm = $Item->TCM / count($ObjPeriodos);
                if($tcm > (100 / count($ObjProductos))){
                    $Item->TCM = 20;
                }else{
                    $Item->TCM = $tcm;
                }
                foreach($ObjCompetidores as $Comp){
                    if($Item->Id == $Comp->ProductoId){    
                        if($Comp->mayor_venta == 0){
                            $Item->PRM = 0;
                        }else {
                            if(($Item->Ventas / $Comp->mayor_venta) > 2){
                                $Item->PRM = 2;
                            } else {
                                $Item->PRM = $Item->Ventas / $Comp->mayor_venta;
                            }
                        }
                    }
                }
            }

            $SumTCM = 0;
            $SumPRM = 0;
            $SumPorcentajes = 0;
            foreach($ObjProductos as $Item){
                $SumTCM += $Item->TCM;
                $SumPRM += $Item->PRM;
                $SumPorcentajes += $Item->Porcentaje;
            }

            $PromTCM = $SumTCM / count($ObjProductos);
            $PromPRM = $SumPRM / count($ObjProductos);
            $PromPorcentaje = $SumPorcentajes / count($ObjProductos);

            $SUMA01 = 0;
            $SUMA02 = 0;
            $SUMA03 = 0;
            $SUMA04 = 0;
            $SUMA05 = 0;

            foreach($objPest as $Pest){
                if($Pest->Id >= 1 && $Pest->Id <= 5){
                    $SUMA01 += $Pest->Valor;
                }
                if($Pest->Id >= 6 && $Pest->Id <= 10){
                    $SUMA02 += $Pest->Valor;
                }
                if($Pest->Id >= 11 && $Pest->Id <= 15){
                    $SUMA03 += $Pest->Valor;
                }
                if($Pest->Id >= 16 && $Pest->Id <= 20){
                    $SUMA04 += $Pest->Valor;
                }
                if($Pest->Id >= 21 && $Pest->Id <= 25){
                    $SUMA05 += $Pest->Valor;
                }
            }

            $Impacto01 = ($SUMA01 / 20) * 100;
            $Impacto02 = ($SUMA02 / 20) * 100;
            $Impacto03 = ($SUMA03 / 20) * 100;
            $Impacto04 = ($SUMA04 / 20) * 100;
            $Impacto05 = ($SUMA05 / 20) * 100;

            return view('Analisis.Graficos',[
                'Impacto1' => $Impacto01,
                'Impacto2' => $Impacto02,
                'Impacto3' => $Impacto03,
                'Impacto4' => $Impacto04,
                'Impacto5' => $Impacto05,
                'Productos' => $ObjProductos,
                'PromTCM' => $PromTCM,
                'PromPRM' => $PromPRM,
                'PromPorcentaje' => $PromPorcentaje,
                'PlanId' => $PlanId
            ]);
        }
        catch (\Throwable $th) {
            session_start();
            $_SESSION["ALERTA"] = "warning";
            $_SESSION["MENSAJE"] = "Primero realiza el Analisi de Participacion y Analsisi PEST";
            return redirect()->action('PlanController@PlanesEstrategicos');
        }
    }

    // -- END GRAFICOS --------------------------------------------------------------------------------------------
}
?>