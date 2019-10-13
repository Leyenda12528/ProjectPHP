@extends('plantilla')

@section('titulo','Ciudades&Rutas')

@section('contenido')
<div class="forms">
    <div class="divisiones">
    <div>
        <div class="widgets">
        <h3>Usuarios</h3>
<p class="number" id="user"></p>
</div>
    </div>
    <div>
        
        <div class="widgets">
        <h3>Vuelos</h3>
<p class="number" id="vuelo"></p>
</div>
    </div>
    <div>
        
        <div class="widgets">
        <h3>Aviones</h3>
<p class="number" id="avion"></p>
</div>
    </div>
    </div>
</div>

<div class="tablas flex">
    <div class="extras">
<div class="cal">
<p class="dia">
DOM
</p>
<p class="fecha">02</p>
<p class="mes">Oct</p>
</div>
<div class="clock">
    <p class="time">2:16 <span>pm</span></p>
</div>
</div>
<div class="video">
    <video src="img/planes.mp4" controls></video>
</div>

</div>

<script type="text/javascript" src = "js/home/cargarHome.js"></script>

@endsection	

