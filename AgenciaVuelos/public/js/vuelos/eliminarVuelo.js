tablaVuelos.addEventListener('click',EliminarVuelo)

function EliminarVuelo(e){
	if(e.target.innerHTML == 'Eliminar'){
		let tr = e.target.parentNode.parentNode
		let vueloDelete = tr.getElementsByTagName('td')[0].innerHTML
		fetch(`http://127.0.0.1:8000/viajes/${vueloDelete}`,{
			method: 'DELETE',
			headers:{
				'X-Requested-With': 'XMLHttpRequest',
				'X-CSRF-TOKEN': _token[0].defaultValue
			}
		})
		.then(res => res.json())
		.then(data =>{
			cargarVuelos()
			mensajeVuelo.innerHTML = 'Vuelo eliminado'
		})
	}
}