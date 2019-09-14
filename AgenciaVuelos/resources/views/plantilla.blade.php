<!DOCTYPE html>
<html>
<head>
	<title>@yield('titulo')</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body id='body'>
	<nav class="navbar navbar-expand-lg navbar-ligth">
		<a class="navbar-brand" href="http://127.0.0.1:8000/clasetarifa">Clases/Tarifas</a>
		<a class="navbar-brand" href="http://127.0.0.1:8000/rutas">Ciudades/Rutas</a>
		<a class="navbar-brand" href="http://127.0.0.1:8000/aviones">Aviones</a>
		<a class="navbar-brand" href="http://127.0.0.1:8000/viajes">Programar vuelos</a>	
	</nav>
	<br>

	@yield('contenido')
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>