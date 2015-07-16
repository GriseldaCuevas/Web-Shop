<!DOCTYPE html>

<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title></title>
		<style type="text/css">

		</style>
	</head>
	<body>
		<div width="100%">
			<h3 align="center">Factura de Webshop</h3>
			<h4 align="center">Compras realizadas por {{Session::get('usuario')}}</h4>
			<h5 align="center">{{date('d/m/Y - H:i:s', strtotime($productos[0]->fecha))}}</h5>
		</div>
		<table class="" width="100%">
    		@foreach($productos as $producto)
				<tr>
					<td>{{$producto->nombre}}</td>
					<td>{{date('d/m/Y - H:i:s', strtotime($producto->fecha))}}</td>
					<td>{{$producto->marca}}</td>
					<td>{{$producto->categorias_nombre}}</td>
					<td>{{$producto->precio}}</td>
				</tr>
			@endforeach
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>Total:</td>
				<td>{{$productos[0]->total}}</td>
			</tr>
		</table>
	</body>
</html>