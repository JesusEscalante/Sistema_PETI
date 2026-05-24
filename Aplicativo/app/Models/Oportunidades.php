<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Oportunidades extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'oportunidades';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function ObtenerPorPlanId($PlanId)
    {
        return Oportunidades::from('oportunidades as o')
                ->select('o.*', 'u.Nombre', 'u.Apellido')
                ->join('usuario as u', 'u.Id', '=', 'o.UsuarioId')
                ->where('o.PlanId', $PlanId)
                ->get();
    }

    public static function ObtenerPorUsuarioIdPlanId($UsuarioId, $PlanId)
    {
        return Oportunidades::from('oportunidades as o')
                ->where('o.UsuarioId', $UsuarioId)
                ->where('o.PlanId', $PlanId)
                ->get();
    }

    public static function Agregar(Oportunidades $ObjOportunidades)
    {
        if($ObjOportunidades->save())
        {
            return $ObjOportunidades->Id;
        }
        return 0;
    }

    public static function Editar(Oportunidades $ObjOportunidades)
    {
        if($ObjOportunidades->update())
        {
            return $ObjOportunidades->Id;
        }
        return 0;
    }

    public static function Eliminar(Oportunidades $ObjOportunidades)
    {
        return $ObjOportunidades->delete();
    }

    public static function ObtenerPorId($OportunidadId)
    {
        return Oportunidades::find($OportunidadId);
    }
}

?>