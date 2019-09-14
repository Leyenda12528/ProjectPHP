formularioCiudad.addEventListener('submit',registrarCiudad)

function registrarCiudad(e) {
	e.preventDefault()
	let data = new FormData(formularioCiudad)
	fetch('http://127.0.0.1:8000/ciudades',{
		method: 'POST',
		headers:{
			'X-Requested-With' :'XMLHttpRequest'
		},
		body: data
	})
	.then(res => res.json())
	.then(data => {
		Validar(data,'Registrar','Ciudad')
	})
}