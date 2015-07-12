<script type="text/javascript">
	var error_login = false;
	var error_registro = false;
</script>

@if(Session::has('error_login'))
	<script type="text/javascript">
		error_login = true
	</script>
	<!-- Modal -->
	<div class="modal fade" id="error_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Imposible Iniciar Sesion</h4>
	      </div>
	      <div class="modal-body">
	        El usuario no existe o la contraseña es incorrecta.
	      </div>
	    </div>
	  </div>
	</div>
@endif

@if(Session::has('error_registro'))
	<script type="text/javascript">
		error_registro = true
	</script>
	<!-- Modal -->
	<div class="modal fade" id="error_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Imposible registrar usuario.</h4>
	      </div>
	      <div class="modal-body">
	        {{Session::get('mensaje')}}
	      </div>
	    </div>
	  </div>
	</div>
@endif