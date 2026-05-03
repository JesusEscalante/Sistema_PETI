<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PlanEstrategico extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'plan_estrategico';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return PlanEstrategico::all();
    }

    public static function Agregar(PlanEstrategico $ObjPlan)
    {
        if($ObjPlan->save())
        {
            return $ObjPlan->Id;
        }
        return 0;
    }

    public static function Editar(PlanEstrategico $ObjPlan)
    {
        if($ObjPlan->update())
        {
            return $ObjPlan->Id;
        }
        return 0;
    }

    public static function Eliminar(PlanEstrategico $ObjPlan)
    {
        return $ObjPlan->delete();
    }

    public static function ObtenerPorId($PlanId)
    {
        return PlanEstrategico::find($PlanId);
    }
}

?>