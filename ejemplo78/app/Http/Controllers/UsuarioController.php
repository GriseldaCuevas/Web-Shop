<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usuario;
use App\Venta;

class UsuarioController extends Controller{

    public function login(Request $request){
        $user  = $request->input('usuario');
        $pass = sha1($request->input('pass'));
        $usuario = Usuario::login($user, $pass);

        
        if(count($usuario) != 0){
            \Session::put('logeado', true);
            \Session::put('usuario', $user);
            \Session::put('id_usuario', $usuario[0]->id);
            \Session::put('carrito', array());
            \Session::put('total_compra', 0);
            return \Redirect::back();
        }else{    
            return \Redirect::back()->with(array('error_login' => true));
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
                    \Session::put('total_compra', 0);
                    return \Redirect::to('/');
                }else{
                    $error_registro = true;
                    return \Redirect::back()->with(array('error_registro' => $error_registro, 'mensaje' => 'Las contraseñas no coinciden.'));
                }
            }else{
                $error_registro = true;
                return \Redirect::back()->with(array('error_registro' => $error_registro, 'mensaje' => 'Las contraseñas no pueden estar vacias.'));
            }
        }else{
            $error_registro = true;
            return \Redirect::back()->with(array('error_registro' => $error_registro, 'mensaje' => 'El nombre de usuario ya existe.'));
        }
    }

    public function logout(){
        \Session::flush();
        return \Redirect::to('/');
    }

    public function perfil(){
        $saldo = Usuario::getSaldo(\Session::get('id_usuario'));
        $ventas = Venta::getVentasUsuario(\Session::get('id_usuario'));
        \Session::flash('saldo', $saldo);
        return view('webshop.templates.usuario', compact('ventas'));
    }

    public function actualizarSaldo(Request $request){
        $usuario = Usuario::find(\Session::get('id_usuario'));

        if(strcmp($usuario->tarjeta, sha1($request->input('tarjeta'))) == 0){
            $saldo = Usuario::setSaldo($request->input('saldo'), \Session::get('id_usuario'));
            return \Redirect::to('/perfil')->with(['saldo' => $saldo]);   
        }

        return \Redirect::back()->with(['error_actualizar_saldo' => true, 'mensaje' => 'El numero de la tarjeta no coincide.']);
    }

    public function listarArticulosCompra(Request $request){
        $productos = Venta::obtenerListaReporte($request->input('id_venta'));
        \Session::flash('comprados_venta', $productos);
        return \Redirect::back()->with(['muestra_lista' => true]);
    }

    public function facturar(Request $request){
        $productos = Venta::obtenerListaReporte($request->input('id_venta'));
        $dompdf = \App::make('dompdf.wrapper');
        $dompdf->loadView('factura', compact('productos'));
        return $dompdf->stream();
    }
}
