<?php

namespace App\Http\Controllers;

// Importación de modelos necesarios
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fortalezas as Fortalezas;
use App\Models\Debilidades as Debilidades;
use App\Models\Oportunidades as Oportunidades;
use App\Models\Amenazas as Amenazas;
use App\Models\Foda as Foda;
use App\Models\Estrategia as Estrategia;
use Illuminate\Support\Facades\Auth;

class EstrategiaController extends Controller
{
    public function Identificacion($PlanId){
        $ObjFortalezas = Fortalezas::ObtenerPorPlanId($PlanId);
        $ObjDebilidades = Debilidades::ObtenerPorPlanId($PlanId);
        $ObjOportunidades = Oportunidades::ObtenerPorPlanId($PlanId);
        $ObjAmenazas = Amenazas::ObtenerPorPlanId($PlanId);

        $ObjFoda = Foda::ObtenerPorPlanId($PlanId);

        // - FO ---
        foreach($ObjFortalezas as $Fortaleza){
            foreach($ObjOportunidades as $Oportunidad){
                if(Foda::ObtenerPorCodigo('F'. $Fortaleza->Id . 'O'. $Oportunidad->Id, $PlanId) == null){
                    $ObjFoda = new Foda();
                    $ObjFoda->PlanId = $PlanId;
                    $ObjFoda->Tipo = 'FO';
                    $ObjFoda->Codigo = 'F'. $Fortaleza->Id . 'O'. $Oportunidad->Id;
                    $ObjFoda->Valor = '0';
                    Foda::Agregar($ObjFoda);
                }
            }
        }

        // - FA ---
        foreach($ObjFortalezas as $Fortaleza)
        {
            foreach($ObjAmenazas as $Amenaza)
            {
                if(Foda::ObtenerPorCodigo('F'. $Fortaleza->Id . 'A'. $Amenaza->Id, $PlanId) == null)
                {
                    $ObjFoda = new Foda();
                    $ObjFoda->PlanId = $PlanId;
                    $ObjFoda->Tipo = 'FA';
                    $ObjFoda->Codigo = 'F'. $Fortaleza->Id . 'A'. $Amenaza->Id;
                    $ObjFoda->Valor = '0';
                    Foda::Agregar($ObjFoda);
                }
            }
        }

        // - DO ---
        foreach($ObjDebilidades as $Debilidad)
        {
            foreach($ObjOportunidades as $Oportunidad)
            {
                if(Foda::ObtenerPorCodigo('D'. $Debilidad->Id . 'O'. $Oportunidad->Id, $PlanId) == null)
                {
                    $ObjFoda = new Foda();
                    $ObjFoda->PlanId = $PlanId;
                    $ObjFoda->Tipo = 'DO';
                    $ObjFoda->Codigo = 'D'. $Debilidad->Id . 'O'. $Oportunidad->Id;
                    $ObjFoda->Valor = '0';
                    Foda::Agregar($ObjFoda);
                }
            }
        }

        // - DA ---
        foreach($ObjDebilidades as $Debilidad)
        {
            foreach($ObjAmenazas as $Amenaza)
            {
                if(Foda::ObtenerPorCodigo('D'. $Debilidad->Id . 'A'. $Amenaza->Id, $PlanId) == null)
                {
                    $ObjFoda = new Foda();
                    $ObjFoda->PlanId = $PlanId;
                    $ObjFoda->Tipo = 'DA';
                    $ObjFoda->Codigo = 'D'. $Debilidad->Id . 'A'. $Amenaza->Id;
                    $ObjFoda->Valor = '0';
                    Foda::Agregar($ObjFoda);
                }
            }
        }

        $ObjFoda = Foda::ObtenerPorPlanId($PlanId);
        if(Estrategia::ObtenerPorPlanId($PlanId)) {
            $ObjEstrategia = Estrategia::ObtenerPorPlanId($PlanId);
        } else {
            $ObjEstrategia = new Estrategia();
            $ObjEstrategia->PlanId = $PlanId;
            $ObjEstrategia->RelacionEstrategia = "SE";
        }

        return view('Estrategia.Identificacion',[
            'Fortalezas' => $ObjFortalezas,
            'Debilidades' => $ObjDebilidades,
            'Oportunidades' => $ObjOportunidades,
            'Amenazas' => $ObjAmenazas,
            'Foda' => $ObjFoda,
            'Estrategia' => $ObjEstrategia,
            'PlanId' => $PlanId
        ]);
    }

    public function CalcularIdentificacion(Request $request){
        try
        {
            $PlanId = $request->input('planid');
            $ObjFortalezas = Fortalezas::ObtenerPorPlanId($PlanId);
            $ObjDebilidades = Debilidades::ObtenerPorPlanId($PlanId);
            $ObjOportunidades = Oportunidades::ObtenerPorPlanId($PlanId);
            $ObjAmenazas = Amenazas::ObtenerPorPlanId($PlanId);
            // - FO ---
            foreach($ObjFortalezas as $Fortaleza){
                foreach($ObjOportunidades as $Oportunidad){
                    if($ObjFoda = Foda::ObtenerPorCodigo('F'. $Fortaleza->Id . 'O'. $Oportunidad->Id, $PlanId)){
                        $ObjFoda->Valor = $request->input('FO'. $Fortaleza->Id . $Oportunidad->Id);
                        Foda::Editar($ObjFoda);
                    }
                }
            }

            // - FA ---
            foreach($ObjFortalezas as $Fortaleza){
                foreach($ObjAmenazas as $Amenaza){
                    if($ObjFoda = Foda::ObtenerPorCodigo('F'. $Fortaleza->Id . 'A'. $Amenaza->Id, $PlanId)){
                        $ObjFoda->Valor = $request->input('FA'. $Fortaleza->Id . $Amenaza->Id);
                        Foda::Editar($ObjFoda);
                    }
                }
            }

            // - DO ---
            foreach($ObjDebilidades as $Debilidad){
                foreach($ObjOportunidades as $Oportunidad){
                    if($ObjFoda = Foda::ObtenerPorCodigo('D'. $Debilidad->Id . 'O'. $Oportunidad->Id, $PlanId)){
                        $ObjFoda->Valor = $request->input('DO'. $Debilidad->Id . $Oportunidad->Id);
                        Foda::Editar($ObjFoda);
                    }
                }
            }

            // - DA ---
            foreach($ObjDebilidades as $Debilidad){
                foreach($ObjAmenazas as $Amenaza){
                    if($ObjFoda = Foda::ObtenerPorCodigo('D'. $Debilidad->Id . 'A'. $Amenaza->Id, $PlanId)){
                        $ObjFoda->Valor = $request->input('DA'. $Debilidad->Id . $Amenaza->Id);
                        Foda::Editar($ObjFoda);
                    }
                }
            }

            $ObjFoda = Foda::ObtenerPorPlanId($PlanId);

            $SumaFO = 0;
            $SumaFA = 0;
            $SumaDO = 0;
            $SumaDA = 0;

            foreach($ObjFoda as $item){
                switch($item->Tipo){
                    case 'FO':
                        foreach($ObjFortalezas as $Fortaleza){
                            foreach($ObjOportunidades as $Oportunidad){
                                if($item->Codigo == 'F'. $Fortaleza->Id . 'O'. $Oportunidad->Id){
                                    $SumaFO += $item->Valor;
                                }
                            }
                        }
                        break;
                    case 'FA':
                        foreach($ObjFortalezas as $Fortaleza){
                            foreach($ObjAmenazas as $Amenaza){
                                if($item->Codigo == 'F'. $Fortaleza->Id . 'A'. $Amenaza->Id){
                                    $SumaFA += $item->Valor;
                                }
                            }
                        }
                        break;
                    case 'DO':
                        foreach($ObjDebilidades as $Debilidad){
                            foreach($ObjOportunidades as $Oportunidad){
                                if($item->Codigo == 'D'. $Debilidad->Id . 'O'. $Oportunidad->Id){
                                    $SumaDO += $item->Valor;
                                }
                            }
                        }
                        break;
                    case 'DA':
                        foreach($ObjDebilidades as $Debilidad){
                            foreach($ObjAmenazas as $Amenaza){
                                if($item->Codigo == 'D'. $Debilidad->Id . 'A'. $Amenaza->Id){
                                    $SumaDA += $item->Valor;
                                }
                            }
                        }
                        break;
                }
            }

            if($SumaFO == 0 && $SumaFA == 0 && $SumaDO == 0 && $SumaDA == 0){
                session_start();
                $_SESSION["ALERTA"] = "warning";
                $_SESSION["MENSAJE"] = "Debe ingresar al menos un valor para identificar la estrategia";
                return redirect()->action('EstrategiaController@Identificacion', ['PlanId' => $request->input('planid')]);
            } else {
                $valores = [
                    'FO' => $SumaFO,
                    'FA' => $SumaFA,
                    'DO' => $SumaDO,
                    'DA' => $SumaDA
                ];

                $Estrategia = array_keys($valores, max($valores))[0];

                if($ObjEstrategia = Estrategia::ObtenerPorPlanId($request->input('planid'))){
                    $ObjEstrategia->RelacionEstrategia = $Estrategia;
                    Estrategia::Editar($ObjEstrategia);
                } else {
                    $ObjEstrategia = new Estrategia();
                    $ObjEstrategia->PlanId = $request->input('planid');
                    $ObjEstrategia->RelacionEstrategia = $Estrategia;
                    Estrategia::Agregar($ObjEstrategia);
                }
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se identificó la estrategia correctamente";
                return redirect()->action('EstrategiaController@Identificacion', ['PlanId' => $request->input('planid')]);
            }            
        }
        catch(\Exception $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "Ocurrió un error al identificar la estrategia";
            return redirect()->action('EstrategiaController@Identificacion', ['PlanId' => $request->input('planid')]);
        }
    }
}
?>