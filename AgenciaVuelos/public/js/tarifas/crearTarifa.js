let tablaTarifas = document.querySelector('#tablaTarifas')
let formularioTarifa = document.querySelector('#formularioTarifa')
let mensajeTarifa = document.querySelector('#mensajeTarifa')
let mensajeEditarTarifa = document.querySelector('#mensajeEditarTarifa')
let _token = document.getElementsByName('_token');

window.onload = cargarTarifas();

formularioTarifa.addEventListener('submit',RegistrarTarifa)

function RegistrarTarifa(e){
	e.preventDefault()
	
	const data = new FormData(formularioTarifa)
	
	fetch('http://127.0.0.1:8000/tarifas',{
		method: 'POST',
		headers:{
			'X-Requested-With': 'XMLHttpRequest'
		},
			body: data
		})
		.then(res => res.json())
		.then(data =>{
			 Validar(data,'Registrar','Tarifa')
			//console.log(data)
		})

	}//registrarTarifa

// function Validar(data,accion,objeto){
// 	switch(data[0]){
// 		case 'existente':
// 			if(objeto == 'Tarifa'){
// 				if(accion == 'Registrar')
// 					mensajeTarifa.innerHTML = 'Tarifa existente'
// 				if(accion == 'Editar')
// 					mensajeEditarTarifa.innerHTML ='Tarifa existente'
// 			}
// 			if(objeto == 'Clase'){
// 				if(accion =='Registrar')
// 					mensajeClase.innerHTML = 'Clase existente'
// 			}
			
// 		break;
// 		case 'registrada':
// 			if(objeto == 'Tarifa'){
// 				if(accion == 'Registrar'){
// 					mensajeTarifa.innerHTML = 'Tarifa registrada'
// 					formularioTarifa.reset()
// 				}
// 				if(accion =='Editar'){
// 					mensajeEditarTarifa.innerHTML = 'Tarifa actualizada'
// 					formularioEditarTarifa.reset()
// 					$('#addPokemon').modal('hide')
// 				}
// 				cargarTarifas()
// 			}
// 			if(objeto == 'Clase'){
// 				if(accion =='Registrar'){
// 					mensajeClase.innerHTML = 'Clase registrada'
// 					formularioClase.reset()
					
// 				}
// 				cargarClases()
// 			}
			
// 		break;
// 		default:
// 			if(objeto == 'Tarifa'){
// 				if(accion == 'Registrar')
// 					mensajeTarifa.innerHTML = 'Algo salió mal'
// 				if(accion == 'Editar')
// 					mensajeEditarTarifa.innerHTML ='Algo salió mal'
// 			}
// 			if(objeto == 'Clase'){
// 				if(accion == 'Registrar')
// 					mensajeClase.innerHTML = 'Algo salió mal'
// 			}
			
// 		break;
// 	}
// }
