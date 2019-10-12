tablaRutas.addEventListener('click',EliminarRuta)
let rutaDelete = 0

function EliminarRuta(e){
	e.preventDefault()
	if(e.target.innerHTML == 'Eliminar'){
		let tr = e.target.parentNode.parentNode
		rutaDelete = tr.getAttribute('data-id')
		fetch(`http://127.0.0.1:8000/rutas/${rutaDelete}`,{
			method: 'DELETE',
			headers:{
				'X-Requested-With' : 'XMLHttpRequest',
				'X-CSRF-TOKEN' : _token[0].defaultValue
			}
		})
		.then(res => res.json())
		.then(data =>{
			mensajeRuta.innerHTML ='Ruta eliminada'
			cargarRutas()
		})

	}


}