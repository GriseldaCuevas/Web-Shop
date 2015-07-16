<script type="text/javascript">
	var registro_exitoso=false;
</script>
@if(Session::has('registro_exitoso'))
<script type="text/javascript">
	var registro_exitoso=true;
</script>
<div class="modal fade" id="registro_validado" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="titulo_modal">Bienvenido</h4>
      		<span>
      			{{Session::get('mensaje')}} 
      		</span>
        </div>
    </div>
  </div>
</div>
@endif