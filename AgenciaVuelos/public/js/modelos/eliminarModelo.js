tablaModelos.addEventListener('click',EliminarModelo)


function EliminarModelo(e){
			
	if(e.target.innerHTML == 'Eliminar'){
		let tr =e.target.parentNode.parentNode
		let modeloDelete= tr.getElementsByTagName('td')[0].innerHTML

		fetch(`http://127.0.0.1:8000/modelos/${modeloDelete}`,{
			method: 'DELETE',
			headers:{
				'X-Requested-With': 'XMLHttpRequest',
				'X-CSRF-TOKEN': _token[0].defaultValue
			}
		})
		.then(res => res.json())
		.then(data =>{
			cargarModelos()
			mensajeModelo.innerHTML = 'Modelo eliminado'
		})
	}
			
			
}