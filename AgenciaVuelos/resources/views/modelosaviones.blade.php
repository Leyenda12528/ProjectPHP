@extends('plantilla')

@section('titulo','Modelos&Aviones')

@section('contenido')

<div class="divisiones">
	<div>
		<h2>Modelos</h2>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Editar</th>
					<th>Eliminar</th>
					<th>Características</th>
				</tr>
			</thead>
			<tbody id='tablaModelos'>
		    </tbody>
	    </table>
		<br>
		<div>
			<h2 id='mensajeModelo'></h2>
			<form id='formularioModelo'>
				@csrf
				@include('modelos.form')
				<button type="submit" class="btn btn-gold">Registrar</button>
			</form>
		</div>
	</div>{{-- Modelos --}}
	<div>
		<h2>Aviones</h2>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Modelo</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody id='tablaAviones'>
		    </tbody>
	    </table>
		<div>
			<h2 id='mensajeAvion'></h2>
			<form id='formularioAvion' class="form-group">
				@csrf
				@include('aviones.form')
				<button type="submit" class="btn btn-gold">Registrar</button>
			</form>
		</div>
	</div>{{-- Aviones --}}	
</div>
	
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
        	<div class="modelosModal">
        		<h2 id="mensajeEditarModelo"></h2>
        		<form id='formularioEditarModelo' class="form-group">
					@csrf
					@include('modelos.form')
					<button type="submit" class="btn btn-gold">Editar</button>
				</form>
        	</div>
        	<div class="cmModal">
        		<h2 id="mensajeEditarCM"></h2>
        		<form id='formularioEditarCM' class="form-group">
					@csrf
					@include('clasemodelo.form')
					<button type="submit">Editar</button>
				</form>
        	</div>
        	<div class="avionModal">
        		<h2 id='mensajeEditarAvion'></h2>
        		<form id='formularioEditarAvion'>
        			@include('aviones.form')
        			<button type="submit" class="btn btn-gold">Editar</button>
        		</form>
        	</div>
        </div>
      </div>
    </div>
  </div>
 



   <div class="modal fade" id="caracteristicas" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Características de <span id="modeloCMCarac"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<div class="modelosModal">
        		<h2 id="mensajeCM"></h2>
        		<form id='formularioCM'>
					@csrf
					@include('clasemodelo.form')
					<br>
					<button type="submit">Registrar</button>
				</form>
					<br>
        	</div>
        	<div>
        		<table class="table table-hover">
        			<thead>
        				<th>Clase</th>
        				<th>Capacidad</th>
        				<th>Editar</th>
        				<th>Eliminar</th>
        			</thead>
        			<tbody id="tablaCM"></tbody>
        		</table>
        	</div>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript" src='js/modelos/cargarModelos.js'></script>
<script type="text/javascript" src='js/modelos/crearModelo.js'></script>
<script type="text/javascript" src='js/modelos/editarModelo.js'></script>
<script type="text/javascript" src='js/modelos/eliminarModelo.js'></script>

<script type="text/javascript" src='js/clasemodelos/cargarCM.js'></script>
<script type="text/javascript" src='js/clasemodelos/crearCM.js'></script>
<script type="text/javascript" src='js/clasemodelos/editarCM.js'></script>
<script type="text/javascript" src='js/clasemodelos/eliminarCM.js'></script>

<script type="text/javascript" src="js/aviones/cargarAviones.js"></script>
<script type="text/javascript" src="js/aviones/crearAvion.js"></script>
<script type="text/javascript" src="js/aviones/editarAvion.js"></script>
<script type="text/javascript" src="js/aviones/eliminarAvion.js"></script>

<script type="text/javascript" src='/js/aviones/validar.js'></script>
<style type="text/css">
	.divisiones{
		display: grid;
		grid-template-columns: repeat(2,1fr);
		column-gap: 20px;
	}
	#caracteristicas .modal-dialog{
		overflow-y: initial !important; 
	}
	#caracteristicas .modal-body{
		height: 500px;
		overflow-y: auto; 
	}
</style>
@endsection	
