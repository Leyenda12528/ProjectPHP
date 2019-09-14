let tablaModelos = document.querySelector('#tablaModelos')
let formularioModelo = document.querySelector('#formularioModelo')
let mensajeModelo = document.querySelector('#mensajeModelo')
let mensajeEditarModelo = document.querySelector('#mensajeEditarModelo')
let _token = document.getElementsByName('_token');
formularioModelo.addEventListener('submit', RegistrarModelo)

function RegistrarModelo(e){
	e.preventDefault()
	const modelo = new FormData(formularioModelo)

	fetch('http://127.0.0.1:8000/modelos',{
		method: 'POST',
		headers:{
			'X-Requested-With': 'XMLHttpRequest'
		},
		body : modelo
	})
	.then(res => res.json())
	.then(data =>{
		Validar(data,'Registrar','Modelo')
			//console.log(data)
	})
}