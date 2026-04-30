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
    public function Identificacion(){
        $ObjFortalezas = Fortalezas::Listar();
        $ObjDebilidades = Debilidades::Listar();
        $ObjOportunidades = Oportunidades::Listar();
        $ObjAmenazas = Amenazas::Listar();

        $ObjFoda = Foda::Listar();

        // - FO ---
        foreach($ObjFortalezas as $Fortaleza)
        {
            foreach($ObjOportunidades as $Oportunidad)
            {
                if(Foda::ObtenerPorCodigo('F'. $Fortaleza->Id . 'O'. $Oportunidad->Id) == null)
                {
                    $ObjFoda = new Foda();
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
                if(Foda::ObtenerPorCodigo('F'. $Fortaleza->Id . 'A'. $Amenaza->Id) == null)
                {
                    $ObjFoda = new Foda();
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
                if(Foda::ObtenerPorCodigo('D'. $Debilidad->Id . 'O'. $Oportunidad->Id) == null)
                {
                    $ObjFoda = new Foda();
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
                if(Foda::ObtenerPorCodigo('D'. $Debilidad->Id . 'A'. $Amenaza->Id) == null)
                {
                    $ObjFoda = new Foda();
                    $ObjFoda->Tipo = 'DA';
                    $ObjFoda->Codigo = 'D'. $Debilidad->Id . 'A'. $Amenaza->Id;
                    $ObjFoda->Valor = '0';
                    Foda::Agregar($ObjFoda);
                }
            }
        }

        $ObjFoda = Foda::Listar();
        $ObjEstrategia = Estrategia::ObtenerPorId(1);

        return view('Estrategia.Identificacion',[
            'Fortalezas' => $ObjFortalezas,
            'Debilidades' => $ObjDebilidades,
            'Oportunidades' => $ObjOportunidades,
            'Amenazas' => $ObjAmenazas,
            'Foda' => $ObjFoda,
            'Estrategia' => $ObjEstrategia
        ]);
    }

    public function CalcularIdentificacion(Request $request){
        try
        {
            $ObjFortalezas = Fortalezas::Listar();
            $ObjDebilidades = Debilidades::Listar();
            $ObjOportunidades = Oportunidades::Listar();
            $ObjAmenazas = Amenazas::Listar();

            // - FO ---
            foreach($ObjFortalezas as $Fortaleza)
            {
                foreach($ObjOportunidades as $Oportunidad)
                {
                    if($ObjFoda = Foda::ObtenerPorCodigo('F'. $Fortaleza->Id . 'O'. $Oportunidad->Id))
                    {
                        $ObjFoda->Valor = $request->input('FO'. $Fortaleza->Id . $Oportunidad->Id);
                        Foda::Editar($ObjFoda);
                    }
                }
            }

            // - FA ---
            foreach($ObjFortalezas as $Fortaleza)
            {
                foreach($ObjAmenazas as $Amenaza)
                {
                    if($ObjFoda = Foda::ObtenerPorCodigo('F'. $Fortaleza->Id . 'A'. $Amenaza->Id))
                    {
                        $ObjFoda->Valor = $request->input('FA'. $Fortaleza->Id . $Amenaza->Id);
                        Foda::Editar($ObjFoda);
                    }
                }
            }

            // - DO ---
            foreach($ObjDebilidades as $Debilidad)
            {
                foreach($ObjOportunidades as $Oportunidad)
                {
                    if($ObjFoda = Foda::ObtenerPorCodigo('D'. $Debilidad->Id . 'O'. $Oportunidad->Id))
                    {
                        $ObjFoda->Valor = $request->input('DO'. $Debilidad->Id . $Oportunidad->Id);
                        Foda::Editar($ObjFoda);
                    }
                }
            }

            // - DA ---
            foreach($ObjDebilidades as $Debilidad)
            {
                foreach($ObjAmenazas as $Amenaza)
                {
                    if($ObjFoda = Foda::ObtenerPorCodigo('D'. $Debilidad->Id . 'A'. $Amenaza->Id))
                    {
                        $ObjFoda->Valor = $request->input('DA'. $Debilidad->Id . $Amenaza->Id);
                        Foda::Editar($ObjFoda);
                    }
                }
            }

            $ObjFoda = Foda::Listar();

            $SumaFO = 0;
            $SumaFA = 0;
            $SumaDO = 0;
            $SumaDA = 0;

            foreach($ObjFoda as $item)
            {
                switch($item->Tipo)
                {
                    case 'FO':
                        foreach($ObjFortalezas as $Fortaleza)
                        {
                            foreach($ObjOportunidades as $Oportunidad)
                            {
                                if($item->Codigo == 'F'. $Fortaleza->Id . 'O'. $Oportunidad->Id)
                                {
                                    $SumaFO += $item->Valor;
                                }
                            }
                        }
                        break;
                    case 'FA':
                        foreach($ObjFortalezas as $Fortaleza)
                        {
                            foreach($ObjAmenazas as $Amenaza)
                            {
                                if($item->Codigo == 'F'. $Fortaleza->Id . 'A'. $Amenaza->Id)
                                {
                                    $SumaFA += $item->Valor;
                                }
                            }
                        }
                        break;
                    case 'DO':
                        foreach($ObjDebilidades as $Debilidad)
                        {
                            foreach($ObjOportunidades as $Oportunidad)
                            {
                                if($item->Codigo == 'D'. $Debilidad->Id . 'O'. $Oportunidad->Id)
                                {
                                    $SumaDO += $item->Valor;
                                }
                            }
                        }
                        break;
                    case 'DA':
                        foreach($ObjDebilidades as $Debilidad)
                        {
                            foreach($ObjAmenazas as $Amenaza)
                            {
                                if($item->Codigo == 'D'. $Debilidad->Id . 'A'. $Amenaza->Id)
                                {
                                    $SumaDA += $item->Valor;
                                }
                            }
                        }
                        break;
                }
            }

            if($SumaFO == 0 && $SumaFA == 0 && $SumaDO == 0 && $SumaDA == 0)
            {
                $ObjEstrategia = Estrategia::ObtenerPorId(1);
                $ObjEstrategia->Estrategia = "NA";
                $ObjEstrategia->Tipo = "SA";
                $ObjEstrategia->Descripcion = "SA";
                Estrategia::Editar($ObjEstrategia);
                session_start();
                $_SESSION["ALERTA"] = "warning";
                $_SESSION["MENSAJE"] = "Debe ingresar al menos un valor para identificar la estrategia";
                return redirect()->action('EstrategiaController@Identificacion');
            }
            else
            {
                $valores = [
                    'FO' => $SumaFO,
                    'FA' => $SumaFA,
                    'DO' => $SumaDO,
                    'DA' => $SumaDA
                ];

                $Estrategia = array_keys($valores, max($valores))[0];

                $ObjEstrategia = Estrategia::ObtenerPorId(1);
                $ObjEstrategia->Estrategia = $Estrategia;
                switch($Estrategia)
                {
                    case 'FO':
                        $ObjEstrategia->Tipo = "ESTRATEGIA OFENSIVA";
                        $ObjEstrategia->Descripcion = "Deberá adoptar estrategias de crecimiento.";
                        break;
                    case 'FA':
                        $ObjEstrategia->Tipo = "ESTRATEGIA DEFENSIVA";
                        $ObjEstrategia->Descripcion = "La empresa está preparada para enfrentarse a las amenazas.";
                        break;
                    case 'DO':
                        $ObjEstrategia->Tipo = "ESTRATEGIA DE REORIENTACIÓN";
                        $ObjEstrategia->Descripcion = "La empresa no puede aprovechar las oportunidades porque carece de preparación adecuada.";
                        break;
                    case 'DA':
                        $ObjEstrategia->Tipo = "ESTRATEGIA DE SUPERVIVENCIA";
                        $ObjEstrategia->Descripcion = "Se enfrenta a amenazas externas sin las fortalezas necesarias para luchar con la competencia.";
                        break;
                }
                Estrategia::Editar($ObjEstrategia);

                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se identificó la estrategia correctamente";
                return redirect()->action('EstrategiaController@Identificacion');
            }            
        }
        catch(\Exception $e)
        {
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "Ocurrió un error al identificar la estrategia";
            return redirect()->action('EstrategiaController@Identificacion');
        }
    }
}
?>