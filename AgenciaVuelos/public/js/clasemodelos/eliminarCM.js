tablaCM.addEventListener('click',EliminarCM)
function EliminarCM(e){

	if(e.target.innerHTML == 'Eliminar'){
		let tr =e.target.parentNode.parentNode
		let cmDelete= tr.getAttribute('data-id');

		fetch(`http://127.0.0.1:8000/clasemodelos/${cmDelete}`,{
			method: 'DELETE',
			headers:{
				'X-Requested-With': 'XMLHttpRequest',
				'X-CSRF-TOKEN': _token[0].defaultValue
			}
		})
		.then(res => res.json())
		.then(data =>{
			cargarCM()
			mensajeCM.innerHTML = 'Relación eliminada'
		})
	}
		

}