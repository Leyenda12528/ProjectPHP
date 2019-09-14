function Validar(data,accion,objeto){
	switch(data[0]){
		case 'existente':
			if(objeto == 'Vuelo'){
				if(accion == 'Registrar')
					mensajeVuelo.innerHTML = 'El avión ya está ocupado para esta fecha'
				if(accion == 'Editar')
					mensajeEditarVuelo.innerHTML ='El avión ya está ocupado para esta fecha'
			}
			if(objeto == 'Tarifa'){
				if(accion == 'Registrar')
					mensajeTarifa.innerHTML = 'Relación ya existente'
			}				
		break;
		case 'registrada':
			if(objeto == 'Vuelo'){
				if(accion == 'Registrar'){
					mensajeVuelo.innerHTML = 'Vuelo registrado'
					selectAviones.innerHTML = ''
					formularioVuelo.reset()
				}
				if(accion =='Editar'){
					mensajeEditarVuelo.innerHTML = 'Vuelo actualizado'
					selectEAviones.innerHTML = ''
					formularioEditarVuelo.reset()
					$('#addPokemon').modal('hide')
				}
				cargarVuelos()
			}
			if(objeto == 'Tarifa'){
				if(accion == 'Registrar')
					mensajeTarifa.innerHTML = 'Relación registrada'
				cargarTarifas()
			}
		break;
		default:
			if(objeto == 'Vuelo'){
				if(accion == 'Registrar')
					mensajeVuelo.innerHTML = 'Algo salió mal'
				if(accion == 'Editar')
					mensajeEditarVuelo.innerHTML ='Algo salió mal'
			}
			if(objeto == 'Tarifa'){
				if(accion == 'Registrar')
					mensajeTarifa.innerHTML = 'Algo salió mal'
			}
		break;
	}
}