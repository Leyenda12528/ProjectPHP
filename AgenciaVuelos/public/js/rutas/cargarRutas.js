window.onLoad = cargarRutas()

let tablaRutas = document.querySelector("#tablaRutas")
let mensajeRuta = document.querySelector("#mensajeRuta")
let mensajeEditarRuta = document.querySelector("#mensajeEditarRuta")

function cargarRutas() {
	fetch('http://127.0.0.1:8000/rutas/create',{
		headers:{
			'X-Requested-With' : 'XMLHttpRequest'
		}
	})
	.then(res=> res.json())
	.then(rutas =>{
		tablaRutas.innerHTML = ''
		rutas.forEach(function(element) {
			tablaRutas.innerHTML += `
				<tr data-id=${element.id}>
					<td>${element.ciudad_origen}</td>
					<td>${element.ciudad_destino}</td>
					<td><button type="button" class="btn btn-primary top-space"data-toggle="modal" data-target="#addPokemon"">Editar</button></td>
					<td><button class="btn btn-danger">Eliminar</button></td>
					<td><button type="button" class="btn btn-success top-space"data-toggle="modal" data-target="#precios"">Precios</button></td>
				</tr>
			`
		})
	})
}