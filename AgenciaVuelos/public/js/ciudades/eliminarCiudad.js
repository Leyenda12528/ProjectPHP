tablaCiudades.addEventListener('click',EliminarCiudad)

function EliminarCiudad(e) {
	if(e.target.innerHTML == 'Eliminar'){
		let tr =e.target.parentNode.parentNode
		let ciudadDelete= tr.getElementsByTagName('td')[0].innerHTML

		fetch(`http://127.0.0.1:8000/ciudades/${ciudadDelete}`,{
			method: 'DELETE',
			headers:{
				'X-Requested-With': 'XMLHttpRequest',
				'X-CSRF-TOKEN': _token[0].defaultValue
			}
		})
		.then(res => res.json())
		.then(data =>{
			cargarCiudades()
			mensajeCiudad.innerHTML = 'Ciudad eliminada'
		})
	}
}