<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>WebShop</title>
		<link rel="stylesheet" type="text/css" href="http://localhost:8000/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="http://localhost:8000/css/webshop.css"/>
	</head>
	<body>
		<section id="norte">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="/">WebShop</a>
			    </div>
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <form action="/productos/buscar" method="get" class="navbar-form navbar-right" role="search">
			      	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			        <div class="form-group">
			          <input type="text" name="buscar" class="form-control" placeholder="Buscar en la tienda">
			        </div>
			        <button type="submit" class="btn btn-default">Buscar</button>
			      </form>
			      <ul class="nav navbar-nav navbar-right">
			      	<li><a href="/categorias">Categorias</a></li>
			      	@if(!Session::has('logeado'))
			        	<li><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">Iniciar Sesion</a></li>
					@else
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{session('usuario')}}<span class="caret"></span></a>
				            <ul class="dropdown-menu">
				            	<li><a href="/perfil">Mi Perfil</a></li>
				            	<li><a href="/carrito">Ver Carrito</a></li>
				            	<li><a href="/logout">Cerrar Sesion</a></li>
				          	</ul>
					    </li>
			        @endif
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		</section>

		<section id="oeste" class="panel panel-default">
			<div class="panel-body">
				<label>Marcas Reconocidas</label>
				<ul class="list-group">
					<li class="list-group-item"><a href="/marcas/Sony">Sony</a></li>
					<li class="list-group-item"><a href="/marcas/Microsoft">Microsoft</a></li>
					<li class="list-group-item"><a href="/marcas/Samsung">Samsung</a></li>
					<li class="list-group-item"><a href="/marcas/Dell">Dell</a></li>
					<li class="list-group-item"><a href="/marcas/Motorola">Motorola</a></li>
				</ul>
			</div>
			<hr/>
			<div class="panel-body">
				<label>Categorias Recomendadas</label>
				<ul class="list-group">
					<li class="list-group-item"><a href="/categorias/Computadoras">Computadoras</a></li>
					<li class="list-group-item"><a href="/categorias/Consolas">Consolas</a></li>
					<li class="list-group-item"><a href="/categorias/Videojuegos">Videojuegos</a></li>
					<li class="list-group-item"><a href="/categorias/Tablets">Tablets</a></li>
					<li class="list-group-item"><a href="/categorias/Celulares">Celulares</a></li>
				</ul>
			</div>
		</section>
		<section id="este" class="panel panel-default">
			@yield('bloque')
		</section>
		<section id="sur">
			<footer >
				<img src="http://localhost:8000/img/footer/1.png" alt="">
				<strong><h4>WebShop&copy;</h4></strong>
			</footer>
		</section>
		@include('webshop.templates.modal_lista_productos_venta')
		@include('webshop.templates.error')
		@include('webshop.templates.modal_login_registro')
		@include('webshop.templates.modal_producto')
		@include('webshop.templates.error')
		<script type="text/javascript" src="http://localhost:8000/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="http://localhost:8000/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://localhost:8000/js/webshop.js"></script>
	</body>
</html>