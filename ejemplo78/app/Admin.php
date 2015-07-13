<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model{

	protected $table = 'usuarios';

	public static function login($usuario, $pass){
		return self::where('usuarios.usuario', '=', $usuario)
			->where('usuarios.password', '=', $pass)
			->get();
	}
}
