<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Productos extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'productos';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return Productos::all();
    }

    public static function DatosGrafico()
    {
        return DB::table('productos as p')
                ->select(
                    'p.Id',
                    'p.Nombre',
                    'p.Ventas',
                    'p.Porcentaje',
                    DB::raw('SUM(t.Valor) as TCM')
                )
                ->join('tcm as t', 't.ProductoId', '=', 'p.Id')
                ->groupBy('p.Id', 'p.Nombre', 'p.Ventas', 'p.Porcentaje')
                ->get();
    }

    public static function Agregar(Productos $ObjProductos)
    {
        if($ObjProductos->save())
        {
            return $ObjProductos->Id;
        }
        return 0;
    }

    public static function Editar(Productos $ObjProductos)
    {
        if($ObjProductos->update())
        {
            return $ObjProductos->Id;
        }
        return 0;
    }

    public static function Eliminar(Productos $ObjProductos)
    {
        return $ObjProductos->delete();
    }

    public static function ObtenerPorId($ProductoId)
    {
        return Productos::find($ProductoId);
    }
}

?>