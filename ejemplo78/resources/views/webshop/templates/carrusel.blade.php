@extends('webshop.index')

@section('bloque')
		<div class="panel-body">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img class="imagen-carrusel" src="http://localhost:8000/img/carrusel/1.jpg" alt="Pantallas">
			      <div class="carousel-caption">
			        Pantallas
			      </div>
			    </div>
			    <div class="item">
			      <img class="imagen-carrusel" src="http://localhost:8000/img/carrusel/2.jpg" alt="un xbox one">
			      <div class="carousel-caption">
			        Home Theater
			      </div>
			    </div>
			    <div class="item">
			      <img class="imagen-carrusel" src="http://localhost:8000/img/carrusel/3.jpg" alt="Laptops">
			      <div class="carousel-caption">
			        videojuegos
			      </div>
			    </div>
			    <div class="item">
			      <img class="imagen-carrusel" src="http://localhost:8000/img/carrusel/4.jpg" alt="pgsafdwfasdf">
			      <div class="carousel-caption">
			        Laptops
			      </div>
			    </div>
			  </div>
			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
	</div>
@stop