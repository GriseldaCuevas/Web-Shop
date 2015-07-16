$(document).on('ready', jquery);

function jquery(){
	if(producto_operacion)
		$('#producto_operacion').modal('show');
	
	if(categoria_operacion)
	$('#categoria_operacion').modal('show')
}

function eliminarProducto(id_producto){
	if(confirm("¿Quiere Eliminar este registro?")){	
		$.post(
			'http://localhost:8000/admin/productos/eliminar/',
			{
				id_producto: id_producto,
				_token: $('#token_delete').val()
			},
			function(json){
				if(json.validado){
					$('#producto_eliminado').modal('show');
					$('.row_producto' + id_producto).fadeOut();
				}
					
			},
			'json'
		);
	}
}