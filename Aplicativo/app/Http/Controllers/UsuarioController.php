<?php

namespace App\Http\Controllers;

// Importación de modelos necesarios
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario as Usuario;
use App\Models\TipoUsuario as TipoUsuario;

class UsuarioController extends Controller
{
    public function Listar(){
        $ObjUsuario = Usuario::Listar();
        return view('Usuario.Listar',[
            'ListadoUsuario' => $ObjUsuario
        ]);
    }

    public function Agregar(Request $request)
    {
        try
        {
            $ObjUsuario = new Usuario();
            $ObjUsuario->Nombre = $request->input('nombre');
            $ObjUsuario->Apellido = $request->input('apellido');
            $ObjUsuario->Correo = $request->input('correo');
            $ObjUsuario->password = bcrypt('gestion'); // Encripta la contraseña por defecto.
            $ObjUsuario->Avatar = 1; // Asigna un avatar por defecto.
            $ObjUsuario->Rol = $request->input('rol');
            $ObjUsuario->Estado = 1;

            if(Usuario::ObtenerPorCorreo($ObjUsuario->Correo) == null) 
            {
                if(Usuario::Agregar($ObjUsuario)){
                    session_start();
                    $_SESSION["ALERTA"] = "success";
                    $_SESSION["MENSAJE"] = "Se agrego correctamente el Usuario";
                    return redirect()->action('UsuarioController@Listar');
                }
            }else{
                session_start();
                $_SESSION["ALERTA"] = "error";
                $_SESSION["MENSAJE"] = "El correo ya se encuentra registrado";
                return redirect()->action('UsuarioController@Listar');
            }
        } 
        catch (\Exception $e){
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo agregar el usuario";
            return redirect()->action('UsuarioController@Listar');
        }
    }   

    public function Editar(Request $request)
    {
        try
        {
            $ObjUsuario = Usuario::ObtenerPorId($request->input('id'));
            $ObjUsuario->Nombre = $request->input('nombre');
            $ObjUsuario->Apellido = $request->input('apellido');
            $ObjUsuario->Rol = $request->input('rol');
            $ObjUsuario->Estado = $request->input('estado');
            if(Usuario::Editar($ObjUsuario) > 0){
                session_start();
                $_SESSION["ALERTA"] = "success";
                $_SESSION["MENSAJE"] = "Se modifico correctamente el usuario";
                return redirect()->action('UsuarioController@Listar');
            }
        }
        catch (\Exception $e){
            session_start();
            $_SESSION["ALERTA"] = "error";
            $_SESSION["MENSAJE"] = "No se pudo modificar el usuario";
            return redirect()->action('UsuarioController@Listar');
        }
    }
}

?>