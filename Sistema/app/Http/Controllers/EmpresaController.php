<?php

namespace App\Http\Controllers;

// Importación de modelos necesarios
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa as Empresa;
use App\Models\Valores as Valores;
use App\Models\ObjetivosGenerales as ObjetivosGenerales;
use App\Models\ObjetivosEspecificos as ObjetivosEspecificos;
use App\Models\UnidadEstrategica as UnidadEstrategica;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    public function Home(){
        $ObjEmpresa = Empresa::ObtenerPorId(1);
        $ObjValores = Valores::Listar();
        $ObjObjetivosGenerales = ObjetivosGenerales::Listar();
        $ObjUnidadesEstrategicas = UnidadEstrategica::Listar();
        return view('Empresa.Home',[
            'Empresa' => $ObjEmpresa,
            'Valores' => $ObjValores,
            'ObjetivosGenerales' => $ObjObjetivosGenerales,
            'UnidadesEstrategicas' => $ObjUnidadesEstrategicas
        ]);
    }

    public function ObjetivoEspecifico($ObjetivoId){
        $ObjObjetivosGenerales = ObjetivosGenerales::ObtenerPorId($ObjetivoId);
        $ObjObjetivoEspecifico = ObjetivosEspecificos::ListarPorObjetivoGeneralId($ObjetivoId);
        return view('Empresa.ObjetivosEsp',[
            'ObjetivoId' => $ObjObjetivosGenerales->Id,
            'ObjetivosEspecificos' => $ObjObjetivoEspecifico,
            'ObjetivoGeneral' => $ObjObjetivosGenerales
        ]);
    }

    public function EditarNombre(Request $request)
    {
        try
        {
            $objEmpresa = Empresa::ObtenerPorId($request->input('id'));
            $objEmpresa->Nombre = $request->input('nombre');

            if(Empresa::Editar($objEmpresa))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modificó correctamente el nombre de la empresa";
                return redirect()->action('EmpresaController@Home');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo modificar el nombre de la empresa";
                return redirect()->action('EmpresaController@Home');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar el nombre de la empresa";
            return redirect()->action('EmpresaController@Home');
        }
    }

    public function EditarDescripcion(Request $request)
    {
        try
        {
            $objEmpresa = Empresa::ObtenerPorId($request->input('id'));
            $objEmpresa->Descripcion = $request->input('descripcion');

            if(Empresa::Editar($objEmpresa))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modificó correctamente la descripción de la empresa";
                return redirect()->action('EmpresaController@Home');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo modificar la descripción de la empresa";
                return redirect()->action('EmpresaController@Home');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar la descripción de la empresa";
            return redirect()->action('EmpresaController@Home');
        }
    }

    public function EditarMision(Request $request)
    {
        try
        {
            $objEmpresa = Empresa::ObtenerPorId($request->input('id'));
            $objEmpresa->Mision = $request->input('mision');

            if(Empresa::Editar($objEmpresa))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modificó correctamente la misión de la empresa";
                return redirect()->action('EmpresaController@Home');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo modificar la misión de la empresa";
                return redirect()->action('EmpresaController@Home');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar la misión de la empresa";
            return redirect()->action('EmpresaController@Home');
        }
    }

    public function EditarVision(Request $request)
    {
        try
        {
            $objEmpresa = Empresa::ObtenerPorId($request->input('id'));
            $objEmpresa->Vision = $request->input('vision');

            if(Empresa::Editar($objEmpresa))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modificó correctamente la visión de la empresa";
                return redirect()->action('EmpresaController@Home');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo modificar la visión de la empresa";
                return redirect()->action('EmpresaController@Home');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar la visión de la empresa";
            return redirect()->action('EmpresaController@Home');
        }
    }

    public function AgregarUnidad(Request $request)
    {
        try
        {
            $ObjUnidadEstrategica = new UnidadEstrategica();
            $ObjUnidadEstrategica->Unidad = $request->input('unidad');

            if(UnidadEstrategica::Agregar($ObjUnidadEstrategica))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se agregó correctamente la unidad estratégica";
                return redirect()->action('EmpresaController@Home');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo agregar la unidad estratégica";
                return redirect()->action('EmpresaController@Home');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar la unidad estratégica";
            return redirect()->action('EmpresaController@Home');
        }
    }

    public function EditarUnidad(Request $request)
    {
        try
        {
            $ObjUnidadEstrategica = UnidadEstrategica::ObtenerPorId($request->input('id'));
            $ObjUnidadEstrategica->Unidad = $request->input('unidad');

            if(UnidadEstrategica::Editar($ObjUnidadEstrategica))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modificó correctamente la unidad estratégica";
                return redirect()->action('EmpresaController@Home');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo modificar la unidad estratégica";
                return redirect()->action('EmpresaController@Home');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start(); // Inicia la sesión
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar la unidad estratégica";
            return redirect()->action('EmpresaController@Home');
        }
    }

    public function EliminarUnidad($UnidadId)
    {
        try
        {
            $ObjUnidadEstrategica = UnidadEstrategica::ObtenerPorId($UnidadId);

            if(UnidadEstrategica::Eliminar($ObjUnidadEstrategica))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se eliminó correctamente la unidad estratégica";
                return redirect()->action('EmpresaController@Home');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo eliminar la unidad estratégica";
                return redirect()->action('EmpresaController@Home');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo eliminar la unidad estratégica";
            return redirect()->action('EmpresaController@Home');
        }
    }

    public function AgregarValor(Request $request)
    {
        try
        {
            $ObjValor = new Valores();
            $ObjValor->Valor = $request->input('valor');

            if(Valores::Agregar($ObjValor))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se agregó correctamente el valor";
                return redirect()->action('EmpresaController@Home');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo agregar el valor";
                return redirect()->action('EmpresaController@Home');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar el valor";
            return redirect()->action('EmpresaController@Home');
        }
    }

    public function EditarValor(Request $request)
    {
        try
        {
            $ObjValor = Valores::ObtenerPorId($request->input('id'));
            $ObjValor->Valor = $request->input('valor');

            if(Valores::Editar($ObjValor))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modificó correctamente el valor";
                return redirect()->action('EmpresaController@Home');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo modificar el valor";
                return redirect()->action('EmpresaController@Home');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar el valor";
            return redirect()->action('EmpresaController@Home');
        }
    }

    public function EliminarValor($ValorId)
    {
        try
        {
            $ObjValor = Valores::ObtenerPorId($ValorId);

            if(Valores::Eliminar($ObjValor))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se eliminó correctamente el valor";
                return redirect()->action('EmpresaController@Home');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo eliminar el valor";
                return redirect()->action('EmpresaController@Home');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo eliminar el valor";
            return redirect()->action('EmpresaController@Home');
        }
    }

    public function AgregarObjetivoGeneral(Request $request)
    {
        try
        {
            $ObjObjetivoGeneral = new ObjetivosGenerales();
            $ObjObjetivoGeneral->Objetivo = $request->input('objetivo');

            if(ObjetivosGenerales::Agregar($ObjObjetivoGeneral))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se agregó correctamente el objetivo general";
                return redirect()->action('EmpresaController@Home');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo agregar el objetivo general";
                return redirect()->action('EmpresaController@Home');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar el objetivo general";
            return redirect()->action('EmpresaController@Home');
        }
    }

    public function EditarObjetivoGeneral(Request $request)
    {
        try
        {
            $ObjObjetivoGeneral = ObjetivosGenerales::ObtenerPorId($request->input('id'));
            $ObjObjetivoGeneral->Objetivo = $request->input('objetivo');

            if(ObjetivosGenerales::Editar($ObjObjetivoGeneral))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modificó correctamente el objetivo general";
                return redirect()->action('EmpresaController@Home');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo modificar el objetivo general";
                return redirect()->action('EmpresaController@Home');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar el objetivo general";
            return redirect()->action('EmpresaController@Home');
        }
    }

    public function EliminarObjetivoGeneral($ObjetivoId)
    {
        try
        {
            $ObjObjetivoGeneral = ObjetivosGenerales::ObtenerPorId($ObjetivoId);

            if(ObjetivosGenerales::Eliminar($ObjObjetivoGeneral))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se eliminó correctamente el objetivo general";
                return redirect()->action('EmpresaController@Home');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo eliminar el objetivo general";
                return redirect()->action('EmpresaController@Home');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo eliminar el objetivo general";
            return redirect()->action('EmpresaController@Home');
        }
    }

    public function AgregarObjetivoEspecifico(Request $request)
    {
        try
        {
            $ObjObjetivoEspecifico = new ObjetivosEspecificos();
            $ObjObjetivoEspecifico->ObjGeneral_Id = $request->input('objgeneral_id');
            $ObjObjetivoEspecifico->Tipo = $request->input('tipo');
            $ObjObjetivoEspecifico->Objetivo = $request->input('objetivo');
            
            if(ObjetivosEspecificos::Agregar($ObjObjetivoEspecifico))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se agregó correctamente el objetivo específico";
                return redirect()->action('EmpresaController@ObjetivoEspecifico', ['ObjetivoId' => $request->input('objgeneral_id')]);
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo agregar el objetivo específico";
                return redirect()->action('EmpresaController@ObjetivoEspecifico', ['ObjetivoId' => $request->input('objgeneral_id')]);
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar el objetivo específico";
            return redirect()->action('EmpresaController@ObjetivoEspecifico', ['ObjetivoId' => $request->input('objgeneral_id')]); 
        }
    }

    public function EditarObjetivoEspecifico(Request $request)
    {
        try
        {
            $ObjObjetivoEspecifico = ObjetivosEspecificos::ObtenerPorId($request->input('id'));
            $ObjObjetivoEspecifico->Tipo = $request->input('tipo');
            $ObjObjetivoEspecifico->Objetivo = $request->input('objetivo');

            if(ObjetivosEspecificos::Editar($ObjObjetivoEspecifico))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modificó correctamente el objetivo específico";
                return redirect()->action('EmpresaController@ObjetivoEspecifico', ['ObjetivoId' => $ObjObjetivoEspecifico->ObjGeneral_Id]);
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo modificar el objetivo específico";
                return redirect()->action('EmpresaController@ObjetivoEspecifico', ['ObjetivoId' => $ObjObjetivoEspecifico->ObjGeneral_Id]);
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar el objetivo específico";
            return redirect()->action('EmpresaController@ObjetivoEspecifico', ['ObjetivoId' => $ObjObjetivoEspecifico->ObjGeneral_Id]);
        }
    }

    public function EliminarObjetivoEspecifico($ObjetivoId)
    {
        try
        {
            $ObjObjetivoEspecifico = ObjetivosEspecificos::ObtenerPorId($ObjetivoId);

            if(ObjetivosEspecificos::Eliminar($ObjObjetivoEspecifico))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se eliminó correctamente el objetivo específico";
                return redirect()->action('EmpresaController@ObjetivoEspecifico', ['ObjetivoId' => $ObjObjetivoEspecifico->ObjGeneral_Id]);
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo eliminar el objetivo específico";
                return redirect()->action('EmpresaController@ObjetivoEspecifico', ['ObjetivoId' => $ObjObjetivoEspecifico->ObjGeneral_Id]);
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo eliminar el objetivo específico";
            return redirect()->action('EmpresaController@ObjetivoEspecifico', ['ObjetivoId' => $ObjObjetivoEspecifico->ObjGeneral_Id]);
        }
    }
}
?>