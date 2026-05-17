<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PlanEstrategico extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'plan_estrategico';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return PlanEstrategico::orderBy('Id', 'DESC')->get();
    }

    public static function ListarPorUsuario()
    {
        return PlanEstrategico::from('plan_estrategico as pe')
            ->select('pe.Id', 'pe.Fecha', 'pe.Contenido', 'pe.Conclucion', 'pe.UsuarioId', 'u.Nombre', 'u.Apellido', 'u.Correo', 'u.Rol', 'u.Estado')
            ->join('usuario as u', 'u.Id', '=', 'pe.UsuarioId')
            ->where('pe.UsuarioId', auth()->user()->Id)
            ->get();
    }

    public static function ListarPorColaborador()
    {
        return DB::table('colaboradores as c')
            ->select('c.Id', 'c.PlanId', 'pe.Fecha', 'pe.Contenido', 'pe.Conclucion')
            ->join('plan_estrategico as pe', 'pe.Id', '=', 'c.PlanId')
            ->where('c.UsuarioId', auth()->user()->Id)
            ->get();
    }

    public static function ListarColaboradores()
    {
        return DB::table('colaboradores as c')
            ->select('c.Id', 'c.PlanId', 'c.UsuarioId', 'u.Nombre', 'u.Apellido', 'u.Correo', 'u.Rol', 'u.Estado')
            ->join('usuario as u', 'u.Id', '=', 'c.UsuarioId')
            ->get();
    }

    public static function Agregar(PlanEstrategico $ObjPlan)
    {
        if($ObjPlan->save())
        {
            return $ObjPlan->Id;
        }
        return 0;
    }

    public static function Editar(PlanEstrategico $ObjPlan)
    {
        if($ObjPlan->update())
        {
            return $ObjPlan->Id;
        }
        return 0;
    }

    public static function Eliminar(PlanEstrategico $ObjPlan)
    {
        return $ObjPlan->delete();
    }

    public static function ObtenerPorId($PlanId)
    {
        return PlanEstrategico::find($PlanId);
    }

    public static function ObtenerColaboradoresPorPlanId($PlanId)
    {
        return DB::table('colaboradores as c')
            ->select('c.Id', 'c.PlanId', 'c.UsuarioId', 'u.Nombre', 'u.Apellido', 'u.Correo', 'u.Rol', 'u.Estado')
            ->join('usuario as u', 'u.Id', '=', 'c.UsuarioId')
            ->where('c.PlanId', '=', $PlanId)
            ->get();
    }
}

?>