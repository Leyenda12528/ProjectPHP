
window.onLoad = cargarCiudades()
let tablaCiudades = document.querySelector("#tablaCiudades")
let formularioCiudad = document.querySelector("#formularioCiudad")
let formularioEditarCiudad = document.querySelector("#formularioEditarCiudad")
let _token = document.getElementsByName('_token');
let formularioRuta = document.querySelector("#formularioRuta")
let selectCiudadO = formularioRuta.querySelector("#ciudad_origen")
let selectECiudadO = formularioEditarRutas.querySelector("#ciudad_origen")
let selectCiudadD = formularioRuta.querySelector("#ciudad_destino")
let selectECiudadD = formularioEditarRutas.querySelector("#ciudad_destino")

function cargarCiudades(){
	fetch('http://127.0.0.1:8000/ciudades',{
		headers:{
			'X-Requested-With': 'XMLHttpRequest'			}
		})
	.then(res => res.json())
	.then(ciudades =>{
		tablaCiudades.innerHTML = ''
		selectCiudadO.innerHTML = '<option></option>'
		selectECiudadO.innerHTML = '<option></option>'
		selectCiudadD.innerHTML = '<option></option>'
		selectECiudadD.innerHTML = '<option></option>'
		ciudades.forEach(function(element){
			tablaCiudades.innerHTML += `
				<tr>
					<td>${element.nombre}</td>
					<td><button type="button" class="btn btn-primary top-space"data-toggle="modal" data-target="#addPokemon"">Editar</button></td>
					<td><button class="btn btn-danger">Eliminar</button></td>
				</tr>
				`
				selectCiudadO.innerHTML += `<option>${element.nombre}</option>`
				selectECiudadO.innerHTML += `<option>${element.nombre}</option>`
				selectCiudadD.innerHTML += `<option>${element.nombre}</option>`
				selectECiudadD.innerHTML += `<option>${element.nombre}</option>`
			})
		})

}