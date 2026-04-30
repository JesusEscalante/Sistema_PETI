<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CadenaValor extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'cadena_valor';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return CadenaValor::all();
    }

    public static function Editar(CadenaValor $ObjCadenaValor)
    {
        if($ObjCadenaValor->update())
        {
            return $ObjCadenaValor->Id;
        }
        return 0;
    }

    public static function ObtenerPorId($CadenaValorId)
    {
        return CadenaValor::find($CadenaValorId);
    }
}

?>