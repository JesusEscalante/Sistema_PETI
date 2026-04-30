<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fortalezas extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'fortalezas';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return Fortalezas::all();
    }

    public static function Agregar(Fortalezas $ObjFortalezas)
    {
        if($ObjFortalezas->save())
        {
            return $ObjFortalezas->Id;
        }
        return 0;
    }

    public static function Editar(Fortalezas $ObjFortalezas)
    {
        if($ObjFortalezas->update())
        {
            return $ObjFortalezas->Id;
        }
        return 0;
    }

    public static function Eliminar(Fortalezas $ObjFortalezas)
    {
        return $ObjFortalezas->delete();
    }

    public static function ObtenerPorId($FortalezaId)
    {
        return Fortalezas::find($FortalezaId);
    }
}

?>