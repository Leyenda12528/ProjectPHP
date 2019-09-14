	formularioAvion.addEventListener('submit',resgistrarAvion)
	function resgistrarAvion(e){
		e.preventDefault()
		let data = new FormData(formularioAvion)

		fetch('http://127.0.0.1:8000/aviones',{
			method: 'POST',
			headers:{
				'X-Requested-With': 'XMLHttpRequest'
			},
			body: data
		})
		.then(res => res.json())
		.then(data =>{
			Validar(data,'Registrar','Avion')
		})

	}