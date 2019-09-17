 	window.onLoad = cargarVuelos()
 	window.onLoad = cargarRutas()
 	let tablaVuelos = document.querySelector("#tablaVuelos")
 	let tablaDisponibilidad = document.querySelector("#tablaDisponibilidad")
 	let mensajeVuelo = document.querySelector("#mensajeVuelo")
 	let mensajeEditarVuelo = document.querySelector("#mensajeEditarVuelo")
 	let formularioVuelo = document.querySelector("#formularioVuelo")
 	let formularioEditarVuelo = document.querySelector("#formularioEditarVuelo")
 	let selectRutas = formularioVuelo.querySelector("#selectRutas")
 	let selectERutas = formularioEditarVuelo.querySelector("#selectRutas")
 	let selectAviones = formularioVuelo.querySelector("#selectAviones")
 	let selectEAviones = formularioEditarVuelo.querySelector("#selectAviones")
 	let inputFecha =  formularioVuelo.querySelector("#fecha")
 	let mensajeTarifa = document.querySelector("#mensajeTarifa")
 	let modal = document.querySelector("#addPokemon")
	let _token = document.getElementsByName('_token');

 	function cargarVuelos(){
 		fetch('http://127.0.0.1:8000/viajes/create',{
 			headers:{
 				'X-Requested-With' : 'XMLHttpRequest'
 			}
 		})
 		.then(res => res.json())
 		.then(data =>{
 			tablaVuelos.innerHTML = ''
 			data.forEach(function(element){
 				tablaVuelos.innerHTML += `
 					<tr>
 						<td>${element.viaje_id}</td>
 						<td>${element.fecha}</td>
 						<td>${element.hora}</td>
 						<td data-id=${element.ruta_id}>${element.ciudad_origen}/${element.ciudad_destino}</td>
 						<td data-id=${element.avion_id}>${element.avion}</td>
						<td><button type="button" class="btn btn-primary top-space"data-toggle="modal" data-target="#addPokemon"">Editar</button></td>
						<td><button class="btn btn-danger">Eliminar</button></td>
 						<td><button type="button" class="btn btn-success top-space"data-toggle="modal" data-target="#tarifas"">Tarifas</button></td>
 						<td><button type="button" class="btn btn-warning top-space"data-toggle="modal" data-target="#disponibilidad"">Disponibilidad</button></td>
 					</tr>
 				`
 			})
 		})
 	}

function cargarRutas() {
	fetch('http://127.0.0.1:8000/rutas/create',{
		headers:{
			'X-Requested-With' : 'XMLHttpRequest'
		}
	})
	.then(res=> res.json())
	.then(rutas =>{
		selectRutas.innerHTML = ''
		rutas.forEach(function(element) {
			selectRutas.innerHTML += `
				<option value=${element.id}>${element.ciudad_origen}/${element.ciudad_destino}</option>
			`
		})
	})
}

inputFecha.addEventListener('change',llenarSelectAviones)

function llenarSelectAviones(){
	let data = new FormData();
	data.append('fecha',inputFecha.value)
	cargarAviones(data)
}
function llenarSelectEAviones(fecha,avion){
	let data = new FormData();
	data.append('fecha',fecha)
	data.append('avion',avion)
	cargarAviones(data)
}

function cargarAviones(data) {

	fetch('http://127.0.0.1:8000/viajes/aviones',{
		method: 'POST',
		headers:{
			'X-Requested-With' : 'XMLHttpRequest',
			'X-CSRF-TOKEN': _token[0].defaultValue
		},
		body: data
	})
	.then(res => res.json())
	.then(data =>{
		if(modal.classList.contains('show')){
			data.forEach(function(element){
				selectEAviones.innerHTML += `<option value=${element.id}>${element.nombre}</option>`
			})
		}
		else{
			selectAviones.innerHTML = ''		
			data.forEach(function(element){
				selectAviones.innerHTML += `<option value=${element.id}>${element.nombre}</option>`
			})
		}
		
	})

}