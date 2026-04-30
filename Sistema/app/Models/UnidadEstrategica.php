<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UnidadEstrategica extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'unidad_estrategica';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return UnidadEstrategica::all();
    }

    public static function Agregar(UnidadEstrategica $ObjUnidad)
    {
        if($ObjUnidad->save())
        {
            return $ObjUnidad->Id;
        }
        return 0;
    }

    public static function Editar(UnidadEstrategica $ObjUnidad)
    {
        if($ObjUnidad->update())
        {
            return $ObjUnidad->Id;
        }
        return 0;
    }

    public static function Eliminar(UnidadEstrategica $ObjUnidad)
    {
        return $ObjUnidad->delete();
    }

    public static function ObtenerPorId($UnidadId)
    {
        return UnidadEstrategica::find($UnidadId);
    }
}

?>