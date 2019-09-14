tablaVuelos.addEventListener('click',EditarVueloModal)
formularioEditarVuelo.addEventListener('submit',EditarVuelo)
let inputsformularioEV = formularioEditarVuelo.getElementsByTagName('input');
let vueloEditarGlobal = 0 

function EditarVueloModal(e){
	if(e.target.innerHTML == 'Editar'){
		selectEAviones.innerHTML = ''
		let tr = e.target.parentNode.parentNode
		let tds = tr.getElementsByTagName('td')
		vueloEditarGlobal = tds[0].innerHTML
		inputsformularioEV[1].value = tds[1].innerHTML
		inputsformularioEV[2].value = tds[2].innerHTML
		selectERutas.innerHTML = ''
		selectERutas.innerHTML += `
			<option value=${tds[3].getAttribute('data-id')}>${tds[3].innerHTML}</option>
			`
		llenarSelectEAviones(inputsformularioEV[1].value,tds[4].getAttribute('data-id'))
	}

}

function EditarVuelo(e){
	e.preventDefault()
	let data = new FormData(formularioEditarVuelo)
	fetch(`http://127.0.0.1:8000/viajes/${vueloEditarGlobal}`,{
	method: 'POST',
	headers:{
		'X-Requested-With': 'XMLHttpRequest'
	},
		body: data
	})
	.then(res => res.json())
	.then(res =>{
		Validar(res,'Editar','Vuelo')
	})
}