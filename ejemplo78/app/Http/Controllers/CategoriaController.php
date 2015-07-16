<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Categoria;

class CategoriaController extends Controller{

    public function index(){
        $categorias = Categoria::getAll()->paginate(18);
        return view('webshop.templates.categorias', compact('categorias'));
    }

    public function getCategorias(){
        $categorias = Categoria::getAll()->paginate(18);
        $tipo_busqueda = 'categorias';
        return view('admin.templates.categorias', compact('categorias', 'tipo_busqueda'));
    }

    public function buscarCategoria(Request $request){
        $categorias = Categoria::getCategorias($request->input('buscar'))->paginate(18);
        $tipo_busqueda = 'categorias';
        return view('admin.templates.categorias', compact('categorias', 'tipo_busqueda'));
    }

    public function editar($id_categoria){
        $tipo_busqueda = 'categoria';
        $categoria = Categoria::find($id_categoria);
        $operacion = 1;
        $tipo = 'editar';
        return view('admin.templates.formulario_categoria', compact('tipo_busqueda', 'categoria', 'operacion', 'tipo'));
    }

    public function agregar(){
        $tipo_busqueda = 'categoria';
        $operacion = 0;
        $tipo = 'registrar';
        return view('admin.templates.formulario_categoria', compact('tipo_busqueda', 'categoria', 'operacion', 'tipo'));
    }

    public function guardar(Request $request){
        Categoria::guardar($request);

        if($request->hasFile('img')){
            $file = $request->file('img');
            $nombre = $file->getClientOriginalName();
            $file->move(public_path() . '/img/categorias/', $nombre);
        }

        if($request->input('operacion')==1)
            return \Redirect::to('/admin/categorias')->with(array('categoria_operacion' => 'la categoria ha sido editado con exito.'));
        else
            return \Redirect::to('/admin/categorias')->with(array('categoria_operacion' => 'la categoria ha sido agregado con exito.'));
    }

    /*
    public static function insert(){
        $categoria = new Categoria();

        for($i = 0; $i < 20; $i++){
            $categoria = new Categoria();
            $categoria->nombre = 'prueba';
            $categoria->img = 'sin_imagen.jpg';
            $categoria->save();
        }
    }
    */
}
