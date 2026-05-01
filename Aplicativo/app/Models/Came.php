<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Came extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'came';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return Came::all();
    }

    public static function Agregar(Came $ObjCame)
    {
        if($ObjCame->save())
        {
            return $ObjCame->Id;
        }
        return 0;
    }

    public static function Editar(Came $ObjCame)
    {
        if($ObjCame->update())
        {
            return $ObjCame->Id;
        }
        return 0;
    }

    public static function Eliminar(Came $ObjCame)
    {
        return $ObjCame->delete();
    }

    public static function ObtenerPorId($CameId)
    {
        return Came::find($CameId);
    }

    public static function ObtenerPorTipo($Tipo)
    {
        return Came::where('Tipo', $Tipo)->first();
    }
}

?>