formularioPrecioruta.addEventListener('submit',registrarPrecioruta)

function registrarPrecioruta(e){
	e.preventDefault()
	let data = new FormData(formularioPrecioruta)
	data.append('ruta',rutaP)

	fetch('http://127.0.0.1:8000/preciorutas',{
		method: 'POST',
		headers:{
			'X-Requested-With' : 'XMLHttpRequest',
		},
		body : data
	})
	.then(res => res.json())
	.then(data =>{
		Validar(data,'Registrar','PR')
		//console.log(data)
	})

}