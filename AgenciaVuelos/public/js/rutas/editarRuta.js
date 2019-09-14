tablaRutas.addEventListener('click',EditarRutaModal)
formularioEditarRutas.addEventListener('submit',EditarRuta)
let rutaEditarGlobal = 0

function EditarRutaModal(e){
	if(e.target.innerHTML == 'Editar'){
		mensajeEditarRuta.innerHTML = ''
		mensajeEditarCiudad.innerHTML = ''
		mensajeEditarPR.innerHTML = ''
		formularioEditarCiudad.style.display = 'none'
		formularioEditarRutas.style.display = 'block'
		formularioEditarPrecioruta.style.display = 'none'
		let tr = e.target.parentNode.parentNode
		rutaEditarGlobal = tr.getAttribute('data-id')
		let co = tr.getElementsByTagName('td')[0].innerHTML
		let cd = tr.getElementsByTagName('td')[1].innerHTML
		selectECiudadO.value = co
		selectECiudadD.value = cd

	}
}

function EditarRuta(e){
	e.preventDefault()
	let data = new FormData(formularioEditarRutas)
	fetch(`http://127.0.0.1:8000/rutas/${rutaEditarGlobal}`,{
		method: 'POST',
		headers:{
			'X-Requested-With': 'XMLHttpRequest',
			'X-CSRF-TOKEN' : _token[0].defaultValue
		},
		body: data
	})
	.then(res => res.json())
	.then(data =>{
		Validar(data,'Editar','Ruta')
	})
}