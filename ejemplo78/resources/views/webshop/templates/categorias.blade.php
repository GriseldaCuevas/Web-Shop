@extends('webshop.index')

@section('bloque')
	<div class="bloque panel-body">
		@foreach($categorias as $categoria)
			<article class="col-md-2 categorias">
				<a href="/categorias/{{$categoria->id}}/productos">
					<img class="img-thumbnail" alt="{{$categoria->nombre}}" style="width: 200px; height: 200px;" src="http://localhost:8000/img/categorias/{{$categoria->img}}">
				</a>
				<h4><a href="/categorias/{{$categoria->id}}/productos">{{$categoria->nombre}}</a></h4>	
			</article>
		@endforeach
	</div>
	<div class="bloque">
		{!!$categorias->render()!!}
	</div>
@stop