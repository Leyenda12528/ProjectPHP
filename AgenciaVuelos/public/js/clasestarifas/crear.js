let mensaject = document.querySelector('#mensaject')
let formularioct = document.querySelector('#formularioct')
formularioct.addEventListener('submit',RegistrarCT)

function RegistrarCT(e){
	e.preventDefault();
	let data = new FormData(formularioct)

	fetch('http://127.0.0.1:8000/clasetarifa',{
		method: 'POST',
		headers:{
			'X-Requested-With': 'XMLHttpRequest'
		},
		body: data
	})
	.then(res =>res.json())
	.then(ct =>{
		Validar(ct,'Registrar','CT')
	})
}