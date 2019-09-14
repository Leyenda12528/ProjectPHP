tablaTarifas.addEventListener('click',EliminarTarifa)


function EliminarTarifa(e){
	if(e.target.innerHTML == 'Eliminar'){
		let tr = e.target.parentNode.parentNode
		let tarifaDelete = tr.getElementsByTagName('td')[0].innerHTML
		

		fetch(`http://127.0.0.1:8000/tarifas/${tarifaDelete}`,{
			method: 'DELETE',
			headers: {
				'X-Requested-With': 'XMLHttpRequest',
				'X-CSRF-TOKEN': _token[0].defaultValue
			}
		})
		.then(res => res.json())
		.then(data=>{
			cargarTarifas();
			mensajeTarifa.innerHTML = 'Tarifa eliminada'
		})
	}
	
}//Eliminar tarifa