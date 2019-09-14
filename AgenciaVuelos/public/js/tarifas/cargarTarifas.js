let selectTarifas = document.querySelector('#selectTarifas')
let formularioEditarCT = document.querySelector('#formularioEditarCT')
function cargarTarifas(){
	fetch('http://127.0.0.1:8000/tarifas',{
		headers: {
			'X-Requested-With': 'XMLHttpRequest'
		}
	})
	.then(res => res.json())
	.then(tarifas =>{
		tablaTarifas.innerHTML = ''
		selectTarifas.innerHTML =''
		formularioEditarCT.querySelector('#selectTarifas').innerHTML = ''
			tarifas.forEach(function(element){
				tablaTarifas.innerHTML +=`
					<tr>
						<td>${element.nombre}</td>
						<td><button type="button" class="btn btn-primary top-space"data-toggle="modal" data-target="#addPokemon"">Editar</button></td>
						<td><button id="eliminarTarifa" class="btn btn-danger">Eliminar</button></td>
					</tr>
				`
				cargarSelectTarifa(element)
				cargarSelectETarifa(element)
			})
	})

	function cargarSelectTarifa(element){
		selectTarifas.innerHTML +=`
				<option>${element.nombre}</option>
			`
	}
	function cargarSelectETarifa(element){
		formularioEditarCT.querySelector('#selectTarifas').innerHTML +=`
				<option>${element.nombre}</option>
			`
	}
}//Cargar tarifas