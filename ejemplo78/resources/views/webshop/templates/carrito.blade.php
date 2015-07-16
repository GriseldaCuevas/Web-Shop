@extends('webshop.index')

@section('bloque')
	<div class="panel-body" id="lista_carrito">
		<div width="100%">
			<h2>Carrito de compras</h2>
			<form action="/comprar" method="post" style="text-align: right">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<h4>Total: <label id="total_compra">${{number_format(Session::get('total_compra'), 2, '.', ',')}}</label> MXN <button type="submit" class="btn btn-success">Realizar Compra</button></h4>
			</form>
		</div>
		</div>
		<input type="hidden" id="token_carrito" name="_token" value="{{ csrf_token() }}">
		<table class="table table-striped" width="100%">
			@foreach(Session::get('carrito') as $seleccion)
				<tr class="carrito{{$seleccion->id}}">
					<td>
						<img class="img-thumbnail" alt="{{$seleccion->nombre}}" style="width: 50px; height: 50px;" src="http://localhost:8000/img/productos/{{$seleccion->img}}">
					</td>
					<td>{{$seleccion->nombre}}</td>
					<td>{{$seleccion->marca}}</td>
					<td>{{$seleccion->categoria}}</td>
					<td>{{$seleccion->precio}}</td>
					<td><a href="#" onclick="quitarProductoDeCarrito({{$seleccion->id}})">Quitar</a></td>
				</tr>
			@endforeach
		</table>
	</div>
@stop