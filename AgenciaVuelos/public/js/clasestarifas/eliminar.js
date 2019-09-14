tablaClaseTarifa.addEventListener('click',eliminarCT)

function eliminarCT(e){
	if(e.target.innerHTML == 'Eliminar'){
		let tr = e.target.parentNode.parentNode
		let ct = tr.getAttribute('data-id')
		
		fetch(`http://127.0.0.1:8000/clasetarifa/${ct}`,{
			method: 'DELETE',
			headers:{
				'X-Requested-With': 'XMLHttpRequest',
				'X-CSRF-TOKEN': _token[0].defaultValue
			}
		})
		.then(res => res.json())
		.then(data =>{
			cargarct()
			mensaject.innerHTML = 'Relación eliminada'
		})
	}
	

}