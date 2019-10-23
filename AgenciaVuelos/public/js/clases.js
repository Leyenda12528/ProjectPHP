window.onLoad = cargarClases()
window.onLoad = cargarRutas()



function cargarClases(){
	let formularioSoloIda = document.querySelector('#vuelta')

	let selectClases = formularioSoloIda.querySelector('#baggage')

			fetch('http://127.0.0.1:8000/clases',{
				headers:{
					'X-Requested-With' : 'XMLHttpRequest'
				}
			})
			.then(res => res.json())
			.then(data =>{
				selectClases.innerHTML = ''
				data.forEach(function(element){
					selectClases.innerHTML += 
					`
							<option value=${element.id}>${element.nombre}</option>

					`

				})
			})

}

function cargarRutas() {
	let formularioSoloIda = document.querySelector('#vuelta')

	let selectRuta = formularioSoloIda.querySelector('#ruta')

	fetch('http://127.0.0.1:8000/rutas/create',{
		headers:{
			'X-Requested-With' : 'XMLHttpRequest'
		}
	})
	.then(res=> res.json())
	.then(rutas =>{
		selectRuta.innerHTML = ''
		rutas.forEach(function(element) {
			selectRuta.innerHTML += `
				<option value=${element.id}>${element.ciudad_origen}/${element.ciudad_destino}</option>
			`
		})
	})
}

