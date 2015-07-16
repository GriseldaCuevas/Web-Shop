<div class="modal fade" id="producto_dialogo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="titulo_modal"></h4>
      	<div id="producto_modal" class="">
      		<div class="panel-body info_modal_producto">
      			<img class="img-thumbnail" id="imagen_modal" alt="" style="width: 300px; height: 300px;" src="">
      		</div>
			<div class="panel-body info_modal_producto">
				<ul id="info_producto" class="list-group">
					<li class="list-group-item">
						@if(Session::has('logeado'))
			        		<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
			        		<input type="hidden" id="id_producto_modal" name="id" value="">
			        		<button type="submit" class="btn btn-primary" onclick="agregarACarrito();">Añadir al carrito</button>
				        @else
				        	Solo usuarios registrados pueden comprar.
				        @endif
			        </li>
				</ul>
			</div>
        </div>
    </div>
  </div>
</div>