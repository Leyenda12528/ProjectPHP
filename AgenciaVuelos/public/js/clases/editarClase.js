tablaClases.addEventListener('click',EditarClaseModal)
let formularioEditarClase = document.querySelector('#formularioEditarClase')
let claseEditarGlobal = ''
formularioEditarClase.addEventListener('submit',EditarClase)

function EditarClaseModal(e){
	if(e.target.innerHTML == 'Editar'){
		formularioEditarClase.style.display = 'block'
		formularioEditarTarifa.style.display = 'none'
		formularioEditarCT.style.display = 'none'
		mensajeEditarct.innerHTML = ''
		mensajeEditarClase.innerHTML= ''
		mensajeEditarTarifa.innerHTML = ''
		let tr = e.target.parentNode.parentNode
		let claseEditar = tr.getElementsByTagName('td')[0].innerHTML
		let inputEClase = formularioEditarClase.getElementsByTagName('input')
		inputEClase[1].value = claseEditar
		claseEditarGlobal = claseEditar
	}//if
}//Eliminar clase

function EditarClase(e){
	e.preventDefault()
	let data = new FormData(formularioEditarClase)
	fetch(`http://127.0.0.1:8000/clases/${claseEditarGlobal}`,{
		method: 'POST',
		headers:{
			'X-Requested-With': 'XMLHttpRequest'
		},
			body: data
		})
		.then(res => res.json())
		.then(data =>{
			Validar(data,'Editar','Clase')

		})

}//EditarClase