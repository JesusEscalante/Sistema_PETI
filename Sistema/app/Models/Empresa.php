<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Empresa extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'empresa';

    // Deshabilitación de los timestamps (created_at y updated_at).
    public $timestamps = false;

    public static function Editar(Empresa $ObjEmpresa)
    {
        if($ObjEmpresa->update())
        {
            return $ObjEmpresa->Id;
        }
        return 0;
    }

    public static function ObtenerPorId($EmpresaId)
    {
        return Empresa::find($EmpresaId);
    }
}

?>