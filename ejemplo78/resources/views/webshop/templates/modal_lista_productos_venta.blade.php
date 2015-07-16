<!-- Modal -->

	<script script="type/javascript">
			var muestra_lista = false; 
		</script>

	@if(\Session::has('muestra_lista'))
		<script script="type/javascript">
			var muestra_lista = true; 
		</script>

		<div class="modal fade" id="lista_productos_venta">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Lista de articulos.</h4>
		      </div>
		      <div class="modal-body">
		      	<table class="table table-striped" width="100%">
	        		@foreach(\Session::get('comprados_venta') as $producto)
						<tr>
							<td>
								<img class="img-thumbnail" alt="{{$producto->nombre}}" style="width: 50px; height: 50px;" src="http://localhost:8000/img/productos/{{$producto->img}}">
							</td>
							<td>{{$producto->nombre}}</td>
							<td>{{date('d/m/Y | H:i:s', strtotime($producto->fecha))}}</td>
							<td>{{$producto->marca}}</td>
							<td>{{$producto->categorias_nombre}}</td>
							<td>{{$producto->precio}}</td>
						</tr>
					@endforeach
				</table>
		      </div>
		      <div class="modal-footer"></div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	@endif