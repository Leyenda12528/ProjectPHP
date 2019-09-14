formularioTarifa.addEventListener('submit',registrarTarifa)

function registrarTarifa(e){
	e.preventDefault()
	let data = new FormData(formularioTarifa)
	data.append('vuelo',vueloGlobal)
	fetch('http://127.0.0.1:8000/viajeprecios',{
		method: 'POST',
		headers:{
			'X-Requested-With' : 'XMLHttpRequest'
		},
		body: data
	})
	.then(res =>res.json())
	.then(data =>{
		Validar(data,'Registrar','Tarifa')
	})


} 