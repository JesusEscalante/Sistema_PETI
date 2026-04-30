<?php

/*
|--------------------------------------------------------------------------
| UsuarioController
|--------------------------------------------------------------------------
|
| AUTOR: Jesus Escalante Alanoca
| FECHA_MODIFICACION: 22/03/2025
|
| REQUERIMIENTO_FUNCIONAL: RF06 y RF13
| CASOS_DE_USO: CU13, CU14 y CU15.
|
*/

namespace App\Http\Controllers;

// Importación de modelos necesarios
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario as Usuario;
use App\Models\TipoUsuario as TipoUsuario;

class UsuarioController extends Controller
{
    // Método para listar todos los usuarios.
    public function Listar(){
        $ObjUsuario = Usuario::Listar(); // Obtiene la lista de usuarios desde el modelo.
        return view('Usuario.Listar',[
            'ListadoUsuario' => $ObjUsuario
        ]);// Retorna la vista 'Usuario.Listar' con la lista de usuarios.
    }

    // Método para mostrar el formulario de agregar un nuevo usuario.
    public function FrmAgregar()
    {
        $ObjTipoUsuario = TipoUsuario::Listar(); // Obtiene la lista de tipos de usuario.
        return view('Usuario.Agregar',[
            'ListadoTipoUsuario' => $ObjTipoUsuario
        ]);// Retorna la vista 'Usuario.Agregar' con la lista de tipos de usuario.
    }

    // Método para mostrar el formulario de editar un usuario existente.
    public function FrmEditar($UsuarioId)
    {
        $ObjUsuario = Usuario::ObtenerPorId($UsuarioId); // Obtiene el usuario por su ID.
        $ObjTipoUsuario = TipoUsuario::Listar(); // Obtiene la lista de tipos de usuario.
        return view('Usuario.Editar', [
            'Usuario' => $ObjUsuario,
            'ListadoTipoUsuario' => $ObjTipoUsuario
        ]);// Retorna la vista 'Usuario.Editar' con los datos del usuario y la lista de tipos de usuario.
    }

    // Método para procesar la creación de un nuevo usuario.
    public function ActAgregar(Request $request)
    {
        try
        {
            $ObjUsuario = new Usuario(); // Crea una nueva instancia de Usuario.
            $ObjUsuario->Nombre = $request->input('Nombre'); // Asigna el nombre del usuario.
            $ObjUsuario->Apellido = $request->input('Apellido'); // Asigna el apellido del usuario.
            $ObjUsuario->Correo = strtolower($request->input('Correo')); // Asigna el correo en minúsculas.
            $ObjUsuario->Password = bcrypt('gestion'); // Encripta la contraseña por defecto.
            $ObjUsuario->Avatar = 1; // Asigna un avatar por defecto.
            $ObjUsuario->TipoUsuarioId = $request->input('TipoUsuarioId'); // Asigna el tipo de usuario.
            $ObjUsuario->Estado = 1; // Asigna el estado inicial del usuario (activo).

            $apiKey = "6cf6bcb50d7acdbc892c9f63efcb06cde738f768";
            $url = "https://api.hunter.io/v2/email-verifier?email=" . urlencode($ObjUsuario->Correo) . "&api_key=" . $apiKey;
            $response = file_get_contents($url);
            $data = json_decode($response, true);

            if ($data['data']['status'] = "valid") {
                // Verificación si el correo ya está registrado
                if(Usuario::ObtenerPorCorreo($ObjUsuario->Correo) == null) 
                {
                    if(Usuario::Agregar($ObjUsuario) > 0)// Intenta agregar el usuario a la base de datos.
                    {
                        session_start(); // Inicia la sesión
                        $_SESSION["ALERTA"] = "success";// Variable de alerta para indicar éxito;
                        $_SESSION["MENSAJE"] = "Se agrego correctamente el Usuario";// Mensaje de éxito

                        return redirect()->action('UsuarioController@Listar'); // Redirige al listado de usuarios.
                    }
                }else{
                    session_start(); // Inicia la sesión
                    $_SESSION["ALERTA"] = "error";// Variable de alerta para indicar error
                    $_SESSION["MENSAJE"] = "El correo ya se encuentra registrado";// Mensaje de error
                    return redirect()->intended('registrar'); // Redirige a la página de registro
                }
            } else {
                session_start(); // Inicia la sesión
                $_SESSION["ALERTA"] = "error";// Variable de alerta para indicar error
                $_SESSION["MENSAJE"] = "El correo no existe o no puede recibir mensajes.";// Mensaje de error
                return redirect()->intended('registrar'); // Redirige a la página de registro
            }
        } 
        catch (\Exception $e)
        {
            session_start(); // Inicia la sesión
            $_SESSION["ALERTA"] = "error";// Variable de alerta para indicar error;
            $_SESSION["MENSAJE"] = "No se pudo agregar el Usuario";// Mensaje de error

            return redirect()->action('UsuarioController@Listar'); // Redirige al listado de usuarios en caso de error.
        }
    }   

    // Método para procesar la edición de un usuario existente.
    public function ActEditar(Request $request)
    {
        try
        {
            $ObjUsuario = Usuario::ObtenerPorId($request->input('Id')); // Obtiene el usuario por su ID.
            $ObjUsuario->Nombre = $request->input('Nombre'); // Actualiza el nombre del usuario.
            $ObjUsuario->Apellido = $request->input('Apellido'); // Actualiza el apellido del usuario.
            $ObjUsuario->TipoUsuarioId = $request->input('TipoUsuarioId'); // Actualiza el tipo de usuario.
            $ObjUsuario->Estado = $request->input('Estado'); // Actualiza el estado del usuario.
            if(Usuario::Editar($ObjUsuario) > 0)// Intenta guardar los cambios en la base de datos.
            {
                session_start(); // Inicia la sesión
                $_SESSION["ALERTA"] = "success";// Variable de alerta para indicar éxito;
                $_SESSION["MENSAJE"] = "Se modifico correctamente el Usuario";// Mensaje de éxito

                return redirect()->action('UsuarioController@Listar'); // Redirige al listado de usuarios.
            }
        }
        catch (\Exception $e)
        {
            session_start(); // Inicia la sesión
            $_SESSION["ALERTA"] = "error";// Variable de alerta para indicar error;
            $_SESSION["MENSAJE"] = "No se pudo modificar el Usuario";// Mensaje de error

            return redirect()->action('UsuarioController@Listar'); // Redirige al listado de usuarios en caso de error.
        }
    }
}

?>