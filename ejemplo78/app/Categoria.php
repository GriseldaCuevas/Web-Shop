<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model{
    
    protected $table = 'categorias';

    public static function getAll(){
    	return self::select('categorias.*')
            ->where('categorias.activo', '=', 1);
    }

    public static function getArrayCategorias(){
    	return self::select('categorias.*')
            ->where('categorias.activo', '=', 1)
            ->get();
    }

    public static function getCategorias($str){
    	return self::select('categorias.*')
    		->where('categorias.nombre', 'like', "%$str%")
            ->where('categorias.activo', '=', 1);
    }

    public static function guardar($request){
    	$categoria = null;

    	if($request->input('operacion') == 1)
    		$categoria = self::find($request->input('id_categoria'));
    	else
    		$categoria = new Categoria();

    	$categoria->nombre = $request->input('nombre');

    	if($request->hasFile('img'))
            $categoria->img = $request->file('img')->getClientOriginalName();
        else
            $categoria->img = 'sin_imagen.jpg';
            $categoria->activo = 1;

    	$categoria->save();
    }

    public static function eliminar($id_categoria){
        $categoria = self::find($id_categoria);
        $categoria->activo = 0;
        $categoria->save();
    }	
}
