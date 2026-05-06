<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Periodos extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'periodos';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return Periodos::orderBy('Periodo', 'asc')->get();
    }

    public static function Agregar(Periodos $ObjPeriodo)
    {
        if($ObjPeriodo->save())
        {
            return $ObjPeriodo->Id;
        }
        return 0;
    }

    public static function Editar(Periodos $ObjPeriodo)
    {
        if($ObjPeriodo->update())
        {
            return $ObjPeriodo->Id;
        }
        return 0;
    }

    public static function Eliminar(Periodos $ObjPeriodo)
    {
        return $ObjPeriodo->delete();
    }

    public static function ObtenerPorId($PeriodoId)
    {
        return Periodos::find($PeriodoId);
    }

    public static function ObtenerPorPeriodo($Periodo)
    {
        return Periodos::where('Periodo', $Periodo)->first();
    }
}

?>