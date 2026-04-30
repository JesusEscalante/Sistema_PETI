<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Amenazas extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'amenazas';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return Amenazas::all();
    }

    public static function Agregar(Amenazas $ObjAmenazas)
    {
        if($ObjAmenazas->save())
        {
            return $ObjAmenazas->Id;
        }
        return 0;
    }

    public static function Editar(Amenazas $ObjAmenazas)
    {
        if($ObjAmenazas->update())
        {
            return $ObjAmenazas->Id;
        }
        return 0;
    }

    public static function Eliminar(Amenazas $ObjAmenazas)
    {
        return $ObjAmenazas->delete();
    }

    public static function ObtenerPorId($AmenazaId)
    {
        return Amenazas::find($AmenazaId);
    }
}

?>