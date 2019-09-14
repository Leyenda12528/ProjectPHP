tablaCiudades.addEventListener('click',EditarCiudadModal)
formularioEditarCiudad.addEventListener('submit',EditarCiudad)
let ciudadEditarGlobal = ''

function EditarCiudadModal(e) {
	if(e.target.innerHTML == 'Editar'){
		mensajeEditarRuta.innerHTML = ''
		mensajeEditarCiudad.innerHTML = ''
		mensajeEditarPR.innerHTML = ''
		formularioEditarCiudad.style.display = 'block'
		formularioEditarRutas.style.display = 'none'
		formularioEditarPrecioruta.style.display = 'none'
		let tr = e.target.parentNode.parentNode
		ciudadEditarGlobal = tr.getElementsByTagName('td')[0].innerHTML
		let inputCiudad = formularioEditarCiudad.querySelector("#ciudad")
		inputCiudad.value = ciudadEditarGlobal

	}
}

function EditarCiudad(e){
	e.preventDefault()
	let data = new FormData(formularioEditarCiudad)
	fetch(`http://127.0.0.1:8000/ciudades/${ciudadEditarGlobal}`,{
		method: 'POST',
		headers:{
			'X-Requested-With': 'XMLHttpRequest'
		},
			body: data
		})
		.then(res => res.json())
		.then(data =>{
			Validar(data,'Editar','Ciudad')
			cargarRutas()

		})

}//EditarCiudad