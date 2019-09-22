@extends('plantilla')

@section('titulo','Usuarios')

@section('contenido')


<div class="tablas">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Usuarios</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
		<table class='table table-hover'>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody id='tablaClases'>
                @foreach ($users as $users)
                    <tr>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->tarjeta}}</td>
                    </tr>
                @endforeach
		    </tbody>
        </table>
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
					<button type="submit" class="btn btn-gold" id='buttonEditarTarifa'>Editar</button>
				</form>
        	</div>
        	<div class="clasesModal">
        		<h2 id="mensajeEditarClase"></h2>
        		<form id='formularioEditarClase' class='form-group'>
					@csrf
					@include('clases.form')
					<button type="submit" id='buttonEditarClase' class="btn btn-gold">Editar</button>
				</form>
        	</div>
        	<div class="ctModal">
        		<h2 id='mensajeEditarct'></h2>
        		<form id='formularioEditarCT' class='form-group'>
        			@include('clasetarifa.form')
        			<button type="submit" class="btn btn-gold">Editar</button>
        		</form>
        	</div>
        </div>
      </div>
    </div>
  </div>
		
@endsection	

