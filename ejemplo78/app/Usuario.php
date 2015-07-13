<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{
    
    protected $table = 'usuarios';

    public static function login($user, $pass){
    	return self::where('usuarios.usuario', '=', $user)->where('usuarios.password' , '=', $pass)->get();
    }

    public static function registrarUsuario($request){
    	$usuario = new Usuario();
    	$usuario->nombre = $request->input('nombre');
    	$usuario->usuario = $request->input('usuario');
    	$usuario->password = sha1($request->input('pass1'));
    	$usuario->admin = 0;
    	$usuario->saldo = 0;
        $usuario->tarjeta = sha1($request->input('tarjeta'));
    	$usuario->cp = $request->input('codigo_postal');
    	$usuario->save();
    	return $usuario->id;
    }

    public static function existe($usuario){
    	return self::where('usuarios.usuario', '=', $usuario)->get();
    }

    public static function getSaldo($id_usuario){
        return self::find($id_usuario)->saldo;
    }

    public static function setSaldo($saldo, $id_usuario, $tipo = 1){
        $usuario = self::find($id_usuario);

        if($tipo == 1)
            $usuario->saldo = $usuario->saldo + $saldo;
        else
            $usuario->saldo = $usuario->saldo - $saldo;

        $usuario->save();
    }
}
