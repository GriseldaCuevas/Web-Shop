@extends('webshop.index')

@section('bloque')
		<div class="panel-body">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img class="imagen-carrusel" src="http://localhost:8000/img/carrusel/play_station4.jpg" alt="Increible play 4">
			      <div class="carousel-caption">
			        Increible play 4
			      </div>
			    </div>
			    <div class="item">
			      <img class="imagen-carrusel" src="http://localhost:8000/img/carrusel/xbox_one.jpg" alt="un xbox one">
			      <div class="carousel-caption">
			        un xbox one"
			      </div>
			    </div>
			    <div class="item">
			      <img class="imagen-carrusel" src="http://localhost:8000/img/carrusel/wiiu.jpg" alt="pgsafdwfasdf">
			      <div class="carousel-caption">
			        pgsafdwfasdf
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
	</section>
@stop