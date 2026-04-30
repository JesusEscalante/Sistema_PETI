<?php

namespace App\Models;

// Importación de clases necesarias.
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{
    // Especificación de la clave primaria de la tabla.
    protected  $primaryKey = "Id";

    // Especificación del nombre de la tabla en la base de datos.
    protected $table = 'usuario';

    // Método para agregar un nuevo usuario a la base de datos.
    public static function Agregar(Usuario $ObjUsuario)
    {
        // Intenta guardar el usuario en la base de datos.
        if($ObjUsuario->save())
        {
            return $ObjUsuario->Id; // Retorna el ID del usuario si se guarda correctamente.
        }
        return 0; // Retorna 0 si falla la operación.
    }

    // Método para editar un usuario existente en la base de datos.
    public static function Editar(Usuario $ObjUsuario)
    {
        // Intenta actualizar el usuario en la base de datos.
        if($ObjUsuario->update())
        {
            return $ObjUsuario->Id; // Retorna el ID del usuario si se actualiza correctamente.
        }
        return 0; // Retorna 0 si falla la operación.
    }

    // Método para listar todos los usuarios.
    public static function Listar()
    {
        return Usuario::all(); // Retorna una colección de todos los usuarios.
    }

    // Método para obtener un usuario por su ID.
    public static function ObtenerPorId($UsuarioId)
    {
        $BUSQUEDA = Usuario::find($UsuarioId); // Busca el usuario por su ID.
        if($BUSQUEDA != null){
            return $BUSQUEDA; // Retorna el usuario si se encuentra.
        }
        return 0; // Retorna 0 si no se encuentra el usuario.
    }

    // Método para obtener el ID de un usuario por su correo electrónico.
    public static function ObtenerPorCorreo($Correo)
    {
        $BUSQUEDA = DB::table('usuario') // Inicia una consulta a la tabla 'usuario'.
                    ->select('usuario.*') // Selecciona todas las columnas de la tabla 'usuario'.
                    ->where('usuario.Correo', $Correo) // Filtra por el correo electrónico.
                    ->get()
                    ->first(); // Ejecuta la consulta y obtiene los resultados.
        if($BUSQUEDA != null){
            return $BUSQUEDA; // Retorna el usuario si se encuentra.
        }
        return null; // Retorna 0 si no se encuentra ningún usuario con el correo especificado.
    }

    // Método para listar usuarios excluyendo al usuario con ID 2.
    public static function ListarUsuarios()
    {
        return  DB::table('usuario') // Inicia una consulta a la tabla 'usuario'.
                ->select('usuario.Id', 'usuario.Nombre', 'usuario.Apellido', 'usuario.avatar', 'usuario.Correo') // Selecciona las columnas deseadas.
                ->where('usuario.Id', '!=' , 2) // Filtra excluyendo al usuario con ID 2.
                ->get(); // Ejecuta la consulta y retorna los resultados.
    }
    
}

?>