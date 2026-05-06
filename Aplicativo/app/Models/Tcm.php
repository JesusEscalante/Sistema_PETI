<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tcm extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'tcm';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return Tcm::all();
    }

    public static function ListarSUMA()
    {
        return Tcm::select('ProductoId', \DB::raw('SUM(Valor) as total_valor'))
              ->groupBy('ProductoId')
              ->get();
    }

    public static function Agregar(Tcm $ObjTCM)
    {
        if($ObjTCM->save())
        {
            return $ObjTCM->Id;
        }
        return 0;
    }

    public static function Editar(Tcm $ObjTCM)
    {
        if($ObjTCM->update())
        {
            return $ObjTCM->Id;
        }
        return 0;
    }

    public static function Eliminar(Tcm $ObjTCM)
    {
        return $ObjTCM->delete();
    }

    public static function ObtenerPorId($TcmId)
    {
        return Tcm::find($TcmId);
    }

    public static function ObtenerPorPeriodoProducto($Periodo, $ProductoId)
    {
        return Tcm::where('Periodo', $Periodo)
               ->where('ProductoId', $ProductoId)
               ->first();
    }
}

?>