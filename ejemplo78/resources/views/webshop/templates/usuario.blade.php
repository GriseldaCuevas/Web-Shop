@extends('webshop.index')

@section('bloque')
	<div class="panel-body" id="lista_carrito">
		<div width="100%">
			<h2>{{Session::get('usuario')}}</h2>
			<h4 align="right">Saldo actual: <label id="total_compra">${{number_format(\Session::get('saldo'), 2, '.', ',')}}</label> MXN <button class="btn btn-success" onclick="actualizarSaldo();">Actualizar saldo</button></h4>
		</div>
		<div width="100%" style="overflow: auto; height: 745px; padding: 1em;">
			<table class="table table-striped" width="100%">
				<tr>
					<th>ID</th>
					<th>Fecha</th>
					<th>Articulos</th>
					<th>Monto</th>
					<th></th>
				</tr>
				@foreach($ventas as $venta)
					<tr>
						<td>{{$venta->id}}</td>
						<td>{{date('d-m-Y | H:i:s', strtotime($venta->fecha))}}</td>
						<td>{{$venta->articulos}}</td>
						<td>{{$venta->total}}</td>
						<td>
							<form action="http://localhost:8000/historial" method="post" id="formu">
								<input type="hidden" id="id_venta" name="id_venta" value="">
								<input type="hidden" id="token_historial" name="_token" value="{{ csrf_token() }}">
								<a href="#" onclick="listarProductosVenta({{$venta->id}})">Ver</a>
							</form>
							<span>&nbsp;|&nbsp;</span>
							<form action="http://localhost:8000/facturar" method="post" id="formu2">
								<input type="hidden" id="id_venta2" name="id_venta" value="">
								<input type="hidden" id="token_factura" name="_token" value="{{ csrf_token() }}">
								<a href="#" onclick="factura({{$venta->id}})" targey="_blank">factura</a>
							</form>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
	<div class="modal fade" id="actualizar_saldo">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Actualizacion de saldo.</h4>
	      </div>
	      <div class="modal-body">
	        <form action="/saldo" method="post" align="center">
	        	<input type="hidden" id="token_carrito" name="_token" value="{{ csrf_token() }}">
	        	<div class="form-group">
	        		<input type="text" name="tarjeta" class="form-control" placeholder="Numero de tarjeta"/>
	        	</div>
	        	<div class="form-group">
	        		<input type="text" name="saldo" class="form-control" placeholder="Saldo a cargar"/>
	        	</div>
	        	<div class="form-group">
	        		<button type="reset" class="btn btn-default">Borrar</button>
	        		<span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
	        		<button type="submit" class="btn btn-primary">Cargar Saldo</button>
	        	</div>
	        </form>
	      </div>
	      <div class="modal-footer"></div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@stop