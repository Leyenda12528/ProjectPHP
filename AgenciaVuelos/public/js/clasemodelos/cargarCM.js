let formularioCM =document.querySelector("#formularioCM");
let formularioEditarCM =document.querySelector("#formularioEditarCM");
let mensajeCM = document.querySelector("#mensajeCM");
let mensajeEditarCM = document.querySelector("#mensajeEditarCM");
let tablaCM = document.querySelector("#tablaCM");
let modeloCMCarac = document.querySelector("#modeloCMCarac");
let modeloCMR = '';
let claseCME = '';
let capacidadCME = 0;
let idCM = 0;




function cargarCM(){
	formularioCM.reset();
	let dataCM = new FormData();
	dataCM.append('modelo',modeloCMR)
	fetch('http://127.0.0.1:8000/clasemodelos/relaciones',{
		method: 'POST',
		headers:{
			'X-Requested-With': 'XMLHttpRequest',
			'X-CSRF-TOKEN': _token[0].defaultValue
		},
		body: dataCM
	})
	.then(res => res.json())
	.then(cm =>{
		tablaCM.innerHTML = ''
		cm.forEach(function(element){
			tablaCM.innerHTML+=`
				<tr data-id=${element.id}>
					<td>${element.clase}</td>
					<td>${element.capacidad}</td>
					<td><button type="button" class="btn btn-primary top-space"data-toggle="modal" data-target="#addPokemon"">Editar</button></td>
					<td><button class="btn btn-danger">Eliminar</button></td>

				</tr>

			`
		})
	})

}