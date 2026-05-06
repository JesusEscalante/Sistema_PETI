<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Edgs extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'edgs';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return Edgs::all();
    }

    public static function Agregar(Edgs $ObjEDGS)
    {
        if($ObjEDGS->save())
        {
            return $ObjEDGS->Id;
        }
        return 0;
    }

    public static function Editar(Edgs $ObjEDGS)
    {
        if($ObjEDGS->update())
        {
            return $ObjEDGS->Id;
        }
        return 0;
    }

    public static function Eliminar(Edgs $ObjEDGS)
    {
        return $ObjEDGS->delete();
    }

    public static function ObtenerPorId($EdgsId)
    {
        return Tcm::find($EdgsId);
    }

    public static function ObtenerPorPeriodoProducto($Periodo, $ProductoId)
    {
        return Edgs::where('Periodo', $Periodo)
               ->where('ProductoId', $ProductoId)
               ->first();
    }
}

?>