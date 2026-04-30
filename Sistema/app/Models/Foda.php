<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Foda extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'foda';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return Foda::all();
    }

    public static function Agregar(Foda $ObjFoda)
    {
        if($ObjFoda->save())
        {
            return $ObjFoda->Id;
        }
        return 0;
    }

    public static function Editar(Foda $ObjFoda)
    {
        if($ObjFoda->update())
        {
            return $ObjFoda->Id;
        }
        return 0;
    }

    public static function Eliminar(Foda $ObjFoda)
    {
        return $ObjFoda->delete();
    }

    public static function ObtenerPorId($FodaId)
    {
        return Foda::find($FodaId);
    }

    public static function ObtenerPorCodigo($Codigo)
    {
        return Foda::where('Codigo', $Codigo)->first();
    }
}

?>