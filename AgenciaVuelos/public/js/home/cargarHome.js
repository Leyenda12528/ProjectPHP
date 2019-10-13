window.onload=cargar()
// window.addEventListener("onLoad",cargarUser());
// window.addEventListener("onLoad",cargarAvion());

let usuarios = document.querySelector("#user");
let avion = document.querySelector("#avion");
let vuelo = document.querySelector("#vuelo");

function cargar(){
	cargarUser();
	cargarAvion();
	cargarVuelo();
}

function cargarUser() {
	fetch('http://127.0.0.1:8000/homeadminu',{
		headers:{
			'X-Requested-With' : 'XMLHttpRequest'
		}
	})
	.then(res=> res.json())
	.then(rutas =>{
		usuarios.innerHTML=rutas;
	})
}

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
function cargarVuelo() {
	fetch('http://127.0.0.1:8000/homeadminv',{
		headers:{
			'X-Requested-With' : 'XMLHttpRequest'
		}
	})
	.then(res=> res.json())
	.then(avions =>{
		vuelo.innerHTML=avions;
	})
}