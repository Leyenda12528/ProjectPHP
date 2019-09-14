tablaClaseTarifa.addEventListener('click',editarCTModal)
formularioEditarCT.addEventListener('submit',editarCT)

let mensajeEditarct = document.querySelector('#mensajeEditarct')
let ct_id = ''

function editarCTModal(e){
	if(e.target.innerHTML == 'Editar'){
		formularioEditarClase.style.display = 'none'
		formularioEditarTarifa.style.display = 'none'
		formularioEditarCT.style.display = 'block'
		mensajeEditarct.innerHTML = ''
		mensajeEditarClase.innerHTML= ''
		mensajeEditarTarifa.innerHTML = ''
		let tr = e.target.parentNode.parentNode
		ct_id = tr.getAttribute('data-id')
		let ctEditar = tr.getElementsByTagName('td')
		let selectC = formularioEditarCT.querySelector('#selectClases')
		let selectT = formularioEditarCT.querySelector('#selectTarifas')
		selectC.value = ctEditar[0].innerHTML
		selectT.value = ctEditar[1].innerHTML		
	}
}
function editarCT(e){
	e.preventDefault();
	let data = new FormData(formularioEditarCT)
	fetch(`http://127.0.0.1:8000/clasetarifa/${ct_id}`,{
		method: 'POST',
		headers:{
			'X-Requested-With' : 'XMLHttpRequest'
		},
		body: data
	})
	.then(res => res.json())
	.then(data =>{
		Validar(data,'Editar','CT')
		//console.log(data)
	})
}