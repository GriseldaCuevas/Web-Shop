@extends('admin.index');

@section('bloque')
	<div align="center">
		<table class="table table-striped">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Categoria</th>
				<th>Marca</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th><a href="/admin/productos/agregar">Nuevo</a></th>
			</tr>
			@foreach($productos as $producto)
				<tr class="row_producto{{$producto->id}}">
					<td>{{$producto->id}}</td>
					<td>{{$producto->nombre}}</td>
					<td>{{$producto->categoria}}</td>
					<td>{{$producto->marca}}</td>
					<td>{{$producto->cantidad}}</td>
					<td>{{number_format($producto->precio, 2, '.', ',')}}</td>
					<td>
						<a href="/admin/productos/editar/{{$producto->id}}">Editar</a>
						<span>&nbsp;|&nbsp;</span>
						<input type="hidden" id="token_delete" name="_token" value="{{ csrf_token() }}">
						<a href="#" onclick="eliminarProducto({{$producto->id}});">Eliminar</a>
					</td>
				</tr>
			@endforeach
		</table>
		{!!$productos->render()!!}
	</div>
@stop