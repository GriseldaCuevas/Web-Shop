<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// rutas del sitio webshop
// ruta a la raiz
Route::get('/', function() {
    return view('webshop.templates.carrusel');
});

// rutas para el trabajo de usauarios
Route::post('/login', 'UsuarioController@login');
Route::post('/registro', 'UsuarioController@registro');
Route::get('/logout', 'UsuarioController@logout');
Route::get('/perfil', 'UsuarioController@perfil');
Route::post('/saldo', 'UsuarioController@actualizarSaldo');
Route::post('/historial', 'UsuarioController@listarArticulosCompra');
Route::post('/facturar', 'UsuarioController@facturar');

// rutas de categorias
Route::get('/categorias', 'CategoriaController@index');
// Route::get('/guardar', 'CategoriaController@insert');

// rutas de productos
Route::get('/categorias/{id_categoria}/productos', 'ProductoController@index');
Route::get('/productos/buscar', 'ProductoController@buscar');
Route::post('/producto', 'ProductoController@getProducto');
Route::get('/marcas/{marca}', 'ProductoController@getProductosMarca');
Route::get('/categorias/{categoria}', 'ProductoController@getProductosCategoria');
//Route::get('/guardar', 'ProductoController@insert');

// rutas de carrito de compras
Route::get('/carrito', 'CarritoController@index');
Route::post('/producto/agregar', 'CarritoController@agregarACarrito');
Route::post('/producto/quitar', 'CarritoController@quitarACarrito');
Route::post('/comprar', 'CarritoController@comprar');


// rutas del sitio de administracion
// ruta a la raiz del sitio
Route::get('/admin', function() {
    return view('admin.login');
});
Route::get('/admin/inicio', function(){
	$tipo_busqueda = 'productos';
	return view('admin.index', compact('tipo_busqueda'));
});

// rutas para los productos
Route::post('/admin/login', 'AdminController@login');
Route::get('/admin/logout', 'AdminController@logout');
Route::get('/admin/productos', 'ProductoController@getProductos');
Route::get('/admin/productos/buscar', 'ProductoController@buscarProducto');
Route::get('/admin/productos/editar/{id_producto}', 'ProductoController@editar');
Route::post('/admin/productos/editar', 'ProductoController@guardar');
Route::post('/admin/productos/eliminar', 'ProductoController@eliminar');
Route::get('/admin/productos/agregar', 'ProductoController@agregar');
Route::post('/admin/productos/registrar', 'ProductoController@guardar');

// rutas para las categorias
Route::get('/admin/categorias', 'CategoriaController@getCategorias');
Route::get('/admin/categorias/buscar', 'CategoriaController@buscarCategoria');
Route::get('/admin/categorias/editar/{id_categoria}', 'CategoriaController@editar');
Route::post('/admin/categorias/editar', 'CategoriaController@guardar');
Route::get('/admin/categorias/agregar', 'CategoriaController@agregar');
Route::post('/admin/categorias/registrar', 'CategoriaController@guardar');