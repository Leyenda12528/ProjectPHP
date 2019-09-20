<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>@yield('titulo')</title>
	<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:400,700,900|Merriweather:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="{{ asset('css/adminStyle.css') }}" rel="stylesheet">

</head>
<body id='body'>
	<nav id="menu" class="navbar navbar-expand-lg">
		<li class="navbar-brand logo"><a href="">ABBIANKKA</a></li>
		<li class="nav-item active"><a class="nav-link" href="http://127.0.0.1:8000/clasetarifa"><span class="icon"><img src="img/home.svg" alt=""></span>Inicio</a></li>
		<li class="nav-item"><a class="nav-link" href="http://127.0.0.1:8000/clasetarifa"><span class="icon"><img src="img/seat.svg" alt=""></span>Clases/Tarifas</a></li>
		<li class="nav-item"><a class="nav-link" href="http://127.0.0.1:8000/rutas"><span class="icon"><img src="img/route.svg" alt=""></span>Ciudades/Rutas</a></li>
		<li class="nav-item"><a class="nav-link" href="http://127.0.0.1:8000/aviones"><span class="icon"><img src="img/airplane.svg" alt=""></span>Aviones</a></li>
		<li class="nav-item"><a class="nav-link" href="http://127.0.0.1:8000/viajes"><span class="icon"><img src="img/passport.svg" alt=""></span>Programar vuelos</a>	</li>
		<li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
		 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
		 <span class="icon"><img src="img/exit.svg" alt=""></span>{{ __('Logout') }}</a>
		 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>	</li>
	</nav>
	<br>
<div class="contenido">
	@yield('contenido')
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/js.js"></script>
</body>
</html>