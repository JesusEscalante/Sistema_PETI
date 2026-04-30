<?php

/*
|--------------------------------------------------------------------------
| RegisterController
|--------------------------------------------------------------------------
|
| AUTOR: Jesus Escalante Alanoca
| FECHA_MODIFICACION: 22/03/2025
|
| REQUERIMIENTO_FUNCIONAL: RF13
| CASOS_DE_USO: CU36.
|
*/

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario as Usuario;

class RegisterController extends Controller
{
    public function FrmRegistrar()
    {
        return view('auth.Registrar');
    }

    protected function ActRegistrar(Request $request)
    {
        try
        {
            $ObjUsuario = new Usuario(); //Creación de una nueva instancia de Usuario
            $ObjUsuario->Nombre = $request->input('Nombre'); //Asignación del nombre del usuario
            $ObjUsuario->Apellido = $request->input('Apellido'); //Asignación del apellido del usuario
            $ObjUsuario->Correo = strtolower($request->input('Correo')); //Asignación del correo del usuario
            $ObjUsuario->password = bcrypt($request->input('Contraseña')); //Encriptación de la contraseña
            $ObjUsuario->Avatar = $request->input('Avatar'); //Valor por defecto del avatar
            $ObjUsuario->TipoUsuarioId = '3'; //Tipo Usuario 3 = Alumno
            $ObjUsuario->Estado = 1; //Activo

            $apiKey = "6cf6bcb50d7acdbc892c9f63efcb06cde738f768";
            $url = "https://api.hunter.io/v2/email-verifier?email=" . urlencode($ObjUsuario->Correo) . "&api_key=" . $apiKey;
            $response = file_get_contents($url);
            $data = json_decode($response, true);

            if ($data['data']['status'] = "valid") {
                // Verificación si el correo ya está registrado
                if(Usuario::ObtenerPorCorreo($ObjUsuario->Correo) == null) 
                {
                    // Intento de agregar el nuevo usuario a la base de datos
                    if(Usuario::Agregar($ObjUsuario) > 0)
                    {
                        session_start(); // Inicia la sesión
                        $_SESSION["ALERTA"] = "success";// Variable de alerta para indicar exito
                        $_SESSION["MENSAJE"] = "Cuenta registrada. lista para inicias sesión";// Mensaje de exito
                        return redirect('/'); // Redirige a la página de inicio de sesión
                    }else{
                        session_start(); // Inicia la sesión
                        $_SESSION["ALERTA"] = "error";// Variable de alerta para indicar error
                        $_SESSION["MENSAJE"] = "No se pudo registrar la cuenta";// Mensaje de error
                        return redirect()->intended('registrar'); // Redirige a la página de registro
                    }
                }else{
                    session_start(); // Inicia la sesión
                    $_SESSION["ALERTA"] = "error";// Variable de alerta para indicar error
                    $_SESSION["MENSAJE"] = "El correo ya se encuentra registrado";// Mensaje de error
                    return redirect()->intended('registrar'); // Redirige a la página de registro
                }
            }else{
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
            $_SESSION["MENSAJE"] = "No se pudo registrar la cuenta";// Mensaje de error
            return redirect()->intended('registrar'); // Redirige a la página de registro
        }
    }
}
