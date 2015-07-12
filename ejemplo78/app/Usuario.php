<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{
    
    protected $table = 'usuarios';

    public static function login($user, $pass){
    	return self::where('usuarios.usuario', '=', $user, 'and', 'usuarios.pass' , '=', $pass)->get();
    }

    public static function registrarUsuario($request){
    	$usuario = new Usuario();
    	$usuario->nombre = $request->input('nombre');
    	$usuario->usuario = $request->input('usuario');
    	$usuario->password = \Hash::make($request->input('pass'));
    	$usuario->admin = 0;
    	$usuario->saldo = 50000.00;
    	$usuario->cp = $request->input('codigo_postal');
    	$usuario->save();
    	return $usuario->id;
    }

    public static function existe($usuario){
    	return self::where('usuarios.usuario', '=', $usuario)->get();
    }
}
