<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model{
    
    protected $table = 'ventas';

    public static function venta($id_usuario, $total){
    	$venta = new Venta();
    	$venta->id_usuario = $id_usuario;
    	$venta->total = $total;
    	$venta->fecha = date('Y-m-d H:i:s');
    	$venta->save();
    	return $venta->id;
    }

    public static function getVentasUsuario($id_usuario){
    	return \DB::select('select ventas.id, ventas.total, ventas.fecha, (select count(*) from productos_venta where productos_venta.id_venta = ventas.id) as articulos from ventas where ventas.id_usuario = :id order by id desc', ['id' => $id_usuario]);
    }

    public static function obtenerListaReporte($id_venta){
    	return self::join('productos_venta', 'ventas.id', '=', 'productos_venta.id_venta')
    		->join('productos', 'productos_venta.id_producto', '=', 'productos.id')
    		->join('categorias', 'productos.id_categoria', '=', 'categorias.id')
    		->select('categorias.nombre as categorias_nombre', 'productos.*', 'productos_venta.*', 'ventas.*')
            ->where('productos_venta.id_venta', '=', $id_venta)
    		->get();
    }
}
