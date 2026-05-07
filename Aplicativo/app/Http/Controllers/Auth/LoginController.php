<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario as Usuario;

class LoginController extends Controller
{
    public function FrmLogin()
    {
        return view('auth.Login');
    }

    public function Login(Request $request)
    {
        $this->validate(request(), [
            'TxtCorreo' => 'email|required|string',
            'TxtClave' => 'required|string'
        ]); // Validación de los campos del formulario

        $CREDENCIALES = [
            'Correo' => $request->TxtCorreo,
            'password' => $request->TxtClave
        ]; // Credenciales para la autenticación

        if(Auth::attempt($CREDENCIALES))
        {
            return redirect()->intended('/empresa/home');
        }
        else{
            session_start(); // Inicia la sesión
            $_SESSION["ALERTA"] = "error"; // Variable de alerta para indicar error
            $_SESSION["MENSAJE"] = "Usuario o contraseña incorrectos"; // Mensaje de error
            return back()->withInput(request(['TxtCorreo'])); // Redirige de vuelta con el correo ingresado
        }
    }

    // Método para mostrar el perfil de un usuario.
    public function FrmPerfil($UsuarioId)
    {
        $ObjUsuario = Usuario::ObtenerPorId($UsuarioId); // Obtiene el usuario por su ID.
        return view('auth.Perfil',[
            'Usuario' => $ObjUsuario
        ]);// Retorna la vista 'auth.Perfil' con los datos del usuario.
    }

    // Método para procesar la edición del perfil de un usuario.
    public function ActEditarPerfil(Request $request)
    {
        try
        {
            $ObjUsuario = Usuario::ObtenerPorId($request->input('Id')); // Obtiene el usuario por su ID.
            $ObjUsuario->Nombre = $request->input('Nombre'); // Actualiza el nombre del usuario.
            $ObjUsuario->Apellido = $request->input('Apellido'); // Actualiza el apellido del usuario.
            if($request->input('Password') != ""){
                $ObjUsuario->password = bcrypt($request->input('Password')); // Encripta y actualiza la contraseña.
            }
            $ObjUsuario->Avatar = $request->input('Avatar'); // Actualiza el avatar del usuario.
            if(Usuario::Editar($ObjUsuario) > 0)// Intenta guardar los cambios en la base de datos.
            {
                session_start(); // Inicia la sesión
                $_SESSION["ALERTA"] = "success";// Variable de alerta para indicar éxito;
                $_SESSION["MENSAJE"] = "Se modifico correctamente el Usuario";// Mensaje de éxito
                return redirect()->action('Auth\LoginController@FrmPerfil', ['UsuarioId' => $ObjUsuario->Id]); // Redirige al perfil del usuario.
            }
        }
        catch (\Exception $e)
        {
            session_start(); // Inicia la sesión
            $_SESSION["ALERTA"] = "error";// Variable de alerta para indicar error;
            $_SESSION["MENSAJE"] = "No se pudo modificar el Usuario";// Mensaje de error
            return redirect()->action('Auth\LoginController@FrmPerfil', ['UsuarioId' => $ObjUsuario->Id]); // Redirige al perfil del usuario en caso de error.
        }
    }

    public function Logout()
    {
        Auth::logout(); // Cierra la sesión del usuario autenticado
        return redirect('/'); // Redirige a la página de inicio
    }
}
