<?php

namespace App\Http\Controllers;

// Importación de modelos necesarios
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlanEstrategico as PlanEstrategico;
use App\Models\Usuario as Usuario;
use App\Models\Colaborador as Colaborador;
use App\Models\Empresa as Empresa;
use App\Models\Valores as Valores;
use App\Models\UnidadEstrategica as UnidadEstrategica;
use App\Models\ObjetivosGenerales as ObjetivosGenerales;
use App\Models\ObjetivosEspecificos as ObjetivosEspecificos;
use App\Models\Fortalezas as Fortalezas;
use App\Models\Debilidades as Debilidades;
use App\Models\Oportunidades as Oportunidades;
use App\Models\Amenazas as Amenazas;
use App\Models\Estrategia as Estrategia;
use App\Models\Came as Came;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function PlanesEstrategicos(){
        $ObjPlanes = PlanEstrategico::ListarPorUsuario();
        $ObjPlanesColab = PlanEstrategico::ListarPorColaborador();
        $ObjUsuarios = Usuario::Listar();
        $ObjColaboradores = PlanEstrategico::ListarColaboradores();

        return view('Plan.Planes',[
            'Planes' => $ObjPlanes,
            'PlanesColab' => $ObjPlanesColab,
            'Usuarios' => $ObjUsuarios,
            'Colaboradores' => $ObjColaboradores
        ]);
    }

    public function AgregarPlan(){
        try{
            $ObjPlan = new PlanEstrategico();
            $ObjPlan->UsuarioId = auth()->user()->Id;

            if(PlanEstrategico::Agregar($ObjPlan))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se genero correctamente el plan estrategico";
                return redirect()->action('PlanController@PlanesEstrategicos');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo generar el plan estrategico";
                return redirect()->action('PlanController@PlanesEstrategicos');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo generar el plan estratégico";
            return redirect()->action('PlanController@PlanesEstrategicos');
        }
    }

    public function EliminarPlan($PlanId){
        try{
            $ObjPlan = PlanEstrategico::ObtenerPorId($PlanId);

            if(PlanEstrategico::Eliminar($ObjPlan))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se elimino correctamente el plan estrategico seleccionado";
                return redirect()->action('PlanController@PlanesEstrategicos');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo eliminar el plan estrategico seleccionado";
                return redirect()->action('PlanController@PlanesEstrategicos');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo eliminar el plan estratégico seleccionado";
            return redirect()->action('PlanController@PlanesEstrategicos');
        }
    }

    public function Detalle($PlanId){
        try{
            $ObjEmpresa = Empresa::ObtenerPorId(1);
            $ObjValores = Valores::Listar();
            $ObjUnidadesEstrategicas = UnidadEstrategica::Listar();
            $ObjObjetivosGenerales = ObjetivosGenerales::Listar();
            $ObjObjetivosEspecificos = ObjetivosEspecificos::Listar();
            $ObjFortalezas = Fortalezas::ObtenerPorPlanId($PlanId);
            $ObjDebilidades = Debilidades::ObtenerPorPlanId($PlanId);
            $ObjOportunidades = Oportunidades::ObtenerPorPlanId($PlanId);
            $ObjAmenazas = Amenazas::ObtenerPorPlanId($PlanId);

            $VALORES = "";
            foreach($ObjValores as $Valor){
                $VALORES .= "<li style='margin-left: 80px;'>" . $Valor->Valor . "</li>";
            }

            $UNIDADES_ESTRATÉGICAS = "";
            foreach($ObjUnidadesEstrategicas as $Unidad){
                $UNIDADES_ESTRATÉGICAS .= "<li style='margin-left: 80px;'>" . $Unidad->Unidad . "</li>";
            }

            $COUNT_OBJETIVOS = 0;
            $OBJETIVOS = "";
            foreach($ObjObjetivosGenerales as $ObjGeneral){
                $COUNT = 0;
                foreach($ObjObjetivosEspecificos as $ObjEspecifico){
                    if($ObjEspecifico->ObjGeneral_Id == $ObjGeneral->Id){
                        $COUNT++;
                        $COUNT_OBJETIVOS++;
                    }
                }
                $OBJETIVOS .= "<tr><th rowspan='" . ($COUNT + 1) . "'>" . $ObjGeneral->Objetivo . "</th></tr>";
                foreach($ObjObjetivosEspecificos as $ObjEspecifico){
                    if($ObjEspecifico->ObjGeneral_Id == $ObjGeneral->Id){
                        $OBJETIVOS .= "<tr><td>" . $ObjEspecifico->Objetivo . "</td></tr>";
                    }
                }
                $COUNT_OBJETIVOS++;
            }

            $FODA = "";
            $FODA .= "<tr><th rowspan='" . ($ObjFortalezas->count() + 1) . "' width='150px' style='text-align: center;'>FORTALEZAS</th></tr>";
            foreach($ObjFortalezas as $Obj){
                $FODA .= "<tr><td>" . $Obj->Fortaleza . "</td></tr>";
            }
            $FODA .= "<tr><th rowspan='" . ($ObjDebilidades->count() + 1) . "' width='150px' style='text-align: center;'>DEBILIDADES</th></tr>";
            foreach($ObjDebilidades as $Obj){
                $FODA .= "<tr><td>" . $Obj->Debilidad . "</td></tr>";
            }
            $FODA .= "<tr><th rowspan='" . ($ObjOportunidades->count() + 1) . "' width='150px' style='text-align: center;'>OPORTUNIDADES</th></tr>";
            foreach($ObjOportunidades as $Obj){
                $FODA .= "<tr><td>" . $Obj->Oportunidad . "</td></tr>";
            }
            $FODA .= "<tr><th rowspan='" . ($ObjAmenazas->count() + 1) . "' width='150px' style='text-align: center;'>AMENAZAS</th></tr>";
            foreach($ObjAmenazas as $Obj){
                $FODA .= "<tr><td>" . $Obj->Amenaza . "</td></tr>";
            }

            $ACCIONES = "";
            $contAcc = 0;

            $ACCIONES .= "<tr><th colspan='2'>CORREGIR DEBILIDADES</th></tr>";
            foreach($ObjDebilidades as $Item){
                $contAcc++;
                $ACCIONES .= "<tr><td style='text-align: center;'>" . $contAcc . "</td><td>" . $Item->Accion . "</td></tr>";
            }
            $ACCIONES .= "<tr><th colspan='2'>AFRONTAR AMENAZAS</th></tr>";
            foreach($ObjAmenazas as $Item){
                $contAcc++;
                $ACCIONES .= "<tr><td style='text-align: center;'>" . $contAcc . "</td><td>" . $Item->Accion . "</td></tr>";
            }
            $ACCIONES .= "<tr><th colspan='2'>MANTENER FORTALEZAS</th></tr>";
            foreach($ObjFortalezas as $Item){
                $contAcc++;
                $ACCIONES .= "<tr><td style='text-align: center;'>" . $contAcc . "</td><td>" . $Item->Accion . "</td></tr>";
            }
            $ACCIONES .= "<tr><th colspan='2'>EXPLORAR OPORTUNIDADES</th></tr>";
            foreach($ObjOportunidades as $Item){
                $contAcc++;
                $ACCIONES .= "<tr><td style='text-align: center;'>" . $contAcc . "</td><td>" . $Item->Accion . "</td></tr>";
            }

            if(Estrategia::ObtenerPorPlanId($PlanId)) {
                $ObjEstrategia = Estrategia::ObtenerPorPlanId($PlanId);
            } else {
                $ObjEstrategia = new Estrategia();
                $ObjEstrategia->RelacionEstrategia = "Estrategia NO Identificada";
                $ObjEstrategia->Tipo = "Estrategia NO Identificada";
                $ObjEstrategia->Descripcion = "Estrategia NO Identificada";
            }

            $ObjPlan = PlanEstrategico::ObtenerPorId($PlanId);
            $ObjPropietario = Usuario::ObtenerPorId($ObjPlan->UsuarioId);
            $ObjColaboradores = PlanEstrategico::ObtenerColaboradoresPorPlanId($PlanId);

            $COLABORADORES = "<li style='margin-left: 80px;'>" . $ObjPropietario->Nombre . " " . $ObjPropietario->Apellido . "</li>";

            foreach($ObjColaboradores as $Item){
                $COLABORADORES .= "<li style='margin-left: 80px;'>" . $Item->Nombre . " " . $Item->Apellido . "</li>";
            }

            // START CONTENT ----
            $CONTENIDO ="<p>&nbsp;</p>".
                        "<h5 style='text-align: center;'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5>".
                        "<p>&nbsp;</p>".
                        "<h6 style='padding-left: 40px;'>Empresa:  " . $ObjEmpresa->Nombre . "</h6>".
                        "<p>&nbsp;</p>".
                        "<h6 style='padding-left: 40px;'>Fecha de elaboración: " . date('d/m/Y h:i:s', strtotime($ObjPlan->Fecha)) . "</h6>".
                        "<p>&nbsp;</p>".
                        "<h6 style='padding-left: 40px;'>Emprendedores / Promotores:</h6>".
                        "<ul>".
                        $COLABORADORES .
                        "</ul>".
                        "<p>&nbsp;</p>".
                        "<h6 style='padding-left: 40px;'>MISIÓN:</h6>".
                        "<h6 style='padding-left: 80px; width: calc(100% - 40px);'>" . $ObjEmpresa->Mision . "</h6>".
                        "<p>&nbsp;</p>".
                        "<h6 style='padding-left: 40px;'>VISIÓN:</h6>".
                        "<h6 style='padding-left: 80px; width: calc(100% - 40px);'>" . $ObjEmpresa->Vision . "</h6>".
                        "<p>&nbsp;</p>".
                        "<h6 style='padding-left: 40px;'>VALORES:</h6>".
                        "<ul>".
                        $VALORES .
                        "</ul>".
                        "<p>&nbsp;</p>".
                        "<h6 style='padding-left: 40px;'>UNIDADES ESTRATÉGICAS:</h6>".
                        "<ul>".
                        $UNIDADES_ESTRATÉGICAS .
                        "</ul>".
                        "<p>&nbsp;</p>".
                        "<h6 style='padding-left: 40px;'>OBJETIVOS ESTRATÉGICOS:</h6>".
                        "<table style='margin-left: 40px; width: calc(100% - 80px); border-collapse: collapse;' border='1'>".
                        "<thead>".
                        "<tr>".
                        "<th style='text-align: center;'>MISIÓN</th>".
                        "<th style='text-align: center;'>OBJETIVOS GENERALES O ESTRATÉGICOS</th>".
                        "<th style='text-align: center;'>OBJETIVOS ESPECÍFICOS</th>".
                        "</tr>".
                        "</thead>".
                        "<tbody>".
                        "<tr>".
                        "<th rowspan='" . ($COUNT_OBJETIVOS + 1) . "'>" . $ObjEmpresa->Mision . "</th>".
                        "</tr>".
                        $OBJETIVOS .
                        "</tbody>".
                        "</table>".
                        "<p>&nbsp;</p>".
                        "<h6 style='padding-left: 40px;'> ANÁLISIS FODA:</h6>".
                        "<table style='margin-left: 40px; width: calc(100% - 80px); border-collapse: collapse;' border='1'>".
                        "<tbody>".
                        $FODA .
                        "</tbody>".
                        "</table>".
                        "<p>&nbsp;</p>".
                        "<h6 style='padding-left: 40px;'>IDENTIFICACIÓN DE ESTRATEGIA:</h6>".
                        "<ul style='padding-left: 80px;'>".
                        "<li><strong>Relacion:</strong> " . $ObjEstrategia->RelacionEstrategia . "</li>".
                        "<li><strong>Tipo:</strong> " . $ObjEstrategia->Tipo . "</li>".
                        "<li><strong>Descripción:</strong> " . $ObjEstrategia->Descripcion . "</li>".
                        "</ul>".
                        "<p>&nbsp;</p>".
                        "<h6 style='padding-left: 40px;'>ACCIONES COMPETITIVAS:</h6>".
                        "<table style='margin-left: 40px; width: calc(100% - 80px); border-collapse: collapse;' border='1'>".
                        "<thead>".
                        "<tr>".
                        "<th style='text-align: center; width: 80px;'>N°</th>".
                        "<th style='text-align: center;'>ACCION</th>".
                        "</tr>".
                        "</thead>".
                        "<tbody>".
                        $ACCIONES .
                        "</tbody>".
                        "</table>".
                        "<p>&nbsp;</p>".
                        "<h6 style='padding-left: 40px;'>CONCLUSIONES:</h6>";

            // END CONTENT ----
            
            $ObjPlan->Contenido = $CONTENIDO;

            PlanEstrategico::Editar($ObjPlan);
            
            return view('Plan.Detalle',[
                'Plan' => $ObjPlan
            ]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo cargar el detalle del plan estratégico";
            return redirect()->action('PlanController@PlanesEstrategicos');
        }
    }

    public function GuardarConclucion(Request $request){
        try
        {
            $Id = $request->input('id');
            $ObjPlan = PlanEstrategico::ObtenerPorId($Id);
            $ObjPlan->Conclucion = $request->input('conclucion');

            if(PlanEstrategico::Editar($ObjPlan))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se guardo correctamente los cambios";
                return redirect()->action('PlanController@Detalle', ['PlanId' => $Id]);
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo guardar los cambios";
                return redirect()->action('PlanController@Detalle', ['PlanId' => $Id]);
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo guardar los cambios";
            return redirect()->action('PlanController@Detalle', ['PlanId' => $Id]);
        }
    }

    public function AgregarColaborador(Request $request){
        try
        {
            if(Colaborador::ObtenerPorPlanIdUsuarioId($request->input('planid'), $request->input('usuarioid'))) {
                session_start();
                $_SESSION["ALERTA"] = "warning";
                $_SESSION["MENSAJE"] = "El Colaborador seleccionado ya pertenece al Plan Estrategico";
                return redirect()->action('PlanController@PlanesEstrategicos');
            } else {
                $ObjColaborador = new Colaborador();
                $ObjColaborador->PlanId = $request->input('planid');
                $ObjColaborador->UsuarioId = $request->input('usuarioid');

                if(Colaborador::Agregar($ObjColaborador))
                {
                    session_start();
                    $_SESSION["ALERTA"] = "success";
                    $_SESSION["MENSAJE"] = "Se agrego correctamente el Colaborador";
                    return redirect()->action('PlanController@PlanesEstrategicos');
                }else{
                    session_start();
                    $_SESSION["ALERTA"] = "error";
                    $_SESSION["MENSAJE"] = "No se pudo agregar al Colaborador";
                    return redirect()->action('PlanController@PlanesEstrategicos');
                }
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar al Colaborador";
            return redirect()->action('PlanController@PlanesEstrategicos');
        }
    }

    public function EliminarColaborador($ColaboradorId){
        try
        {
            $ObjColaborador = Colaborador::ObtenerPorId($ColaboradorId);

            if(Colaborador::Eliminar($ObjColaborador))
            {
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se elimino correctamente al Colaborador seleccionado";
                return redirect()->action('PlanController@PlanesEstrategicos');
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "No se pudo eliminar al Colaborador seleccionado";
                return redirect()->action('PlanController@PlanesEstrategicos');
            }
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo eliminar al Colaborador seleccionado";
            return redirect()->action('PlanController@PlanesEstrategicos');
        }
    }
}
?>