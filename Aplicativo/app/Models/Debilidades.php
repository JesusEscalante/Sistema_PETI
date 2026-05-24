<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Debilidades extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'debilidades';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function ObtenerPorPlanId($PlanId)
    {
        return Debilidades::from('debilidades as d')
                ->select('d.*', 'u.Nombre', 'u.Apellido')
                ->join('usuario as u', 'u.Id', '=', 'd.UsuarioId')
                ->where('d.PlanId', $PlanId)
                ->get();
    }

    public static function ObtenerPorUsuarioIdPlanId($UsuarioId, $PlanId)
    {
        return Debilidades::from('debilidades as d')
                ->where('d.UsuarioId', $UsuarioId)
                ->where('d.PlanId', $PlanId)
                ->get();
    }

    public static function Agregar(Debilidades $ObjDebilidades)
    {
        if($ObjDebilidades->save())
        {
            return $ObjDebilidades->Id;
        }
        return 0;
    }

    public static function Editar(Debilidades $ObjDebilidades)
    {
        if($ObjDebilidades->update())
        {
            return $ObjDebilidades->Id;
        }
        return 0;
    }

    public static function Eliminar(Debilidades $ObjDebilidades)
    {
        return $ObjDebilidades->delete();
    }

    public static function ObtenerPorId($DebilidadId)
    {
        return Debilidades::find($DebilidadId);
    }
}

?>