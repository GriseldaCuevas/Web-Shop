@extends('admin.index')

@section('bloque')
	<form method='post' action="/admin/productos/{{$tipo}}" enctype="multipart/form-data">
		<label>{{$tipo}} Producto</label>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="operacion" value="{{$operacion}}"/>
		<input type="hidden" name="id_producto" value="{{isset($producto) ? $producto->id : ''}}"/>
		<table class="table table-striped" width="80%">
			<tr>
				<td align="center">Nombre:</td>
				<td>
					<input type="text" name="nombre" class="form-control" value="{{isset($producto) ? $producto->nombre : ''}}" placeholder="Nombre del Producto"/>
				</td>
				<td align="center">Categoria:</td>
				<td>
					<select name="categoria" class="form-control">
						<option value="0">(Seleccione una categoria)</option>
						@foreach($categorias as $categoria)
							<option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<td align="center">Marca:</td>
				<td>
					<input type="text" name="marca" class="form-control" value="{{isset($producto) ? $producto->marca : ''}}" placeholder="Marca"/>
				</td>
				<td align="center">Precio:</td>
				<td>
					<input type="text" name="precio" class="form-control" value="{{isset($producto) ? $producto->precio : ''}}" placeholder="Precio"/>
				</td>
			</tr>
			<tr>
				<td align="center">Cantidad:</td>
				<td>
					<input type="text" name="cantidad" class="form-control" value="{{isset($producto) ? $producto->cantidad : ''}}" placeholder="Cantidad"/>
				</td>
				<td align="center">Imagen:</td>

				<td>
					<input type="file" name="img" class="form-control"/>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
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