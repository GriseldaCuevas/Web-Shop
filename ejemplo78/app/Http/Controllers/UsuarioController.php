<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usuario;

class UsuarioController extends Controller{

    public function login(Request $request){
        $user  = $request->input('usuario');
        $pass = \Hash::make($request->input('pass'));
        $error_login = false;
        $usuario = Usuario::login($user, $pass);

        if(count($usuario) != 0){
            \Session::put('logeado', true);
            \Session::put('usuario', $user);
            \Session::put('id_usuario', $usuario[0]->id);
            \Session::put('carrito', array());
            return \Redirect::to('/');
        }else{
            $error_login = true;    
            return \Redirect::to('/')->with(array('error_login' => $error_login));
        }
    }

    public function registro(Request $request){
        $usuario = Usuario::existe($request->input('usuario'));
        $error_registro = false;

        if(count($usuario) == 0){
            if(strlen($request->input('pass1')) > 0 && strlen($request->input('pass2')) > 0){
                if(strcmp($request->input('pass1'), $request->input('pass2')) == 0){
                    $id_usuario = Usuario::registrarUsuario($request);
                    \Session::put('logeado', true);
                    \Session::put('usuario', $request->input('usuario'));
                    \Session::put('id_usuario', $id_usuario);
                    \Session::put('carrito', array());
                    return \Redirect::to('/');
                }else{
                    $error_registro = true;
                    return \Redirect::to('/')->with(array('error_registro' => $error_registro, 'mensaje' => 'Las contraseñas no coinciden.'));
                }
            }else{
                $error_registro = true;
                return \Redirect::to('/')->with(array('error_registro' => $error_registro, 'mensaje' => 'Las contraseñas no pueden estar vacias.'));
            }
        }else{
            $error_registro = true;
            return \Redirect::to('/')->with(array('error_registro' => $error_registro, 'mensaje' => 'El nombre de usuario ya existe.'));
        }
    }

    public function logout(){
        \Session::flush();
        return \Redirect::to('/');
    }

}
