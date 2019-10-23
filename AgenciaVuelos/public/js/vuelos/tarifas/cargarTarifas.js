tablaVuelos.addEventListener('click',llenarSelectTarifas)
tablaVuelos.addEventListener('click',cargarTarifas)
let formularioTarifa = document.querySelector("#formularioTarifa")
let selectTarifas = formularioTarifa.querySelector("#selectTarifas")
let tablaTarifas = document.querySelector("#tablaTarifas")
let vueloGlobal = 0

function llenarSelectTarifas(e){
	if(e.target.innerHTML == 'Tarifas'){
		let tr = e.target.parentNode.parentNode
		let ruta = tr.getElementsByTagName('td')[3].getAttribute('data-id')
		let avion = tr.getElementsByTagName('td')[4].getAttribute('data-id')
		vueloGlobal = tr.getElementsByTagName('td')[0].innerHTML
		let data = new FormData();
		data.append('ruta',ruta)
		data.append('avion',avion)
		fetch('http://127.0.0.1:8000/viajeprecios/tarifas',{
			method: 'POST',
			headers:{
				'X-Requested-With' : 'XMLHttpRequest',
				'X-CSRF-TOKEN' : _token[0].defaultValue
			},
			body: data
		})
		.then(res =>res.json())
		.then(data =>{
			selectTarifas.innerHTML = ''
			data.forEach(function(element){
				selectTarifas.innerHTML += `
					<option value=${element.id}>${element.clase}/${element.tarifa}</option>
				`
			})		
		})
	}
}

function cargarTarifas(){

	let data = new FormData();
	data.append('viaje',vueloGlobal)

	fetch('http://127.0.0.1:8000/viajeprecios/llenarTabla',{
		method: 'POST',
		headers:{
			'X-Requested-With' : 'XMLHttpRequest',
			'X-CSRF-TOKEN' : _token[0].defaultValue
		},
		body: data
	})
	.then(res=> res.json())
	.then(data =>{
		tablaTarifas.innerHTML = ''
		data.forEach(function(element){
			tablaTarifas.innerHTML +=`
				<tr data-id=${element.id}>
					<td>${element.clase}/${element.tarifa}</td>
					<td><button class="btn btn-danger">Eliminar</button></td>
				</tr>
			`
		})
		
	})

}//funct