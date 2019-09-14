tablaVuelos.addEventListener('click',cargarDisponibilidad)

function cargarDisponibilidad(e){
	if(e.target.innerHTML == 'Disponibilidad'){
		let tr = e.target.parentNode.parentNode
		let vuelo = tr.getElementsByTagName('td')[0].innerHTML
		let data = new FormData()
		data.append('vuelo',vuelo)
		fetch('http://127.0.0.1:8000/viajedisponibilidad/cargar',{
			method: 'POST',
			headers:{
				'X-Requested-With' : 'XMLHttpRequest',
				'X-CSRF-TOKEN' : _token[0].defaultValue
			},
			body: data
		})
		.then(res => res.json())
		.then(data =>{
			tablaDisponibilidad.innerHTML = ''
			data.forEach(function(element){
				tablaDisponibilidad.innerHTML += `
					<tr>
						<td>${element.clase}</td>
						<td>${element.disponibilidad}</td>
					</tr>
				`
			})
		})
	}
}