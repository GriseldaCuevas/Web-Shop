<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Producto;
use App\Categoria;

class ProductoController extends Controller{

    public function index($id_producto){
        $productos = Producto::getAllCategoria($id_producto)->paginate(18);
        return view('webshop.templates.productos', compact('productos'));
    }

    public function buscar(Request $request){
        $productos = Producto::getBusqueda($request->input('buscar'))->paginate(18);
        return view('webshop.templates.productos', compact('productos'));
    }

    public function getProducto(Request $request){
        $respuesta = array();
        $producto = Producto::getProducto($request->input('id_producto'));

        if($producto){
            $respuesta['validado'] = true;
            $respuesta['producto'] = $producto;
        }else
            $respuesta['validado'] = false;

        return response()->json($respuesta);
    }

    public function getProductosMarca($marca){
        $productos = Producto::getProductosMarca($marca)->paginate(18);
        return view('webshop.templates.productos', compact('productos'));
    }

    public function getProductosCategoria($categoria){
        $productos = Producto::getProductosCategoria($categoria)->paginate(18);
        return view('webshop.templates.productos', compact('productos'));
    }

    public function getProductos(){
        $tipo_busqueda = 'productos';
        $productos = Producto::getProductos()->paginate(18);
        return view('admin.templates.productos', compact('tipo_busqueda', 'productos'));
    }

    public function editar($id_producto){
        $tipo_busqueda = 'productos';
        $producto = Producto::getProducto($id_producto);
        $categorias = Categoria::getArrayCategorias();
        $tipo = 'editar';
        $operacion = 1;
        return view('admin.templates.formulario_producto', compact('producto', 'tipo', 'categorias', 'tipo_busqueda', 'operacion'));
    }

    public function eliminar(Request $request){
        Producto::eliminar($request->input('id_producto'));
        return response()->json(['validado' => true]);
    }

    public function agregar(){
        $tipo_busqueda = 'productos';
        $categorias = Categoria::getArrayCategorias();
        $tipo = 'registrar';
        $operacion = 0;
        return view('admin.templates.formulario_producto', compact('tipo', 'categorias', 'tipo_busqueda', 'operacion'));
    }

    public function guardar(Request $request){
        Producto::guardar($request);

        if($request->hasFile('img')){
            $file = $request->file('img');
            $nombre = $file->getClientOriginalName();
            $file->move(public_path() . '/img/productos/', $nombre);

        }

        if($request->input('operacion')==1)
            return \Redirect::to('/admin/productos')->with(array('producto_operacion' => 'El producto ha sido editado con exito.'));
        else
            return \Redirect::to('/admin/productos')->with(array('producto_operacion' => 'El producto ha sido agregado con exito.'));
    }

    public function buscarProducto(Request $request){
        $tipo_busqueda = 'productos';
        $productos = Producto::getBusqueda($request->input('buscar'))->paginate(18);
        return view('admin.templates.productos', compact('productos', 'tipo_busqueda'));
    }

    /*
    public static function insert(){
        $producto = new Producto();

        for($i = 0; $i < 20; $i++){
            $producto = new Producto();
            $producto->nombre = 'prueba';
            $producto->marca = 'x';
            $producto->cantidad = 1;
            $producto->precio = 100.00;
            $producto->img = 'sin_imagen.jpg';
            $producto->id_categoria = 4;
            $producto->save();
        }
    }
    */
}
