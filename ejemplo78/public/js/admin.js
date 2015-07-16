$(document).on('ready', jquery);

function jquery(){
	
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
				if(json.validado)
					$('.row_producto' + id_producto).fadeOut();
			},
			'json'
		);
	}
}