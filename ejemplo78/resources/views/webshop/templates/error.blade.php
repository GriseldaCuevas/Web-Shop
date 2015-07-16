<script type="text/javascript">
	var error_login = false;
	var error_registro = false;
	var error_compra = false;
	var error_actualizar_saldo = false;
</script>

@if(Session::has('error_actualizar_saldo'))
	<script type="text/javascript">
		error_actualizar_saldo = true;
	</script>

	<div class="modal fade" id="error_actualizar_saldo">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Inposible recargar saldo.</h4>
	      </div>
	      <div class="modal-body">
	        <p>{{Session::get('mensaje')}}</p>
	      </div>
	      <div class="modal-footer"></div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@endif

@if(Session::has('error_compra'))
	<script type="text/javascript">
		error_compra = true;
	</script>

	<div class="modal fade" id="error_compra">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Inposible realizar la compra.</h4>
	      </div>
	      <div class="modal-body">
	        <p>No cuenta con el saldo suficiente para realizar la compra, favor de actualizar su saldo.</p>
	      </div>
	      <div class="modal-footer"></div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@endif

@if(Session::has('error_login'))
	<script type="text/javascript">
		error_login = true;
	</script>

	<div class="modal fade" id="error_login">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Inposible iniciar sesion.</h4>
	      </div>
	      <div class="modal-body">
	        <p>La cuenta no exite o los datos no son correctos.</p>
	      </div>
	      <div class="modal-footer"></div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@endif

@if(Session::has('error_registro'))
	<script type="text/javascript">
		error_registro = true;
	</script>
	<!-- Modal -->
	<div class="modal fade" id="error_registro">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Inposible registrar la cuenta.</h4>
	      </div>
	      <div class="modal-body">
	        <p>{{Session::get('mensaje')}}</p>
	      </div>
	      <div class="modal-footer"></div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@endif