let selectClases = document.querySelector('#selectClases')
function cargarClases(){
	fetch('http://127.0.0.1:8000/clases',{
		headers:{
			'X-Requested-With': 'XMLHttpRequest'			}
		})
	.then(res => res.json())
	.then(clases =>{
		tablaClases.innerHTML = ''
		selectClases.innerHTML= ''
		formularioEditarCT.querySelector('#selectClases').innerHTML= ''
		clases.forEach(function(element){
			tablaClases.innerHTML += `
				<tr>
					<td>${element.nombre}</td>
					<td><button type="button" class="btn btn-primary top-space"data-toggle="modal" data-target="#addPokemon"">Editar</button></td>
					<td><button class="btn btn-danger">Eliminar</button></td>
				</tr>
				`
				cargarSelectClase(element)
				cargarSelectEClase(element)
			})

			
		})
}

function cargarSelectClase(element){
		selectClases.innerHTML +=`
			<option>${element.nombre}</option>
		`
}
function cargarSelectEClase(element){
		formularioEditarCT.querySelector('#selectClases').innerHTML +=`
			<option>${element.nombre}</option>
		`
}