<?php

namespace App\Http\Controllers;

// Importación de modelos necesarios
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function Detalle(){
        $ObjEmpresa = Empresa::ObtenerPorId(1);
        $ObjValores = Valores::Listar();
        $ObjUnidadesEstrategicas = UnidadEstrategica::Listar();
        $ObjObjetivosGenerales = ObjetivosGenerales::Listar();
        $ObjObjetivosEspecificos = ObjetivosEspecificos::Listar();
        $ObjFortalezas = Fortalezas::Listar();
        $ObjDebilidades = Debilidades::Listar();
        $ObjOportunidades = Oportunidades::Listar();
        $ObjAmenazas = Amenazas::Listar();
        $ObjEstrategia = Estrategia::ObtenerPorId(1);

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

        $CONTENIDO ="<p>&nbsp;</p>".
                    "<h5 style='text-align: center;'>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</h5>".
                    "<p>&nbsp;</p>".
                    "<h6 style='padding-left: 40px;'>Nombre de la Empresa: " . $ObjEmpresa->Nombre . "</h6>".
                    "<p>&nbsp;</p>".
                    "<h6 style='padding-left: 40px;'>Fecha de elaboración: " . Date('d/m/Y') . "</h6>".
                    "<p>&nbsp;</p>".
                    "<h6 style='padding-left: 40px;'>Emprendedores / Promotores: " . auth()->user()->Nombre . " " . auth()->user()->Apellido . "</h6>".
                    "<p>&nbsp;</p>".
                    "<h6 style='padding-left: 40px;'>MISIÓN:</h6>".
                    "<h6 style='padding-left: 80px;'>" . $ObjEmpresa->Mision . "</h6>".
                    "<p>&nbsp;</p>".
                    "<h6 style='padding-left: 40px;'>VISIÓN:</h6>".
                    "<h6 style='padding-left: 80px;'>" . $ObjEmpresa->Vision . "</h6>".
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
                    "<table style='width: 100%; max-width: 1050px; border-collapse: collapse;' border='1'>".
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
                    "<table style='width: 100%; max-width: 1050px; border-collapse: collapse;' border='1'>".
                    "<tbody>".
                    $FODA .
                    "</tbody>".
                    "</table>".
                    "<p>&nbsp;</p>".
                    "<h6 style='padding-left: 40px;'>IDENTIFICACIÓN DE ESTRATEGIA:</h6>".
                    "<ul style='padding-left: 80px;'>".
                    "<li><strong>Relacion:</strong> " . $ObjEstrategia->Estrategia . "</li>".
                    "<li><strong>Tipo:</strong> " . $ObjEstrategia->Tipo . "</li>".
                    "<li><strong>Descripción:</strong> " . $ObjEstrategia->Descripcion . "</li>".
                    "</ul>".
                    "<p>&nbsp;</p>".
                    "<h6 style='padding-left: 40px;'>ACCIONES COMPETITIVAS:</h6>".
                    "<p>&nbsp;</p>".
                    "<h6 style='padding-left: 40px;'>CONCLUSIONES:</h6>".
                    "<textarea style='margin-left: 40px;width: 90%; max-width: 1050px;'></textarea>";

        return view('Plan.Detalle',[
            'Fortalezas' => $ObjFortalezas,
            'Debilidades' => $ObjDebilidades,
            'Oportunidades' => $ObjOportunidades,
            'Amenazas' => $ObjAmenazas,
            'Contenido' => $CONTENIDO
        ]);
    }
}
?>