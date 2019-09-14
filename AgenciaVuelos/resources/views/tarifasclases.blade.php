@extends('plantilla')

@section('titulo','Clases&Tarifas')

@section('contenido')

<div class="divisiones">
	<div>
		<h2>Clases</h2>
		<table class='table table-hover'>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody id='tablaClases'>
		    </tbody>
	    </table>
		<br>
		<div>
			<h2 id='mensajeClase'></h2>
			<form id='formularioClase' class='form-group'>
				@csrf
				@include('clases.form')
				<button type="submit" id='buttonClase'>Registrar</button>
			</form>
		</div>
	</div>{{-- Clases --}}
	<div>
		<h2>Tarifas</h2>
		<table class='table table-hover'>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody id='tablaTarifas'>
		    </tbody>
	    </table>
		<br>
		<div>
			<h2 id='mensajeTarifa'></h2>
			<form id='formularioTarifa' class='form-group'>
				@csrf
				@include('tarifas.form')
				<button type="submit" id='buttonTarifa'>Registrar</button>
			</form>
		</div>
	</div>{{-- Tarifas --}}

	<div>
		<h2>Relaciones clases y tarifas</h2>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Clase</th>
					<th>Tarifa</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody id="tablaClaseTarifa">
				
			</tbody>
		</table>
			<br>
			<div>
				<h2 id='mensaject'></h2>
				<form id='formularioct' class='form-group'>
					@include('clasetarifa.form')
					<button type="submit" id='buttonct'>Registrar</button>
				</form>
			</div>
		
	</div>

	
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
        	<div class="tarifasModal">
        		<h2 id="mensajeEditarTarifa"></h2>
        		<form id='formularioEditarTarifa' class='form-group'>
					@csrf
					@include('tarifas.form')
					<button type="submit" id='buttonEditarTarifa'>Editar</button>
				</form>
        	</div>
        	<div class="clasesModal">
        		<h2 id="mensajeEditarClase"></h2>
        		<form id='formularioEditarClase' class='form-group'>
					@csrf
					@include('clases.form')
					<button type="submit" id='buttonEditarClase'>Editar</button>
				</form>
        	</div>
        	<div class="ctModal">
        		<h2 id='mensajeEditarct'></h2>
        		<form id='formularioEditarCT' class='form-group'>
        			@include('clasetarifa.form')
        			<button type="submit">Editar</button>
        		</form>
        	</div>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript" src='/js/tarifas/cargarTarifas.js'></script>
<script type="text/javascript" src='/js/tarifas/crearTarifa.js'></script>
<script type="text/javascript" src='/js/tarifas/eliminarTarifa.js'></script>
<script type="text/javascript" src='/js/tarifas/editarTarifa.js'></script>

<script type="text/javascript" src='/js/clases/cargarClases.js'></script>
<script type="text/javascript" src='/js/clases/crearClase.js'></script>
<script type="text/javascript" src='/js/clases/eliminarClase.js'></script>
<script type="text/javascript" src='/js/clases/editarClase.js'></script>

<script type="text/javascript" src='/js/clasestarifas/cargar.js'></script>	
<script type="text/javascript" src='/js/clasestarifas/crear.js'></script>	
<script type="text/javascript" src='/js/clasestarifas/eliminar.js'></script>	
<script type="text/javascript" src='/js/clasestarifas/editar.js'></script>	

<script type="text/javascript" src='/js/clasestarifas/validar.js'></script>
<style type="text/css">
	.divisiones{
		display: grid;
		grid-template-columns: repeat(3,1fr);
		grid-column-gap: 20px;
	}
</style>
@endsection	

