tablaPrecioruta.addEventListener('click',EliminarPR)

function EliminarPR(e){
	if(e.target.innerHTML== 'Eliminar'){
		let tr = e.target.parentNode.parentNode
		let prDelete = tr.getAttribute('data-id')

		fetch(`http://127.0.0.1:8000/preciorutas/${prDelete}`,{
			method: 'DELETE',
			headers:{
				'X-Requested-With' : 'XMLHttpRequest',
				'X-CSRF-TOKEN' : _token[0].defaultValue
			}
		})
		.then(res => res.json())
		.then(data =>{
			mensajePrecioruta.innerHTML ='Relación eliminada'
			cargarPrecios()
		})

	}
}