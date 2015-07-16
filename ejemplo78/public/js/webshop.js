$(document).on('ready', jquery);

function jquery(){
	if(error_login)
		$('#error_login').modal('show');

	if(error_registro)
		$('#error_registro').modal('show');

	if(error_compra)
		$('#error_compra').modal('show');

	if(error_actualizar_saldo)
		$('#error_actualizar_saldo').modal('show');

	if(muestra_lista)
		$('#lista_productos_venta').modal('show');
	if(registro_exitoso)
		$('#registro_validado').modal('show');
	if(compra_realizada)
		$('#compra_realizada').modal('show');
}

function getProducto(id_producto){
	var list = '';
	var titulo = ''

	$('.quitar').remove();
	$.post(
		'http://localhost:8000/producto',
		{
			id_producto: id_producto,
			_token: $('#_token').val()
		},
		function(json){
			if(json.validado){
				titulo = json.producto.marca + '  -  ' + json.producto.nombre;
				list += '<li class="list-group-item quitar">Nombre: ' + json.producto.nombre + '</li>'
					+ '<li class="list-group-item quitar">Marca: ' + json.producto.marca + '</li>'
					+ '<li class="list-group-item quitar">Precio: $' + json.producto.precio + ' MNX</li>'
					+ '<li class="list-group-item quitar">Categoria: ' + json.producto.categoria + '</li>';
				$('#imagen_modal').attr('src', 'http://localhost:8000/img/productos/' + json.producto.img);
				$('#info_producto').prepend(list);
				$('#id_producto_modal').val(json.producto.id);
				$('#titulo_modal').text(titulo);
				$('#producto_dialogo').modal('show');		
			}
		},
		'json'
	);
}

function agregarACarrito(){
	$.post(
		'http://localhost:8000/producto/agregar',
		{
			id_producto: $('#id_producto_modal').val(),
			_token: $('#_token').val()
		},
		function(json){
			if(json){
				$('#producto_dialogo').modal('hide');
				$('#poner_carrito').modal('show');
			}	
		},
		'json'
		

	);
}

function quitarProductoDeCarrito(id_producto){
	$.post(
		'http://localhost:8000/producto/quitar',
		{
			id_producto: id_producto,
			_token: $('#token_carrito').val()
		},
		function(json){
			if(json.validado){
				$('#quitar_carrito').modal('show');
				$('#total_compra').text(json.total);
				$('.carrito' + id_producto).fadeOut();

			}
		},
		'json'
	);
}

function actualizarSaldo(){
	$('#actualizar_saldo').modal('show');
}

function listarProductosVenta(id_venta){
	$('#id_venta').val(id_venta);
	$('#formu').submit();
}

function factura(id_venta){
	$('#id_venta2').val(id_venta);
	$('#formu2').submit();
}