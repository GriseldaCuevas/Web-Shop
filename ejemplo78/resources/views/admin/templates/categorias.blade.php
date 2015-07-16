@extends('admin.index')

@section('bloque')
<div align="center">
	<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th><a href="/admin/categorias/agregar">Nueva</a></th>
		</tr>
		@foreach($categorias as $categoria)
			<tr class="row_categoria{{$categoria->id}}">
				<td>{{$categoria->id}}</td>
				<td>{{$categoria->nombre}}</td>
				<td>
					<a href="/admin/categorias/editar/{{$categoria->id}}">Editar</a>
				</td>
			</tr>
		@endforeach
	</table>
	{!!$categorias->render()!!}
</div>
@stop