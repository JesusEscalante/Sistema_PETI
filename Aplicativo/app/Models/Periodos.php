<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Periodos extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'periodos';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return Periodos::orderBy('Periodo', 'asc')->get();
    }

    public static function ObtenerPorUsuarioIdPlanId($UsuarioId, $PlanId)
    {
        return Periodos::from('periodos as p')
                ->where('p.UsuarioId', $UsuarioId)
                ->where('p.PlanId', $PlanId)
                ->get();
    }

    public static function Modificar($Desde, $Hasta, $UsuarioId, $PlanId)
    {
        try {
            // 1. Eliminar períodos fuera del rango para este Plan y Usuario específicos
            Periodos::where('PlanId', $PlanId)
                ->where('Usuarioid', $UsuarioId)
                ->where(function($query) use ($Desde, $Hasta) {
                    $query->where('Periodo', '<', $Desde)
                        ->orWhere('Periodo', '>', $Hasta);
                })
                ->delete();
            
            // 2. Generar años del rango
            $añosRequeridos = range($Desde, $Hasta);
            
            // 3. Obtener años existentes (solo dentro del rango y del Plan/Usuario)
            $añosExistentes = Periodos::where('PlanId', $PlanId)
                ->where('Usuarioid', $UsuarioId)
                ->whereBetween('Periodo', [$Desde, $Hasta])
                ->pluck('Periodo')
                ->toArray();
            
            // 4. Insertar faltantes
            $añosFaltantes = array_diff($añosRequeridos, $añosExistentes);
            
            if (!empty($añosFaltantes)) {
                $datosInsertar = array_map(function($anio) use ($PlanId, $UsuarioId) {
                    return [
                        'Periodo' => $anio,
                        'PlanId' => $PlanId,
                        'Usuarioid' => $UsuarioId
                    ];
                }, $añosFaltantes);
                
                Periodos::insert($datosInsertar);
            }
            
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public static function Eliminar(Periodos $ObjPeriodo)
    {
        return $ObjPeriodo->delete();
    }

    public static function ObtenerPorId($PeriodoId)
    {
        return Periodos::find($PeriodoId);
    }

    public static function ObtenerPorPeriodo($Periodo)
    {
        return Periodos::where('Periodo', $Periodo)->first();
    }
}

?>