<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pest extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'pest';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return Pest::all();
    }

    public static function Agregar(Pest $ObjPest)
    {
        if($ObjPest->save())
        {
            return $ObjPest->Id;
        }
        return 0;
    }

    public static function Editar(Pest $ObjPest)
    {
        if($ObjPest->update())
        {
            return $ObjPest->Id;
        }
        return 0;
    }

    public static function Eliminar(Pest $ObjPest)
    {
        return $ObjPest->delete();
    }

    public static function ObtenerPorId($PestId)
    {
        return Pest::find($PestId);
    }
}

?>