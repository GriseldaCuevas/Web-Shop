<!DOCTYPE html>

<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Administracion - Webshop</title>
		<script type="text/javascript" src="http://localhost:8000/js/jquery-2.1.4.min.js"></script>

		<link rel="stylesheet" type="text/css" href="http://localhost:8000/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="http://localhost:8000/css/admin.css"/>
	</head>
	<body>
		<section id="orte">
			@include('admin.templates.nav')
		</section>
		<section id="oeste" class="panel panel-default">
			<div class="panel-body">
				<ul class="list-group">
					<li class="list-group-item"><a href="/admin/productos">Gestionar Productos</a></li>
					<li class="list-group-item"><a href="/admin/categorias">Gestionar Categorias</a></li>
				</ul>
			</div>
		</section>
		<section id="este" class="panel panel-default">
			<div class="panel-body">
				@yield('bloque')
			</div>
		</section>
		<section id="sur">
			<footer>
				<h4>WebShop&copy;</h4>
			</footer>
		</section>
		@include('admin.templates.mensajes_admin')
				<script type="text/javascript" src="http://localhost:8000/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://localhost:8000/js/admin.js"></script>

	</body>
</html>