tablaTarifas.addEventListener('click',EditarTarifaModal)
let formularioEditarTarifa = document.querySelector('#formularioEditarTarifa')
let tarifaEditarGlobal = ''
formularioEditarTarifa.addEventListener('submit',EditarTarifa)

function EditarTarifaModal(e){
	if(e.target.innerHTML == 'Editar'){
		formularioEditarClase.style.display = 'none'
		formularioEditarTarifa.style.display = 'block'
		formularioEditarCT.style.display = 'none'
		mensajeEditarct.innerHTML = ''
		mensajeEditarClase.innerHTML= ''
		mensajeEditarTarifa.innerHTML = ''
		let tr = e.target.parentNode.parentNode
		let tarifaEditar = tr.getElementsByTagName('td')[0].innerHTML
		let inputETarifa = formularioEditarTarifa.getElementsByTagName('input')
		inputETarifa[1].value = tarifaEditar
		tarifaEditarGlobal = tarifaEditar
	}//if
}//Eliminar tarifa

function EditarTarifa(e){
	e.preventDefault()
	let data = new FormData(formularioEditarTarifa)

	fetch(`http://127.0.0.1:8000/tarifas/${tarifaEditarGlobal}`,{
		method: 'POST',
		headers:{
			'X-Requested-With': 'XMLHttpRequest'
		},
			body: data
		})
		.then(res => res.json())
		.then(data =>{
			 Validar(data,'Editar','Tarifa')

		})

}//EditarTarifa