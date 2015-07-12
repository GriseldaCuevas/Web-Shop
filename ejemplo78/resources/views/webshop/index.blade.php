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
			      <a class="navbar-brand" href="#">WebShop</a>
			    </div>
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <form class="navbar-form navbar-right" role="search">
			      	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Buscar en la tienda">
			        </div>
			        <button type="submit" class="btn btn-default">Buscar</button>
			      </form>
			      <ul class="nav navbar-nav navbar-right">
			      	<li><a href="#">Categorias</a></li>
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
				<label>Marcas Reconocidad</label>
				<ul class="list-group">
					<li class="list-group-item"><a href="">Sony</a></li>
					<li class="list-group-item"><a href="">Microsoft</a></li>
					<li class="list-group-item"><a href="">Samsung</a></li>
					<li class="list-group-item"><a href="">Dell</a></li>
					<li class="list-group-item"><a href="">Motorola</a></li>
				</ul>
			</div>
			<hr/>
			<form>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="panel-body">
					<label>categoria</label>
					<ul class="list-group">
						<li class="list-group-item"><input type="checkbox" name="check"/>&nbsp;Electronica</li>
						<li class="list-group-item"><input type="checkbox" name="check"/>&nbsp;Electronica</li>
						<li class="list-group-item"><input type="checkbox" name="check"/>&nbsp;Electronica</li>
						<li class="list-group-item"><input type="checkbox" name="check"/>&nbsp;Electronica</li>
					</ul>
				</div>
				<div class="panel-body">
					<label>Rango de precios</label>
					<ul class="list-group">
						<li class="list-group-item"><input type="checkbox" name="check"/>&nbsp;1000-2000</li>
						<li class="list-group-item"><input type="checkbox" name="check"/>&nbsp;2000-3500</li>
						<li class="list-group-item"><input type="checkbox" name="check"/>&nbsp;3500-5000</li>
						<li class="list-group-item"><input type="checkbox" name="check"/>&nbsp;Mas de 5000</li>
					</ul>
				</div>
				<div class="panel-body">
					<button type="submit" class="btn btn-default">Buscar</button>
				</div>
			</form>
		</section>
		<section id="este" class="panel panel-default">
			@yield('bloque')
		</section>
		<section id="sur">
			<footer>
				<h4>WebShop&copy;</h4>
			</footer>
		</section>
		@include('webshop.templates.modal_login_registro')
		@include('webshop.templates.error');
		<script type="text/javascript" src="http://localhost:8000/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="http://localhost:8000/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://localhost:8000/js/webshop.js"></script>
	</body>
</html>