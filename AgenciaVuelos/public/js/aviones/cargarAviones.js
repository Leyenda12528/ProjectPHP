window.onLoad = cargarAviones()
	let tablaAviones = document.querySelector("#tablaAviones")

	function cargarAviones(){
		fetch('http://127.0.0.1:8000/aviones/create',{
			headers:{
				'X-Requested-With' : 'XMLHttpRequest'
			}
		})
		.then(res => res.json())
		.then(data =>{
			tablaAviones.innerHTML = ''
			data.forEach(function(element){
				tablaAviones.innerHTML += 
				`
					<tr>
						<td>${element.nombre}</td>
						<td data-id=${element.modelo_id}>${element.modelo}</td>
						<td><button type="button" class="btn btn-primary top-space"data-toggle="modal" data-target="#addPokemon"">Editar</button></td>
						<td><button class="btn btn-danger">Eliminar</button></td>
					</tr>
				`

			})
		})
	}