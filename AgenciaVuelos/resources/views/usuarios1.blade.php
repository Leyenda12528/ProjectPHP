@extends('plantilla')

@section('titulo','Usuarios')

@section('contenido')

<div class="tablas one-table">
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
					<th>Email</th>
					<th>Tarjeta</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody id='tablaUsuario'>
				<tr v-for="user of users">
					<th>@{{user.name}}</th>
					<th>@{{user.email}}</th>
					<th>@{{user.tarjeta}}</th>
					<th>
						<div v-on:click="seguro(user)" class="btn btn-danger rounded-circle text-white" >
							<i class="fas fa-pen"></i>
						</div>
					</th>
				</tr>
		    </tbody>
		</table>
		<!-- Elminiar -->
		<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="ediLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ediLabel">Eiminar Cliente: @{{selected.name}}
                  	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    	<span aria-hidden="true">&times;</span>
                  	</button>
				</div>
				<div class="modal-body">
					¿ Esta seguro de eliminar a este cliente de forma permanente?
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger" v-on:click="eliminar">Aceptar</button>
					<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
			</div>
		</div>
		<form id="formu">
			<input type="hidden" id="token" name="_token" id="csrf-token" value="{{ Session::token() }}" />
		</form>
		<!-- Fin Elminiar -->
    </div>
  

</div>
</div>
<script src="https://kit.fontawesome.com/18e33f708d.js" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
 <script src="js/tools/users.js"></script>
		
@endsection	

