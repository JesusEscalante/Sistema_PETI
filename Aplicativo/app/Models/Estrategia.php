<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Estrategia extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'estrategia_plan';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return Estrategia::all();
    }

    public static function Agregar(Estrategia $ObjEstrategia)
    {
        if($ObjEstrategia->save())
        {
            return $ObjEstrategia->Id;
        }
        return 0;
    }

    public static function Editar(Estrategia $ObjEstrategia)
    {
        if($ObjEstrategia->update())
        {
            return $ObjEstrategia->Id;
        }
        return 0;
    }

    public static function Eliminar(Estrategia $ObjEstrategia)
    {
        return $ObjEstrategia->delete();
    }

    public static function ObtenerPorId($EstrategiaId)
    {
        return Estrategia::find($EstrategiaId);
    }

    public static function ObtenerPorPlanId($PlanId)
    {
        return Estrategia::from('estrategia_plan as ep')
                ->select('ep.Id', 'ep.PlanId', 'ep.RelacionEstrategia', 'de.Tipo', 'de.Descripcion')
                ->join('detalle_estrategia as de', 'de.Relacion', '=', 'ep.RelacionEstrategia')
                ->where('ep.PlanId', $PlanId)
                ->first();
    }
}

?>