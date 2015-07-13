@extends('webshop.index')

@section('bloque')
	<div class="bloque panel-body">
		<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
		@foreach($productos as $producto)
			<article class="col-md-2 categorias">
				<a href="#" onclick="getProducto({{$producto->id}});">
					<img class="img-thumbnail" alt="{{$producto->nombre}}" style="width: 200px; height: 200px;" src="http://localhost:8000/img/productos/{{$producto->img}}">
				</a>
				<h5><a href="#" onclick="getProducto({{$producto->id}});">{{$producto->nombre}}</a><span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;</span>${{$producto->precio}}</h5>	
			</article>
		@endforeach
	</div>
	<div class="bloque">
		{!!$productos->render()!!}
	</div>
@stop