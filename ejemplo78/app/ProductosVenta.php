<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosVenta extends Model{

	protected $table = 'productos_venta';

	public static function agregarProductoAVenta($productos, $id_venta){
		foreach($productos as $producto){
			$producto_venta = new ProductosVenta();
			$producto_venta->id_venta = $id_venta;
			$producto_venta->id_producto = $producto->id;
			$producto_venta->save();
		}
	}
}
