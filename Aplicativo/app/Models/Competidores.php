<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Competidores extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'competidores';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return Competidores::all();
    }

    public static function ListarOrden()
    {
        return Competidores::select('Competidor')
          ->groupBy('Competidor')
          ->get();
    }

    public static function ListarMAYOR()
    {
        return Competidores::select('ProductoId', \DB::raw('MAX(Venta) as mayor_venta'))
          ->groupBy('ProductoId')
          ->get();
    }

    public static function Agregar(Competidores $ObjCompetidores)
    {
        if($ObjCompetidores->save())
        {
            return $ObjCompetidores->Id;
        }
        return 0;
    }

    public static function Editar(Competidores $ObjCompetidores)
    {
        if($ObjCompetidores->update())
        {
            return $ObjCompetidores->Id;
        }
        return 0;
    }

    public static function Eliminar(Competidores $ObjCompetidores)
    {
        return $ObjCompetidores->delete();
    }

    public static function ObtenerPorId($CompetidorId)
    {
        return Competidores::find($CompetidorId);
    }

    public static function ObtenerPorIdProductoId($CompetidorId, $ProductoId)
    {
        return Competidores::where('Id', $CompetidorId)
               ->where('ProductoId', $ProductoId)
               ->first();
    }
}

?>