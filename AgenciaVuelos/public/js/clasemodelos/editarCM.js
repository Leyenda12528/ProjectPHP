tablaCM.addEventListener('click',EditarModalCM)
formularioEditarCM.addEventListener('submit',EditarCM)
function EditarModalCM(e){

	if(e.target.innerHTML == 'Editar'){

		let tr = e.target.parentNode.parentNode
		claseCME = tr.getElementsByTagName('td')[0].innerHTML
		capacidadCME = tr.getElementsByTagName('td')[1].innerHTML
		idCM = tr.getAttribute('data-id')
		$('#caracteristicas').modal('hide')
		formularioEditarModelo.style.display = 'none'
		formularioEditarCM.style.display = 'block'
		formularioEditarAvion.style.display = 'none'
		mensajeEditarModelo.innerHTML = ''
		mensajeEditarCM.innerHTML = ''
		mensajeEditarAvion.innerHTML= ''
		formularioEditarCM.querySelector("#selectClases").value = claseCME
		formularioEditarCM.querySelector("#capacidad").value = capacidadCME
	}
	
}

function EditarCM(e){
	e.preventDefault()
	let data = new FormData(formularioEditarCM)
	data.append('modelo',modeloCMR)
	fetch(`http://127.0.0.1:8000/clasemodelos/${idCM}`,{
		method: 'POST',
		headers:{
			'X-Requested-With': 'XMLHttpRequest',
			'X-CSRF-TOKEN': _token[0].defaultValue
		},
		body: data
	})
	.then(res => res.json())
	.then(data => {
		Validar(data,'Editar','CM')
	})
}