function Validar(data,accion,objeto){
	switch(data[0]){
		case 'existente':
			if(objeto == 'Tarifa'){
				if(accion == 'Registrar')
					mensajeTarifa.innerHTML = 'Tarifa existente'
				if(accion == 'Editar')
					mensajeEditarTarifa.innerHTML ='Tarifa existente'
			}
			if(objeto == 'Clase'){
				if(accion =='Registrar')
					mensajeClase.innerHTML = 'Clase existente'
				if(accion == 'Editar')
					mensajeEditarClase.innerHTML ='Clase existente'
			}
			if(objeto == 'CT'){
				if(accion =='Registrar')
					mensaject.innerHTML = 'Relación existente'
				if(accion == 'Editar')
					mensajeEditarct.innerHTML = 'Relación existente'
			}
		break;
		case 'registrada':
			if(objeto == 'Tarifa'){
				if(accion == 'Registrar'){
					mensajeTarifa.innerHTML = 'Tarifa registrada'
					formularioTarifa.reset()
				}
				if(accion =='Editar'){
					mensajeEditarTarifa.innerHTML = 'Tarifa actualizada'
					formularioEditarTarifa.reset()
					$('#addPokemon').modal('hide')
				}
				cargarTarifas()
				cargarct()
			}
			if(objeto == 'Clase'){
				if(accion =='Registrar'){
					mensajeClase.innerHTML = 'Clase registrada'
					formularioClase.reset()		
				}
				if(accion =='Editar'){
					mensajeEditarClase.innerHTML = 'Clase actualizada'
					formularioEditarClase.reset()
					$('#addPokemon').modal('hide')
				}
				cargarClases()
				cargarct()
			}
			if(objeto == 'CT'){
				if(accion =='Registrar'){
					mensaject.innerHTML = 'Relación registrada'
					formularioct.reset()
				}
				if(accion == 'Editar'){
					mensajeEditarct.innerHTML = 'Relación registrada'
					formularioEditarCT.reset();
					$('#addPokemon').modal('hide')
				}
				cargarct()	
			}
		break;
		default:
			if(objeto == 'Tarifa'){
				if(accion == 'Registrar')
					mensajeTarifa.innerHTML = 'Algo salió mal'
				if(accion == 'Editar')
					mensajeEditarTarifa.innerHTML ='Algo salió mal'
			}
			if(objeto == 'Clase'){
				if(accion == 'Registrar')
					mensajeClase.innerHTML = 'Algo salió mal'
				if(accion =='Editar')
					mensajeEditarClase.innerHTML = 'Algo salió mal'
			}
			if(objeto == 'CT'){
				if(accion == 'Registrar')
					mensaject.innerHTML = 'Algo salió mal'
				if(accion =='Editar')
					mensajeEditarct.innerHTML = 'Algo salió mal'
			}
		break;
	}
}