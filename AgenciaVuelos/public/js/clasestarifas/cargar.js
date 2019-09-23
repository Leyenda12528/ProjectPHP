	let tablaClaseTarifa = document.querySelector('#tablaClaseTarifa')

	window.onload= cargarct()

	function cargarct(){
			fetch('http://127.0.0.1:8000/clasetarifa/create',{
			headers:{
				'X-Requested-With': 'XMLHttpRequest'	
			}
			})
			.then(res => res.json())
			.then(clasetarifa =>{
				tablaClaseTarifa.innerHTML = ''
				clasetarifa.forEach(function(elemento){
					tablaClaseTarifa.innerHTML +=`
						<tr data-id=${elemento.id}>
							<td>${elemento.clase}</td>
							<td>${elemento.tarifa}</td>
							<td><button type="button" class="btn btn-primary top-space"data-toggle="modal" data-target="#addPokemon"">Editar</button></td>
							<td><button class="btn btn-danger">Eliminar</button></td>
						</tr>
					`;
				})
				//console.log(clasetarifa)
			})
	}