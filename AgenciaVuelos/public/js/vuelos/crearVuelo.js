formularioVuelo.addEventListener('submit',registrarVuelo)

function registrarVuelo(e){
	e.preventDefault()
	let data = new FormData(formularioVuelo)
	fetch('http://127.0.0.1:8000/viajes',{
		method: 'POST',
		headers:{
			'X-Requested-With' : 'XMLHttpRequest'
		},
		body: data
	})
	.then(res =>res.json())
	.then(res =>{
		Validar(res,'Registrar','Vuelo')
		if(res[0] == 'registrada'){
			registrarDisponibilidad(data)
		}
	})
}
function registrarDisponibilidad(data){
	fetch('http://127.0.0.1:8000/viajedisponibilidad/registrar',{
		method: 'POST',
		headers:{
			'X-Requested-With' : 'XMLHttpRequest',
			'X-CSRF-TOKEN' : _token[0].defaultValue
		},
		body: data
	})
}