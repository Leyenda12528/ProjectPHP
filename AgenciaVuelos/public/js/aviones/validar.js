function Validar(data,accion,objeto){
	switch(data[0]){
		case 'existente':
			if(objeto == 'Modelo'){
				if(accion =='Registrar')
					mensajeModelo.innerHTML = 'Modelo existente'
				if(accion =='Editar')
					mensajeEditarModelo.innerHTML = 'Modelo existente'
			}
			if(objeto == 'CM'){
				if(accion =='Registrar')
					mensajeCM.innerHTML = 'Relación existente'
				if(accion =='Editar')
					mensajeEditarCM.innerHTML = 'Relación existente'
			}
			if(objeto == 'Avion'){
				if(accion =='Registrar')
					mensajeAvion.innerHTML = 'Avion existente'
				if(accion =='Editar')
					mensajeEditarAvion.innerHTML = 'Avión existente'
			}
			
		break;
		case 'registrada':
			if(objeto == 'Modelo'){
				if (accion == 'Registrar'){
					mensajeModelo.innerHTML = 'Modelo registrado'
					formularioModelo.reset()
				}
				if(accion == 'Editar'){
					mensajeEditarModelo.innerHTML = 'Modelo registrado'
					formularioEditarModelo.reset();
					$('#addPokemon').modal('hide')
				}
				cargarModelos()
			}
			if(objeto == 'CM'){
				if(accion =='Registrar'){
					mensajeCM.innerHTML = 'Relación registrada'
					formularioCM.reset()
				}
					
				if(accion =='Editar'){
					mensajeEditarCM.innerHTML = 'Relación registrada'
					formularioEditarCM.reset()
					$('#addPokemon').modal('hide')
					$('#caracteristicas').modal('show')
				}
				cargarCM()
			}
			if(objeto == 'Avion'){
				if(accion =='Registrar'){
					mensajeAvion.innerHTML = 'Avión registrado'
					formularioAvion.reset()
				}
				if(accion =='Editar'){
					mensajeEditarAvion.innerHTML = 'Avión registrado'
					formularioEditarAvion.reset()
					$('#addPokemon').modal('hide')
				}
				cargarAviones()
			}
			
		break;
		default:
			if(objeto == 'Modelo'){
				if(accion == 'Registrar')
					mensajeModelo.innerHTML = 'Algo salió mal'
				if(accion =='Editar')
					mensajeEditarModelo.innerHTML = 'Algo salió mal'
			}
			if(objeto == 'CM'){
				if(accion =='Registrar')
					mensajeCM.innerHTML = 'Algo salió mal'
				if(accion =='Editarar')
					mensajeEditarCM.innerHTML = 'Algo salió mal'
			}
			if(objeto == 'Avion'){
				if(accion =='Registrar')
					mensajeAvion.innerHTML = 'Algo salió mal'
				if(accion =='Editarar')
					mensajeEditarAvion.innerHTML = 'Algo salió mal'
			}
		break;
	}
}