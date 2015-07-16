<!DOCTYPE html>

<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Administracion - Webshop</title>
		<link rel="stylesheet" type="text/css" href="http://localhost:8000/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="http://localhost:8000/css/admin.css"/>
	</head>
	<body>
		<section id="central">
			<div class="panel panel-default">
				<div class="panel-heading">Iniciar Sesion</div>
				<div class="panel-body">
					<form action="/admin/login" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<input type="text" name="usuario" class="form-control" placeholder="Usuario"/>
						</div>
						<div class="form-group">
							<input type="password" name="pass" class="form-control" placeholder="Contraseña"/>
						</div>
						<div class="form-group">
							<button class="btn btn-default">Entrar</button>
						</div>
					</form>
				</div>
			</div>
		</section>
		<script type="text/javascript">
			var error_login = false;
		</script>
		@if(Session::has('error_login'))
			<script type="text/javascript">
				error_login = true;
			</script>

			<div class="modal fade" id="error_login">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title">Inposible iniciar sesion.</h4>
			      </div>
			      <div class="modal-body">
			        <p>{{\Session::get('mensaje')}}.</p>
			      </div>
			      <div class="modal-footer"></div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		@endif
		<script type="text/javascript" src="http://localhost:8000/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="http://localhost:8000/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://localhost:8000/js/login_admin.js"></script>
	</body>
</html>