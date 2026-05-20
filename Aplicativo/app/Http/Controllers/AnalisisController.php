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
    // -- START ANALISIS INTERNO ----------------------------------

    public function Interno(){
        $objFortalezas = Fortalezas::Listar();
        $objDebilidades = Debilidades::Listar();
        return view('Analisis.Interno',[
            'Fortalezas' => $objFortalezas,
            'Debilidades' => $objDebilidades
        ]);
    }

    public function AgregarFortaleza(Request $request)
    {
        try
        {
            $ObjFortaleza = new Fortalezas();
            $ObjFortaleza->Fortaleza = $request->input('fortaleza');
            $ObjFortaleza->Origen = $request->input('modulo');
            
            if(Fortalezas::Agregar($ObjFortaleza))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se agregó correctamente la fortaleza";
                if($request->input('modulo') == "cadena"){
                    return redirect()->action('AnalisisController@CadenaValor');
                }
                if($request->input('modulo') == "participacion"){
                    return redirect()->action('AnalisisController@Participacion');
                }
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo agregar la fortaleza";
                if($request->input('modulo') == "cadena"){
                    return redirect()->action('AnalisisController@CadenaValor');
                }
                if($request->input('modulo') == "participacion"){
                    return redirect()->action('AnalisisController@Participacion');
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar la fortaleza";
            if($request->input('modulo') == "cadena"){
                return redirect()->action('AnalisisController@CadenaValor');
            }
            if($request->input('modulo') == "participacion"){
                return redirect()->action('AnalisisController@Participacion');
            }
        }
    }

    public function EditarFortaleza(Request $request)
    {
        try
        {
            $ObjFortaleza = Fortalezas::ObtenerPorId($request->input('id'));
            $ObjFortaleza->Fortaleza = $request->input('fortaleza');
            
            if(Fortalezas::Editar($ObjFortaleza))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modifico correctamente la fortaleza";
                return redirect()->action('AnalisisController@Interno');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo modificar la fortaleza";
                return redirect()->action('AnalisisController@Interno');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar la fortaleza";
            return redirect()->action('AnalisisController@Interno');
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
                return redirect()->action('AnalisisController@Interno');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo eliminar la fortaleza";
                return redirect()->action('AnalisisController@Interno');
            }
         }
         catch (\Illuminate\Database\QueryException $e)
         {
             session_start();
             $_SESSION["ALERTA"] = "error";
             $_SESSION["MENSAJE"] = "No se pudo eliminar la fortaleza";
             return redirect()->action('AnalisisController@Interno');
         }
    }

    public function AgregarDebilidad(Request $request)
    {
        try
        {
            $ObjDebilidad = new Debilidades();
            $ObjDebilidad->Debilidad = $request->input('debilidad');
            $ObjFortaleza->Origen = $request->input('modulo');
            
            if(Debilidades::Agregar($ObjDebilidad))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se agregó correctamente la debilidad";
                if($request->input('modulo') == "cadena"){
                    return redirect()->action('AnalisisController@CadenaValor');
                }
                if($request->input('modulo') == "participacion"){
                    return redirect()->action('AnalisisController@Participacion');
                }
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo agregar la debilidad";
                if($request->input('modulo') == "cadena"){
                    return redirect()->action('AnalisisController@CadenaValor');
                }
                if($request->input('modulo') == "participacion"){
                    return redirect()->action('AnalisisController@Participacion');
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar la debilidad";
            if($request->input('modulo') == "cadena"){
                return redirect()->action('AnalisisController@CadenaValor');
            }
            if($request->input('modulo') == "participacion"){
                return redirect()->action('AnalisisController@Participacion');
            }
        }
    }

    public function EditarDebilidad(Request $request)
    {
        try
        {
            $ObjDebilidad = Debilidades::ObtenerPorId($request->input('id'));
            $ObjDebilidad->Debilidad = $request->input('debilidad');
            
            if(Debilidades::Editar($ObjDebilidad))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modifico correctamente la debilidad";
                return redirect()->action('AnalisisController@Interno');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo modificar la debilidad";
                return redirect()->action('AnalisisController@Interno');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar la debilidad";
            return redirect()->action('AnalisisController@Interno');
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
                return redirect()->action('AnalisisController@Interno');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo eliminar la debilidad";
                return redirect()->action('AnalisisController@Interno');
            }
         }
         catch (\Illuminate\Database\QueryException $e)
         {
             session_start();
             $_SESSION["ALERTA"] = "error";
             $_SESSION["MENSAJE"] = "No se pudo eliminar la debilidad";
             return redirect()->action('AnalisisController@Interno');
         }
    }

    // -- END ANALISIS INTERNO ----------------------------------

    // -- START ANALISIS EXTERNO ----------------------------------

    public function Externo(){
        $objOportunidades = Oportunidades::Listar();
        $objAmenazas = Amenazas::Listar();
        return view('Analisis.Externo',[
            'Oportunidades' => $objOportunidades,
            'Amenazas' => $objAmenazas
        ]);
    }

    public function AgregarOportunidad(Request $request)
    {
        try
        {
            $ObjOportunidad = new Oportunidades();
            $ObjOportunidad->Oportunidad = $request->input('oportunidad');
            $ObjFortaleza->Origen = $request->input('modulo');
            
            if(Oportunidades::Agregar($ObjOportunidad))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se agregó correctamente la oportunidad";
                if($request->input('modulo') == "porter"){
                    return redirect()->action('AnalisisController@Porter');
                }
                if($request->input('modulo') == "pest"){
                    return redirect()->action('AnalisisController@PEST');
                }
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo agregar la oportunidad";
                if($request->input('modulo') == "porter"){
                    return redirect()->action('AnalisisController@Porter');
                }
                if($request->input('modulo') == "pest"){
                    return redirect()->action('AnalisisController@PEST');
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar la oportunidad";
            if($request->input('modulo') == "porter"){
                return redirect()->action('AnalisisController@Porter');
            }
            if($request->input('modulo') == "pest"){
                return redirect()->action('AnalisisController@PEST');
            }
        }
    }

    public function EditarOportunidad(Request $request)
    {
        try
        {
            $ObjOportunidad = Oportunidades::ObtenerPorId($request->input('id'));
            $ObjOportunidad->Oportunidad = $request->input('oportunidad');
            
            if(Oportunidades::Editar($ObjOportunidad))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modifico correctamente la oportunidad";
                return redirect()->action('AnalisisController@Externo');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo modificar la oportunidad";
                return redirect()->action('AnalisisController@Externo');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar la oportunidad";
            return redirect()->action('AnalisisController@Externo');
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
                return redirect()->action('AnalisisController@Externo');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo eliminar la oportunidad";
                return redirect()->action('AnalisisController@Externo');
            }
         }
         catch (\Illuminate\Database\QueryException $e)
         {
             session_start();
             $_SESSION["ALERTA"] = "error";
             $_SESSION["MENSAJE"] = "No se pudo eliminar la oportunidad";
             return redirect()->action('AnalisisController@Externo');
         }
    }

    public function AgregarAmenaza(Request $request)
    {
        try
        {
            $ObjAmenaza = new Amenazas();
            $ObjAmenaza->Amenaza = $request->input('amenaza');
            $ObjFortaleza->Origen = $request->input('modulo');
            
            if(Amenazas::Agregar($ObjAmenaza))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se agregó correctamente la amenaza";
                if($request->input('modulo') == "porter"){
                    return redirect()->action('AnalisisController@Porter');
                }
                if($request->input('modulo') == "pest"){
                    return redirect()->action('AnalisisController@PEST');
                }
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo agregar la amenaza";
                if($request->input('modulo') == "porter"){
                    return redirect()->action('AnalisisController@Porter');
                }
                if($request->input('modulo') == "pest"){
                    return redirect()->action('AnalisisController@PEST');
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar la amenaza";
            if($request->input('modulo') == "porter"){
                return redirect()->action('AnalisisController@Porter');
            }
            if($request->input('modulo') == "pest"){
                return redirect()->action('AnalisisController@PEST');
            }
        }
    }

    public function EditarAmenaza(Request $request)
    {
        try
        {
            $ObjAmenaza = Amenazas::ObtenerPorId($request->input('id'));
            $ObjAmenaza->Amenaza = $request->input('amenaza');
            
            if(Amenazas::Editar($ObjAmenaza))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modifico correctamente la amenaza";
                return redirect()->action('AnalisisController@Externo');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo modificar la amenaza";
                return redirect()->action('AnalisisController@Externo');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar la amenaza";
            return redirect()->action('AnalisisController@Externo');
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
                return redirect()->action('AnalisisController@Externo');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo eliminar la amenaza";
                return redirect()->action('AnalisisController@Externo');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo eliminar la amenaza";
            return redirect()->action('AnalisisController@Externo');
        }
    }

    // -- END ANALISIS EXTERNO ----------------------------------

    // -- START ANALISIS - CADENA DE VALOR ----------------------------------

    public function CadenaValor(){
        $objCadenaValor = CadenaValor::Listar();
        $objFortalezas = Fortalezas::Listar();
        $objDebilidades = Debilidades::Listar();

        $SUMA = 0;
        foreach($objCadenaValor as $Valor){
            $SUMA += $Valor->Valor;
        }
        $Potencial = 1 - ($SUMA / 100);

        return view('Analisis.CadenaValor',[
            'CadenaValor' => $objCadenaValor,
            'Fortalezas' => $objFortalezas,
            'Debilidades' => $objDebilidades,
            'SUMA' => $SUMA,
            'Potencial' => ($Potencial * 100)
        ]);
    }

    public function CalcularCadenaValor(Request $request){
        try
        {
            $objCadenaValor = CadenaValor::Listar();

            foreach($objCadenaValor as $Valor){
                $Valor->Valor = $request->input('valor' . $Valor->Id);
                CadenaValor::Editar($Valor);
            }

            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se calculó correctamente el potencial de mejora de la cadena de valor interna";
            return redirect()->action('AnalisisController@CadenaValor');
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo calcular el potencial de mejora de la cadena de valor interna";
            return redirect()->action('AnalisisController@CadenaValor');
        }
    }

    // -- END ANALISIS - CADENA DE VALOR ----------------------------------

    // -- START ANALISIS - PARTICIPACIÓN ----------------------------------

    public function Participacion(){
        $ObjProductos = Productos::Listar();
        $ObjPeriodos = Periodos::Listar();
        $ObjFortalezas = Fortalezas::Listar();
        $ObjDebilidades = Debilidades::Listar();

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
                if(Tcm::ObtenerPorPeriodoProducto($Item->Periodo, $ItemP->Id) == null)
                {
                    $ObjTCM = new Tcm();
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
                if(Edgs::ObtenerPorPeriodoProducto($Item->Periodo, $ItemP->Id) == null)
                {
                    $ObjEDGS = new Edgs();
                    $ObjEDGS->Periodo = $Item->Periodo;
                    $ObjEDGS->ProductoId = $ItemP->Id;
                    Edgs::Agregar($ObjEDGS);
                }
            } 
        }

        $ObjTCM = Tcm::Listar();
        $ObjTCMSuma = Tcm::ListarSUMA();
        $ObjEDGS = Edgs::Listar();
        $ObjOrdenCompetidores = Competidores::ListarOrden();
        $ObjCompetidores = Competidores::Listar();
        $ObjCompetidoresMAYOR = Competidores::ListarMAYOR();

        $PRM = Competidores::ListarMAYOR();

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
            'CompetidoresMAYOR' => $ObjCompetidoresMAYOR
        ]);
    }

    public function AgregarProducto(Request $request)
    {
        try
        {
            $ObjProductos = Productos::Listar();
            $SUMA = 0;
            foreach($ObjProductos as $Item)
            {
                $SUMA += $Item->Ventas;
            }

            $ObjProducto = new Productos();
            $ObjProducto->Nombre = $request->input('nombre');
            $ObjProducto->Ventas = $request->input('ventas');
            $porcent = ($ObjProducto->Ventas * 100) / $SUMA;
            $ObjProducto->Porcentaje = number_format((float)$porcent, 2, '.', '');
            
            if($ProductoId = Productos::Agregar($ObjProducto))
            {
                $ObjCompetidores = Competidores::ListarOrden();
                foreach($ObjCompetidores as $Item){
                    $ObjCompetidor = new Competidores();
                    $ObjCompetidor->Competidor = $Item->Competidor;
                    $ObjCompetidor->ProductoId = $ProductoId;
                    Competidores::Agregar($ObjCompetidor);
                }

                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se agrego correctamente el producto";
                return redirect()->action('AnalisisController@Participacion');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo agregar el producto";
                return redirect()->action('AnalisisController@Participacion');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar el producto";
            return redirect()->action('AnalisisController@Participacion');
        }
    }

    public function ActualizarPorcentajes()
    {
        $ObjProductos = Productos::Listar();
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

    public function EditarProducto(Request $request)
    {
        try
        {
            $ObjProducto = Productos::ObtenerPorId($request->input('id'));
            $ObjProducto->Nombre = $request->input('nombre');
            $ObjProducto->Ventas = $request->input('ventas');
            Productos::Editar($ObjProducto);

            $this->ActualizarPorcentajes();

            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se modifico correctamente el producto";
            return redirect()->action('AnalisisController@Participacion');

        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar el producto";
            return redirect()->action('AnalisisController@Participacion');
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
            return redirect()->action('AnalisisController@Participacion');

        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo eliminar el producto";
            return redirect()->action('AnalisisController@Participacion');
        }
    }

    public function AgregarPeriodo(Request $request)
    {
        try
        {
            $desde = $request->input('desde');
            $hasta = $request->input('hasta');

            if(Periodos::Modificar($desde, $hasta) == 1){
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modifico correctamente los periodos";
                return redirect()->action('AnalisisController@Participacion');
            }            
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar los periodos";
            return redirect()->action('AnalisisController@Participacion');
        }
    }

    public function GuardarTCM(Request $request)
    {
        try
        {
            $ObjPeriodos = Periodos::Listar();
            $ObjProductos = Productos::Listar();
            $ObjTcm = Tcm::Listar();

            foreach($ObjPeriodos as $Periodo){
                foreach($ObjProductos as $Producto){
                    if($ObjTcm = Tcm::ObtenerPorPeriodoProducto($Periodo->Periodo, $Producto->Id)){
                        $ObjTcm->Valor = $request->input("PE".$Periodo->Periodo."PR".$Producto->Id);
                        Tcm::Editar($ObjTcm);
                    }
                }
            }

            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se guardo correctamente los valores del TCM";
            return redirect()->action('AnalisisController@Participacion');
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo guardar los valores del TCM";
            return redirect()->action('AnalisisController@Participacion');
        }
    }

    public function GuardarEDGS(Request $request)
    {
        try
        {
            $ObjPeriodos = Periodos::Listar();
            $ObjProductos = Productos::Listar();

            foreach($ObjPeriodos as $Periodo){
                foreach($ObjProductos as $Producto){
                    if($ObjEdgs = Edgs::ObtenerPorPeriodoProducto($Periodo->Periodo, $Producto->Id)){
                        $ObjEdgs->Valor = $request->input("PE".$Periodo->Periodo."PR".$Producto->Id);
                        Edgs::Editar($ObjEdgs);
                    }
                }
            }

            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se guardo correctamente los valores del EDGS";
            return redirect()->action('AnalisisController@Participacion');
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo guardar los valores del EDGS";
            return redirect()->action('AnalisisController@Participacion');
        }
    }

    public function AgregarCompetidor()
    {
        try
        {
            $ObjProductos = Productos::Listar();
            $ObjCompetidores = Competidores::ListarOrden();

            foreach ($ObjProductos as $Item) {
                $ObjCompetidor = new Competidores();
                $ObjCompetidor->Competidor = count($ObjCompetidores) + 1;
                $ObjCompetidor->ProductoId = $Item->Id;
                Competidores::Agregar($ObjCompetidor);
            }
            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se agrego correctamente al competidor";
            return redirect()->action('AnalisisController@Participacion');
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar al conpetidor";
            return redirect()->action('AnalisisController@Participacion');
        }
    }

    public function GuardarCompetidores(Request $request)
    {
        try
        {
            $ObjCompetidores = Competidores::Listar();

            foreach($ObjCompetidores as $Item){
                if($ObjCompetidor = Competidores::ObtenerPorIdProductoId($Item->Id, $Item->ProductoId)){
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
            return redirect()->action('AnalisisController@Participacion');
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar al conpetidor";
            return redirect()->action('AnalisisController@Participacion');
        }
    }

    // -- END ANALISIS - PARTICIPACIÓN ----------------------------------

    // -- START ANALISIS - PORTER ----------------------------------

    public function Porter(){
        $objFuerzasPorter = FuerzasPorter::Listar();
        $objOportunidades = Oportunidades::Listar();
        $objAmenazas = Amenazas::Listar();

        $objFuerza01 = [];
        $objFuerza02 = [];
        $objFuerza03 = [];
        $objFuerza04 = [];

        $SUMA = 0;
        $Conclusion = "";

        foreach($objFuerzasPorter as $Fuerza){
            if($Fuerza->Fuerza == 1){
                $objFuerza01[] = $Fuerza;
            }
            if($Fuerza->Fuerza == 2){
                $objFuerza02[] = $Fuerza;
            }
            if($Fuerza->Fuerza == 3){
                $objFuerza03[] = $Fuerza;
            }
            if($Fuerza->Fuerza == 4){
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
            'Conclusion' => $Conclusion
        ]);
    }

    public function CalcularPorter(Request $request)
    {
        try
        {
            $ObjFuerzasPorter = FuerzasPorter::Listar();
            
            foreach($ObjFuerzasPorter as $FuerzaPorter){
                $FuerzaPorter->Valor = $request->input('F' . $FuerzaPorter->Fuerza . '_ID' . $FuerzaPorter->Id);
                FuerzasPorter::Editar($FuerzaPorter);
            }

            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se modifico correctamente la fuerza de porter";
            return redirect()->action('AnalisisController@Porter');
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar el objetivo específico";
            return redirect()->action('AnalisisController@Porter');
        }
    }

    // -- END ANALISIS - PORTER ----------------------------------

    // -- START ANALISIS - PEST ----------------------------------

    public function PEST(){
        $objPest = Pest::Listar();
        $objOportunidades = Oportunidades::Listar();
        $objAmenazas = Amenazas::Listar();

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
            'Conclusion05' => $Conclusion05
        ]);
    }

    public function CalcularPEST(Request $request){
        try
        {
            $objPest = Pest::Listar();

            foreach($objPest as $Pest){
                $Pest->Valor = $request->input('valor' . $Pest->Id);
                Pest::Editar($Pest);
            }

            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se calculó correctamente el impacto de los factores PEST en el funcionamiento de la empresa";
            return redirect()->action('AnalisisController@PEST');
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo calcular el impacto de los factores PEST en el funcionamiento de la empresa";
            return redirect()->action('AnalisisController@PEST');
        }
    }

    // -- END ANALISIS - PEST ----------------------------------

    // -- START ANALISIS - CAME ----------------------------------

    public function CAME($PlanId){
        $ObjFortalezas = Fortalezas::Listar();
        $ObjDebilidades = Debilidades::Listar();
        $ObjOportunidades = Oportunidades::Listar();
        $ObjAmenazas = Amenazas::Listar();

        // - Fortalezas / M ------------
        foreach($ObjFortalezas as $Item)
        {
            if(Came::ObtenerPorTipo($PlanId, 'M' . $Item->Id) == null)
            {
                $ObjCame = new Came();
                $ObjCame->PlanId = $PlanId;
                $ObjCame->Tipo = "M" . $Item->Id;
                Came::Agregar($ObjCame);
            }
        }

        // - Debilidades / C ------------
        foreach($ObjDebilidades as $Item)
        {
            if(Came::ObtenerPorTipo($PlanId, 'C' . $Item->Id) == null)
            {
                $ObjCame = new Came();
                $ObjCame->PlanId = $PlanId;
                $ObjCame->Tipo = "C" . $Item->Id;
                Came::Agregar($ObjCame);
            }
        }

        // - Oportunidades / E ------------
        foreach($ObjOportunidades as $Item)
        {
            if(Came::ObtenerPorTipo($PlanId, 'E' . $Item->Id) == null)
            {
                $ObjCame = new Came();
                $ObjCame->PlanId = $PlanId;
                $ObjCame->Tipo = "E" . $Item->Id;
                Came::Agregar($ObjCame);
            }
        }

        // - Amenazas / A ------------
        foreach($ObjAmenazas as $Item)
        {
            if(Came::ObtenerPorTipo($PlanId, 'A' . $Item->Id) == null)
            {
                $ObjCame = new Came();
                $ObjCame->PlanId = $PlanId;
                $ObjCame->Tipo = "A" . $Item->Id;
                Came::Agregar($ObjCame);
            }
        }

        $ObjCame = Came::ObtenerPorPlanId($PlanId);

        return view('Analisis.CAME',[
            'Fortalezas' => $ObjFortalezas,
            'Debilidades' => $ObjDebilidades,
            'Oportunidades' => $ObjOportunidades,
            'Amenazas' => $ObjAmenazas,
            'Came' => $ObjCame,
            'PlanId' => $PlanId
        ]);
    }

    public function GuardarCAME(Request $request)
    {
        try
        {
            $ObjCame = Came::ObtenerPorPlanId($request->input('planid'));

            foreach($ObjCame as $C)
            {
                if(Debilidades::ObtenerPorId(substr($C->Tipo, 1)))
                {
                    if($request->input($C->Tipo) != null) { $C->Accion = $request->input($C->Tipo); }
                    else { $C->Accion = null; }
                    Came::Editar($C);
                }
            }
            foreach($ObjCame as $A)
            {
                if(Amenazas::ObtenerPorId(substr($A->Tipo, 1)))
                {
                    if($request->input($A->Tipo) != null) { $A->Accion = $request->input($A->Tipo); }
                    else { $A->Accion = null; }
                    Came::Editar($A);
                }
            }
            foreach($ObjCame as $M)
            {
                if(Fortalezas::ObtenerPorId(substr($M->Tipo, 1)))
                {
                    if($request->input($M->Tipo) != null) { $M->Accion = $request->input($M->Tipo); }
                    else { $M->Accion = null; }
                    Came::Editar($M);
                }
            }
            foreach($ObjCame as $E)
            {
                if(Oportunidades::ObtenerPorId(substr($E->Tipo, 1)))
                {
                    if($request->input($E->Tipo) != null) { $E->Accion = $request->input($E->Tipo); }
                    else { $M->Accion = null; }
                    Came::Editar($E);
                }
            }

            session_start();
            $_SESSION["ALERTA"] = "success";
            $_SESSION["MENSAJE"] = "Se guardo correctamente los datos de la matriz CAME";
            return redirect()->action('AnalisisController@CAME', ['PlanId' => $request->input('planid')]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo guardar los datos de la matriz CAME";
            return redirect()->action('AnalisisController@CAME', ['PlanId' => $request->input('planid')]);
        }
    }
    // -- END ANALISIS - CAME ----------------------------------

    public function Graficos()
    {
        $objPest = Pest::Listar();
        $objPeriodos = Periodos::Listar();
        $objProductos = Productos::DatosGrafico();
        $ObjCompetidores = Competidores::ListarMAYOR();

        foreach($objProductos as $Item){
            $tcm = $Item->TCM / count($objPeriodos);
            if($tcm > (100 / count($objProductos))){
                $Item->TCM = 20;
            }else{
                $Item->TCM = $tcm;
            }
            foreach($ObjCompetidores as $Comp){
                if($Item->Id == $Comp->ProductoId){
                    $Item->PRM = $Item->Ventas / $Comp->mayor_venta;
                }
            }
        }

        $SumTCM = 0;
        $SumPRM = 0;
        $SumPorcentajes = 0;
        foreach($objProductos as $Item){
            $SumTCM += $Item->TCM;
            $SumPRM += $Item->PRM;
            $SumPorcentajes += $Item->Porcentaje;
        }

        $PromTCM = $SumTCM / count($objProductos);
        $PromPRM = $SumPRM / count($objProductos);
        $PromPorcentaje = $SumPorcentajes / count($objProductos);

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
            'Productos' => $objProductos,
            'PromTCM' => $PromTCM,
            'PromPRM' => $PromPRM,
            'PromPorcentaje' => $PromPorcentaje
        ]);
    }
}
?>