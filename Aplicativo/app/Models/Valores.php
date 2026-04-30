<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Valores extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'valores';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return Valores::all();
    }

    public static function Agregar(Valores $ObjValores)
    {
        if($ObjValores->save())
        {
            return $ObjValores->Id;
        }
        return 0;
    }

    public static function Editar(Valores $ObjValores)
    {
        if($ObjValores->update())
        {
            return $ObjValores->Id;
        }
        return 0;
    }

    public static function Eliminar(Valores $ObjValores)
    {
        return $ObjValores->delete();
    }

    public static function ObtenerPorId($ValorId)
    {
        return Valores::find($ValorId);
    }
}

?>