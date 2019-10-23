// let formularioSoloIda = document.querySelector('#vuelta')

// formularioSoloIda.addEventListener('submit',buscarViaje)

// function buscarViaje(e) {
// 	e.preventDefault()

// 	let data = new FormData(formularioSoloIda)

// 	fetch('http://127.0.0.1:8000/viajes',{
// 		method: 'POST',
// 		headers:{
// 			'X-Requested-With' : 'XMLHttpRequest'
// 		},
// 		body: data
// 	})
// 	.then(res =>res.json())
// 	.then(res =>{
// 		Validar(res,'Registrar','Vuelo')
// 		if(res[0] == 'registrada'){
// 			registrarDisponibilidad(data)
// 		}
// 	})
// }