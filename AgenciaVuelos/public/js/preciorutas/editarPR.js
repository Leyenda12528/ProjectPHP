tablaPrecioruta.addEventListener('click',EditarPRModal)
formularioEditarPrecioruta.addEventListener('submit',EditarPR)
let prEditarGlobal = 0
function EditarPRModal(e) {
	if(e.target.innerHTML == "Editar"){
		mensajeEditarRuta.innerHTML = ''
		mensajeEditarCiudad.innerHTML = ''
		mensajeEditarPR.innerHTML = ''
		formularioEditarCiudad.style.display = 'none'
		formularioEditarRutas.style.display = 'none'
		formularioEditarPrecioruta.style.display = 'block'
		let tr = e.target.parentNode.parentNode
		prEditarGlobal = tr.getAttribute('data-id')
		let ct = tr.getElementsByTagName('td')[0].getAttribute('data-id')
		let precioE = tr.getElementsByTagName('td')[1].innerHTML
		selectECT.value = ct
		formularioEditarPrecioruta.querySelector("#precio").value = precioE
		$("#precios").modal('toggle')

	}
}
function EditarPR(e) {
	e.preventDefault()
	let data = new FormData(formularioEditarPrecioruta)
	data.append('ruta',rutaP)
	fetch(`http://127.0.0.1:8000/preciorutas/${prEditarGlobal}`,{
		method :'POST',
		headers:{
			'X-Requested-With' :'XMLHttpRequest',
			'X-CSRF-TOKEN' : _token[0].defaultValue
		},
		body: data
	})
	.then(res =>res.json())
	.then(data =>{
		Validar(data,'Editar','PR')
	})
}