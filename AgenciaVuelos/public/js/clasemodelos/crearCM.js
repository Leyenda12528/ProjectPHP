tablaModelos.addEventListener('click',modeloCM)
formularioCM.addEventListener('submit',RegistrarCM)

function modeloCM(e){
	if(e.target.innerHTML== 'Características'){
		let tr = e.target.parentNode.parentNode
		modeloCMR = tr.getElementsByTagName('td')[0].innerHTML
		modeloCMCarac.innerHTML= modeloCMR
		cargarCM()
	}
}

function RegistrarCM(e){
	e.preventDefault()
	let data = new FormData(formularioCM)
	data.append('modelo',modeloCMR)

	fetch('http://127.0.0.1:8000/clasemodelos',{
		method: 'POST',
		headers:{
			'X-Requested-With' : 'XMLHttpRequest'
		},
		body: data
	})
	.then(res => res.json())
	.then(data =>{
		Validar(data,'Registrar','CM')
	})
}