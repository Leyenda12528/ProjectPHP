formularioRuta.addEventListener('submit',registrarRuta)

function registrarRuta(e) {
	e.preventDefault()
	let data = new FormData(formularioRuta);
	fetch('http://127.0.0.1:8000/rutas',{
		method : 'POST',
		headers:{
			'X-Requested-With' : 'XMLHttpRequest',
		},
		body: data
	})
	.then(res => res.json())
	.then(data => {
		Validar(data,'Registrar','Ruta')
	})
}