<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ObjetivosGenerales extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'objetivo_general';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return ObjetivosGenerales::all();
    }

    public static function Agregar(ObjetivosGenerales $ObjObjetivosGenerales)
    {
        if($ObjObjetivosGenerales->save())
        {
            return $ObjObjetivosGenerales->Id;
        }
        return 0;
    }

    public static function Editar(ObjetivosGenerales $ObjObjetivosGenerales)
    {
        if($ObjObjetivosGenerales->update())
        {
            return $ObjObjetivosGenerales->Id;
        }
        return 0;
    }

    public static function Eliminar(ObjetivosGenerales $ObjObjetivosGenerales)
    {
        return $ObjObjetivosGenerales->delete();
    }

    public static function ObtenerPorId($ValorId)
    {
        return ObjetivosGenerales::find($ValorId);
    }
}

?>