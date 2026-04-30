<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ObjetivosEspecificos extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'objetivo_especifico';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Listar()
    {
        return ObjetivosEspecificos::all();
    }

    public static function ListarPorObjetivoGeneralId($ObjetivoId)
    {
        return DB::table('objetivo_especifico')
                ->select('objetivo_especifico.*')
                ->where('objetivo_especifico.ObjGeneral_Id', $ObjetivoId)
                ->get();
    }

    public static function Agregar(ObjetivosEspecificos $ObjObjetivosEspecificos)
    {
        if($ObjObjetivosEspecificos->save())
        {
            return $ObjObjetivosEspecificos->Id;
        }
        return 0;
    }

    public static function Editar(ObjetivosEspecificos $ObjObjetivosEspecificos)
    {
        if($ObjObjetivosEspecificos->update())
        {
            return $ObjObjetivosEspecificos->Id;
        }
        return 0;
    }

    public static function Eliminar(ObjetivosEspecificos $ObjObjetivosEspecificos)
    {
        return $ObjObjetivosEspecificos->delete();
    }

    public static function ObtenerPorId($ObjetivoId)
    {
        return ObjetivosEspecificos::find($ObjetivoId);
    }
}

?>