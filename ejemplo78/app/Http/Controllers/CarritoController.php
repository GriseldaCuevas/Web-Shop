<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Producto;
use App\Usuario;
use App\Venta;
use App\ProductosVenta;

class CarritoController extends Controller{

    public function index(){
        return view('webshop.templates.carrito');
    }

    public function agregarACarrito(Request $request){
        $producto = Producto::getProducto($request->input('id_producto'));
        $encontrado = false;
        $total = \Session::get('total_compra');

        foreach(\Session::get('carrito') as $producto_carrito)
            if($producto_carrito->id == $producto->id){
                $encontrado = true;
                break;
            }

        if(!$encontrado){
            $total += $producto->precio;
            \Session::put('total_compra', $total);
            \Session::push('carrito', $producto);
            \Session::flash('poner_carrito', true);
        }

        return response()->json(['validado' => true]);
    }

    public function quitarACarrito(Request $request){
        $carrito = \Session::get('carrito');
        $size = count($carrito);
        $total = 0;

        for($i = 0; $i < $size; $i++)
            if($carrito[$i]->id == $request->input('id_producto')){
                $total = \Session::get('total_compra') - $carrito[$i]->precio;
                \Session::put('total_compra', $total);
                unset($carrito[$i]);
                \Session::put('carrito', array_values($carrito));
                break;
            }

        return response()->json(['validado' => true, 'total' => number_format($total, 2, '.', ',')]);
    }

    public function comprar(){
        if(\Session::get('total_compra') == 0)
            return \Redirect::back();

        $saldo = Usuario::getSaldo(\Session::get('id_usuario')) - \Session::get('total_compra');

        if($saldo < 0)
            return \Redirect::back()->with(['error_compra' => true, 'mensaje' => 'Su saldo no es suficiente.']);

        $id_venta = Venta::venta(\Session::get('id_usuario'), \Session::get('total_compra'));
        Usuario::setSaldo(\Session::get('total_compra'), \Session::get('id_usuario'), 0);
        ProductosVenta::agregarProductoAVenta(\Session::get('carrito'), $id_venta);
        \Session::put('carrito', array());
        \Session::put('total_compra', 0);
        return \Redirect::to('/')->with(['compra_realizada' => true]);;
    }
}
