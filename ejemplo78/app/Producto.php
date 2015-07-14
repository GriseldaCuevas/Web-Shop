<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model{

    protected $table = 'productos';

    public static function getProductos(){
        return self::join('categorias', 'productos.id_categoria', '=', 'categorias.id')
            ->select('productos.*', 'categorias.nombre as categoria')
            ->where ('productos.activo','<>',0)
            ->orderBy('id', 'desc');
    }

    public static function getAllCategoria($id_categoria){
    	return self::select('*')->where('productos.id_categoria', '=', $id_categoria)->where('productos.activo', '=', 1);
    }

    public static function getBusqueda($str){
    	return self::join('categorias', 'productos.id_categoria', '=', 'categorias.id')
            ->select('productos.*', 'categorias.nombre as categoria')->where('productos.nombre', 'like', "%$str%")->where('productos.activo', '=', 1);
    }

    public static function getProducto($id_producto){
    	return self::join('categorias', 'productos.id_categoria', '=', 'categorias.id')
    		->select('productos.id', 'productos.nombre', 'productos.marca', 'productos.precio', 'productos.img', 'productos.cantidad', 'categorias.nombre as categoria')
    		->where('productos.id', '=', $id_producto)->where('productos.activo', '=', 1)->first();
    }

    public static function getProductosMarca($marca){
        return self::select('*')
            ->where('productos.marca', '=', $marca)->where('productos.activo', '=', 1);
    }

    public static function getProductosCategoria($categoria){
        return self::join('categorias', 'productos.id_categoria', '=', 'categorias.id')
            ->select('productos.id', 'productos.nombre', 'productos.img', 'productos.precio')
            ->where('categorias.nombre', '=', $categoria)
            ->where('productos.activo', '=', 1);   
    }

    public static function guardar($request){
        $producto = null;

        if($request->input('operacion') == 1)
            $producto = self::find($request->input('id_producto'));
        else
            $producto = new Producto();

        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->id_categoria = $request->input('categoria');

        if($request->hasFile('img'))
            $producto->img = $request->file('img')->getClientOriginalName();
        else
            $producto->img = 'sin_imagen.jpg';

        $producto->marca = $request->input('marca');
        $producto->cantidad = $request->input('cantidad');
        $producto->save();
    }

    public static function eliminar($id_producto){
        $producto=self::find($id_producto);
        $producto->activo=0;
        $producto->save();
    }
}
