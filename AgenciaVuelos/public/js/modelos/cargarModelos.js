window.onLoad = cargarModelos()
window.onLoad = cargarClases()

let selectClases = formularioCM.querySelector("#selectClases");
let selectClasesE = formularioEditarCM.querySelector("#selectClases");
let formularioAvion = document.querySelector("#formularioAvion");
let formularioEditarAvion = document.querySelector("#formularioEditarAvion");
let selectModelos = formularioAvion.querySelector("#selectModelos");
let selectEModelos = formularioEditarAvion.querySelector("#selectModelos");
function cargarClases(){
	fetch('http://127.0.0.1:8000/clases',{
		headers:{
			'X-Requested-With': 'XMLHttpRequest'			}
		})
	.then(res => res.json())
	.then(clases => {
		selectClases.innerHTML = ''
		clases.forEach(function(element){
			selectClases.innerHTML += `<option>${element.nombre}</option>`
			selectClasesE.innerHTML += `<option>${element.nombre}</option>`
		})
	})
}
//////////////////////////////////////////////////////////////////////////////////////////////

function cargarModelos(){
	fetch('http://127.0.0.1:8000/modelos',{
		headers:{
			'X-Requested-With': 'XMLHttpRequest'			}
		})
	.then(res => res.json())
	.then(modelos =>{
		tablaModelos.innerHTML = ''
		selectModelos.innerHTML = ''
		selectEModelos.innerHTML = ''
		modelos.forEach(function(element){
			tablaModelos.innerHTML += `
				<tr>
					<td>${element.nombre}</td>
					<td>${element.descripcion}</td>
					<td><button type="button" class="btn btn-primary top-space"data-toggle="modal" data-target="#addPokemon"">Editar</button></td>
					<td><button class="btn btn-danger">Eliminar</button></td>
					<td><button type="button" class="btn btn-success top-space"data-toggle="modal" data-target="#caracteristicas"">Características</button></td>
				</tr>
				`
				selectModelos.innerHTML += `<option value=${element.id}>${element.nombre}</option>`
				selectEModelos.innerHTML += `<option value=${element.id}>${element.nombre}</option>`
			})
		})

}