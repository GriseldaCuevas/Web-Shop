<div class="modal fade" id="producto_eliminado" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="titulo_modal"></h4>
      		<span>
      			Producto eliminado.
      		</span>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var producto_operacion = false;
</script>
@if(Session::has('producto_operacion'))
<script type="text/javascript">
  var producto_operacion = true;
</script>
<div class="modal fade" id="producto_operacion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="titulo_modal"></h4>
          <span>
            {{Session::get('producto_operacion')}}
          </span>
        </div>
    </div>
  </div>
</div>
@endif

<script type="text/javascript">
  var categoria_operacion = false;
</script>
@if(Session::has('categoria_operacion'))
<script type="text/javascript">
  var categoria_operacion = true;
</script>
<div class="modal fade" id="categoria_operacion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="titulo_modal"></h4>
          <span>
            {{Session::get('categoria_operacion')}}
          </span>
        </div>
    </div>
  </div>
</div>
@endif

