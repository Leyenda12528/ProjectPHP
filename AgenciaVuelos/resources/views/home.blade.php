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

<script type="text/javascript" src = "js/home/cargarHome.js"></script>

@endsection	

