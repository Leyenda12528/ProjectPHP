function Validar(data,accion,objeto){
	switch(data[0]){
		case 'existente':
			if(objeto == 'Ciudad'){
				if(accion == 'Registrar')
					mensajeCiudad.innerHTML = 'Ciudad existente'
				if(accion == 'Editar')
					mensajeEditarCiudad.innerHTML ='Ciudad existente'
			}
			if(objeto == 'Ruta'){
				if(accion == 'Registrar')
					mensajeRuta.innerHTML = 'Ruta existente'
				if(accion == 'Editar')
					mensajeEditarRuta.innerHTML = 'Ruta existente'
			}
			if(objeto == 'PR'){
				if(accion == 'Registrar')
					mensajePrecioruta.innerHTML = 'Relación existente'
				if(accion == 'Editar')
					mensajeEditarPR.innerHTML = 'Relación existente'
			}				
		break;
		case 'registrada':
			if(objeto == 'Ciudad'){
				if(accion == 'Registrar'){
					mensajeCiudad.innerHTML = 'Ciudad registrada'
					formularioCiudad.reset()
				}
				if(accion =='Editar'){
					mensajeEditarCiudad.innerHTML = 'Ciudad actualizada'
					formularioEditarCiudad.reset()
					$('#addPokemon').modal('hide')
				}
				cargarCiudades()
			}
			if(objeto == 'Ruta'){
				if(accion == 'Registrar'){
					mensajeRuta.innerHTML = 'Ruta registrada'
					formularioRuta.reset()
				}
				if(accion =='Editar'){
					mensajeEditarRuta.innerHTML = 'Ruta actualizada'
					formularioEditarRutas.reset()
					$('#addPokemon').modal('hide')
				}
				cargarRutas()
			}
			if(objeto == 'PR'){
				if(accion == 'Registrar'){
					mensajePrecioruta.innerHTML = 'Relación registrada'
					formularioPrecioruta.reset()
				}
				if(accion =='Editar'){
					mensajeEditarPR.innerHTML = 'Relación actualizada'
					formularioEditarPrecioruta.reset()
					$('#addPokemon').modal('toggle')
					$('#precios').modal('toggle')
				}
				cargarPrecios()
			}

		break;
		case 'iguales':
		if (objeto == 'Ruta'){
			if(accion == 'Registrar')
				mensajeRuta.innerHTML = 'No puede ingresar ciudades iguales'
			if(accion == 'Editar'){
				mensajeEditarRuta.innerHTML = 'No puede ingresar ciudades iguales'
			}
		}
		break;
		default:
			if(objeto == 'Ciudad'){
				if(accion == 'Registrar')
					mensajeCiudad.innerHTML = 'Algo salió mal'
				if(accion == 'Editar')
					mensajeEditarCiudad.innerHTML ='Algo salió mal'
			}
			if(objeto == 'Ruta'){
				if(accion == 'Registrar')
					mensajeRuta.innerHTML = 'Algo salió mal'
				if(accion == 'Editar')
					mensajeEditarRuta.innerHTML ='Algo salió mal'
			}
			if(objeto == 'PR'){
				if(accion == 'Registrar')
					mensajePrecioruta.innerHTML = 'Algo salió mal'
				if(accion == 'Editar')
					mensajeEditarPR.innerHTML ='Algo salió mal'
			}
		break;
	}
}