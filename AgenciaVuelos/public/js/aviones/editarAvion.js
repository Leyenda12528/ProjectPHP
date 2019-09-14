	tablaAviones.addEventListener('click',EditarAvionModal)
	formularioEditarAvion.addEventListener('submit',EditarAvion)
	let GlobalAvion = ''

	function EditarAvionModal(e){
		
		if(e.target.innerHTML == 'Editar'){
			let tr = e.target.parentNode.parentNode;
			let modelo = tr.getElementsByTagName('td')[1].getAttribute('data-id')
			GlobalAvion = tr.getElementsByTagName('td')[0].innerHTML
			formularioEditarModelo.style.display = 'none'
			formularioEditarCM.style.display = 'none'
			formularioEditarAvion.style.display = 'block'
			mensajeEditarModelo.innerHTML = ''
			mensajeEditarCM.innerHTML = ''
			mensajeEditarAvion.innerHTML= ''
			let inputAvionE = formularioEditarAvion.querySelector("#avion")
			let selectModeloE = formularioEditarAvion.querySelector("#selectModelos")
			inputAvionE.value = GlobalAvion
			selectModeloE.value = modelo
		}
	}
	function EditarAvion(e){
		e.preventDefault()
		let data = new FormData(formularioEditarAvion)
		fetch(`http://127.0.0.1:8000/aviones/${GlobalAvion}`,{
			method: 'POST',
			headers:{
				'X-Requested-With': 'XMLHttpRequest',
				'X-CSRF-TOKEN': _token[0].defaultValue
			},
			body: data
		})
		.then(res => res.json())
		.then(data => {
			Validar(data,'Editar','Avion')
		})

	}