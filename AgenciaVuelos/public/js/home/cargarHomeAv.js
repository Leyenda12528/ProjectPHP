window.onLoad = cargarAvion()

let avion = document.querySelector("#avion");

function cargarAvion() {
	fetch('http://127.0.0.1:8000/homeadmina',{
		headers:{
			'X-Requested-With' : 'XMLHttpRequest'
		}
	})
	.then(res=> res.json())
	.then(avions =>{
		avion.innerHTML=avions;
	})
}