<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FuerzasPorter extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'fuerzas_porter';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return FuerzasPorter::all();
    }

    public static function ListarPreguntas()
    {
        return DB::table('preguntas_fp')->get();
    }

    public static function ObtenerPorPlanId($PlanId)
    {
        return Fortalezas::from('fuerzas_porter as fp')
                ->select('f.*', 'u.Nombre', 'u.Apellido')
                ->join('usuario as u', 'u.Id', '=', 'f.UsuarioId')
                ->where('f.PlanId', $PlanId)
                ->get();
    }

    public static function ObtenerPorUsuarioIdPlanId($UsuarioId, $PlanId)
    {
        return FuerzasPorter::from('fuerzas_porter as fp')
                ->select('fp.Id', 'fp.UsuarioId', 'fp.PlanId', 'pf.Codigo', 'pf.Perfil', 'pf.Hostil', 'fp.Valor', 'pf.Favorable')
                ->join('preguntas_fp as pf', 'pf.Codigo', '=', 'fp.Fuerza')
                ->where('fp.UsuarioId', $UsuarioId)
                ->where('fp.PlanId', $PlanId)
                ->get();
    }

    public static function Agregar(FuerzasPorter $ObjFuerzasPorter)
    {
        if($ObjFuerzasPorter->save())
        {
            return $ObjFuerzasPorter->Id;
        }
        return 0;
    }

    public static function Editar(FuerzasPorter $ObjFuerzasPorter)
    {
        if($ObjFuerzasPorter->update())
        {
            return $ObjFuerzasPorter->Id;
        }
        return 0;
    }

    public static function Eliminar(FuerzasPorter $ObjFuerzasPorter)
    {
        return $ObjFuerzasPorter->delete();
    }

    public static function ObtenerPorId($FuerzaId)
    {
        return FuerzasPorter::find($FuerzaId);
    }
}

?>