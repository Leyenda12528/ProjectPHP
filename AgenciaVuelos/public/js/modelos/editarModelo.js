tablaModelos.addEventListener('click',EditarModeloModal)
let formularioEditarModelo = document.querySelector('#formularioEditarModelo')
let modeloEditarGlobal = ''
formularioEditarModelo.addEventListener('submit',EditarModelo)

function EditarModeloModal(e){
	if(e.target.innerHTML == 'Editar'){
		formularioEditarModelo.style.display = 'block'
		formularioEditarCM.style.display = 'none'
		formularioEditarAvion.style.display = 'none'
		mensajeEditarModelo.innerHTML = ''
		mensajeEditarCM.innerHTML = ''
		mensajeEditarAvion.innerHTML= ''
		let tr = e.target.parentNode.parentNode
		let modeloEditar = tr.getElementsByTagName('td')[0].innerHTML
		let modeloDEditar = tr.getElementsByTagName('td')[1].innerHTML
		let inputEModelo = formularioEditarModelo.getElementsByTagName('input')
		let textaEModelo = formularioEditarModelo.querySelector('#descripcion')
		inputEModelo[1].value = modeloEditar
		textaEModelo.value = modeloDEditar
		modeloEditarGlobal = modeloEditar
	}//if
}//Eliminar modelo

function EditarModelo(e){
	e.preventDefault()
	let data = new FormData(formularioEditarModelo)
	fetch(`http://127.0.0.1:8000/modelos/${modeloEditarGlobal}`,{
		method: 'POST',
		headers:{
			'X-Requested-With': 'XMLHttpRequest'
		},
			body: data
		})
		.then(res => res.json())
		.then(data =>{
			Validar(data,'Editar','Modelo')
			cargarAviones()

		})

}//Editarmodelo