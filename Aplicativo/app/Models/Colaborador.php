<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Colaborador extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'colaboradores';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return Colaborador::all();
    }

    public static function Agregar(Colaborador $ObjColaborador)
    {
        if($ObjColaborador->save())
        {
            return $ObjColaborador->Id;
        }
        return 0;
    }

    public static function Editar(Colaborador $ObjColaborador)
    {
        if($ObjColaborador->update())
        {
            return $ObjColaborador->Id;
        }
        return 0;
    }

    public static function Eliminar(Colaborador $ObjColaborador)
    {
        return $ObjColaborador->delete();
    }

    public static function ObtenerPorId($ColaboradorId)
    {
        return Colaborador::find($ColaboradorId);
    }

    public static function ObtenerPorPlanIdUsuarioId($PlanId, $UsuarioId)
    {
        return Colaborador::where('PlanId', '=', $PlanId)
                ->where('UsuarioId', '=', $UsuarioId)
                ->first();
    }
}

?>