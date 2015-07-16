<!-- Modal -->
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      	<div id="login">
		        	<form action="/login" method="post">
		        		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		        		<legend>Iniciar Sesion</legend>
		        		<div class="form-group">
		        			<input type="text" class="form-control" name="usuario" placeholder="Nombre de usuario"/>
		        		</div>
		        		<div class="form-group">
		        			<input type="password" class="form-control" name="pass" placeholder="Contraseña"/>
		        		</div>
		        		<div class="form-group">
		        			<button type="submit" class="btn btn-default">Entrar</button>
		        		</div>
		        	</form>
		        </div>
		        <div id="registro">
		        	<form action="/registro" method="post">
		        		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		        		<legend>Registrate</legend>
		        		<div class="form-group">
		        			<input type="text" class="form-control" name="nombre" placeholder="Nombre"/>
		        		</div>
		        		<div class="form-group">
		        			<input type="text" class="form-control" name="usuario" placeholder="Nombre de usuario"/>
		        		</div>
		        		<div class="form-group">
		        			<input type="password" class="form-control" name="pass1" placeholder="Contraseña"/>
		        		</div>
		        		<div class="form-group">
		        			<input type="password" class="form-control" name="pass2" placeholder="Repetir contraseña"/>
		        		</div>
		        		<div>
		        			<input type="text" class="form-control" name="tarjeta" placeholder="Numero de tarjeta"/>
		        		</div>
		        		<div>
		        			<input type="text" class="form-control" name="codigo_postal" placeholder="Codigo Postal"/>
		        		</div>
		        		<div class="form-group">
		        			<button type="submit" class="btn btn-default">Registrar</button>
		        		</div>
		        	</form>
		        </div>
		    </div>
		  </div>
		</div>