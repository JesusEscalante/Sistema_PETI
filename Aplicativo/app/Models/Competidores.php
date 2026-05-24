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

    public static function ObtenerPorUsuarioIdPlanId($UsuarioId, $PlanId)
    {
        return Competidores::from('competidores as c')
                ->where('c.UsuarioId', $UsuarioId)
                ->where('c.PlanId', $PlanId)
                ->get();
    }

    public static function ListarOrden($UsuarioId, $PlanId)
    {
        return Competidores::from('competidores as c')
                ->select('c.Competidor')
                ->groupBy('c.Competidor')
                ->where('c.UsuarioId', $UsuarioId)
                ->where('c.PlanId', $PlanId)
                ->get();
    }

    public static function ListarMAYOR($UsuarioId, $PlanId)
    {
        return Competidores::from('competidores as c')
                ->select('c.ProductoId', \DB::raw('MAX(c.Venta) as mayor_venta'))
                ->groupBy('c.ProductoId')
                ->where('c.UsuarioId', $UsuarioId)
                ->where('c.PlanId', $PlanId)
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

    public static function ObtenerPorIdProductoId($CompetidorId, $ProductoId, $UsuarioId, $PlanId)
    {
        return Competidores::where('UsuarioId', $UsuarioId)
                ->where('PlanId', $PlanId)
                ->where('Id', $CompetidorId)
                ->where('ProductoId', $ProductoId)
                ->first();
    }
}

?>