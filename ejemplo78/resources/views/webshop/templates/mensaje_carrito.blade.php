

<div class="modal fade" id="poner_carrito" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="titulo_modal"></h4>
      		<span id='poner_carrito'>
      		  El producto se ha añadido al carrito 
      		</span>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="quitar_carrito" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="titulo_modal"></h4>
          <span>
              El producto ha sido removido del carrito
          </span>
        </div>
    </div>
  </div>
</div>

<!-- mensaje para compra-->



    <script script="type/javascript">
      var compra_realizada = false; 
    </script>   
@if(Session::has('compra_realizada'))
 <script script="type/javascript">
    var compra_realizada = true; 
</script>
<div class="modal fade" id="compra_realizada" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="titulo_modal"></h4>
          <span>
              Compra realizada con exito.
          </span>
        </div>
    </div>
  </div>
</div>
@endif