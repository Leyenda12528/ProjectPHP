window.onload =  cargarClases()
let tablaClases = document.querySelector('#tablaClases')
let formularioClase = document.querySelector('#formularioClase')
let mensajeClase = document.querySelector('#mensajeClase')
let mensajeEditarClase = document.querySelector('#mensajeEditarClase')
formularioClase.addEventListener('submit', RegistrarClase)

function RegistrarClase(e){
	e.preventDefault()
	const clase = new FormData(formularioClase)

	fetch('http://127.0.0.1:8000/clases',{
		method: 'POST',
		headers:{
			'X-Requested-With': 'XMLHttpRequest'
		},
		body : clase
	})
	.then(res => res.json())
	.then(data =>{
		Validar(data,'Registrar','Clase')
	})
}

