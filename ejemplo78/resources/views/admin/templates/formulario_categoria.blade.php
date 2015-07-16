@extends('admin.index')

@section('bloque')
	<form method='post' action="/admin/categorias/{{$tipo}}" enctype="multipart/form-data">
		<label>{{$tipo}} categoria</label>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="operacion" value="{{$operacion}}"/>
		<input type="hidden" name="id_categoria" value="{{isset($categoria) ? $categoria->id : ''}}"/>
		<table class="table table-striped" width="80%">
			<tr>
				<td>
					<input type="text" name="nombre" class="form-control" value="{{isset($categoria) ? $categoria->nombre : ''}}" placeholder="Nombre de la Categoria"/>
				</td>
				<td>
					<input type="file" name="img" class="form-control"/>
				</td>
			</tr>
			<tr>
				<td></td>
				<td align="right">
					<button type="reset" class="btn btn-default">Borrar</button>
					<span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</td>
			</tr>
		</table>
	</form>
@stop