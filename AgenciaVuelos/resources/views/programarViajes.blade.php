@extends('plantilla')

@section('titulo','Programar vuelos')

@section('contenido')
	<div>
		<h2>Programar vuelos</h2>
		<div>
			<h2 id='mensajeVuelo'></h2>
			<div class="container">
				<form id='formularioVuelo'>
					@csrf
					@include('vuelos.form')
					<button type="submit">Registrar</button>
				</form>
			</div>

		</div>
		<br><br>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Id vuelo</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Ruta</th>
					<th>Avión</th>
					<th>Editar</th>
					<th>Eliminar</th>
					<th>Tarifas</th>
					<th>Disponibilidad</th>
				</tr>
			</thead>
			<tbody id='tablaVuelos'>
		    </tbody>
	    </table>
		<br>
	</div>{{-- Vuelos --}}

  <div class="modal fade" id="addPokemon" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<div class="vuelosModal">
        		<h2 id="mensajeEditarVuelo"></h2>
        		<form id='formularioEditarVuelo' class="form-group">
					@csrf
					@include('vuelos.form')
					<button type="submit">Editar</button>
				</form>
        	</div>
        </div>
      </div>
    </div>
  </div>
 
   <div class="modal fade" id="tarifas" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tarifas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<div class="tarifasModal">
        		<h2 id="mensajeTarifa"></h2>
        		<form id='formularioTarifa'>
					@csrf
					@include('vuelos.tarifas.form')
					<button type="submit">Registrar</button>
				</form>
				<br>
        	</div>
        	<div>
        		<table class="table table-hover">
        			<thead>
        				<th>Clase/Tarifa</th>
        				<th>Eliminar</th>
        			</thead>
        			<tbody id="tablaTarifas"></tbody>
        		</table>
        	</div>
        </div>
      </div>
    </div>
  </div>

    <div class="modal fade" id="disponibilidad" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Disponibilidad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<div>
        		<table class="table table-hover">
        			<thead>
        				<th>Clase</th>
        				<th>Disponibles</th>
        			</thead>
        			<tbody id="tablaDisponibilidad"></tbody>
        		</table>
        	</div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript" src = "js/vuelos/cargarVuelos.js"></script>
<script type="text/javascript" src = "js/vuelos/crearVuelo.js"></script>
<script type="text/javascript" src = "js/vuelos/editarVuelo.js"></script>
<script type="text/javascript" src = "js/vuelos/eliminarVuelo.js"></script>

<script type="text/javascript" src = "js/vuelos/tarifas/cargarTarifas.js"></script>
<script type="text/javascript" src = "js/vuelos/tarifas/crearTarifa.js"></script>
<script type="text/javascript" src = "js/vuelos/tarifas/eliminarTarifa.js"></script>

<script type="text/javascript" src = "js/disponibilidad/cargarDisponibilidad.js"></script>

<script type="text/javascript" src="js/vuelos/validar.js"></script>

<style type="text/css">
	#tarifas .modal-dialog, #addPokemon .modal-dialog{
		overflow-y: initial !important; 
	}
	#tarifas .modal-body, #addPokemon .modal-body{
		height: 500px;
		overflow-y: auto; 
	}
</style>
@endsection	
