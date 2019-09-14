window.onLoad = cargarClaseTarifas()
let precioRModal = document.querySelector("#precioRModal");
let tablaPrecioruta = document.querySelector("#tablaPrecioruta");
let mensajePrecioruta = document.querySelector("#mensajePrecioruta");
let formularioPrecioruta = document.querySelector("#formularioPrecioruta");
let selectCT = formularioPrecioruta.querySelector("#selectCT")
let selectECT = formularioEditarPrecioruta.querySelector("#selectCT")
let mensajeEditarPR = document.querySelector("#mensajeEditarPR")
let rutaP = 0;
tablaRutas.addEventListener('click',rutaPR)

function rutaPR(e){
	if(e.target.innerHTML == 'Precios'){
		let tr = e.target.parentNode.parentNode
		rutaP = tr.getAttribute('data-id')
		cargarPrecios()
	}

}

function cargarPrecios(e){
		let data = new FormData();
		data.append('ruta',rutaP)
		fetch('http://127.0.0.1:8000/preciorutas/precios',{
			method: 'POST',
			headers:{
				'X-Requested-With' : 'XMLHttpRequest',
				'X-CSRF-TOKEN' : _token[0].defaultValue
			},
			body: data
		})
		.then(res => res.json())
		.then(data =>{
			//console.log(data)
			precioRModal.innerHTML = ''
			tablaPrecioruta.innerHTML = ''
			data.forEach(function(element){
				precioRModal.innerHTML = element.ciudadO+'/'+element.ciudadD
				tablaPrecioruta.innerHTML += `
					<tr data-id=${element.precioruta_id}>
						<td data-id=${element.clasetarifa_id}>${element.clase}/${element.tarifa}</td>
						<td>${element.precio}</td>
						<td><button type="button" class="btn btn-primary top-space"data-toggle="modal" data-target="#addPokemon"">Editar</button></td>
						<td><button class="btn btn-danger">Eliminar</button></td>
					</tr>
				`
			})
		})
}//cargarPrecios

function cargarClaseTarifas(){
	fetch('http://127.0.0.1:8000/clasetarifa',{
		headers:{
			'X-Requested-With' : 'XMLHttpRequest'
		}
	})
	.then(res => res.json())
	.then(data =>{
		selectCT.innerHTML = ''
		selectECT.innerHTML = ''
		data.forEach(function(element){
			selectCT.innerHTML += `<option value=${element.id}>${element.clase}/${element.tarifa}</option>`
			selectECT.innerHTML += `<option value=${element.id}>${element.clase}/${element.tarifa}</option>`
		})
	})
}