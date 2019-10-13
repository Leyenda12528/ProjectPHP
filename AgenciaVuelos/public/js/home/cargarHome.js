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
	clock();
	cal();
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

function cal(){
var fecha= new Date();
console.log(fecha.getDay());
document.querySelector('p.fecha').innerHTML=fecha.getDate();
document.querySelector('p.mes').innerHTML=getMes(fecha.getMonth());
document.querySelector('p.dia').innerHTML=getdia(fecha.getDay());
}
function clock(){
	var today = new Date();
	var h = today.getHours();
	var m = today.getMinutes();
	m = checkTime(m);
	document.querySelector("p.time").innerHTML =
	h + ":" + m;
	var t = setTimeout(function(){clock()}, 500);
  }
  function checkTime(i) {
	if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
	return i;
  }
function getMes(x){
	var mes;
	switch(x){
		case 0:
		mes="ENE";
		break;
		case 1:
		mes="FEB";
		break;
		case 2:
		mes="MAR";
		break;
		case 3:
		mes="ABR";
		break;
		case 4:
		mes="May";
		break;
		case 5:
		mes="JUN";
		break;
		case 6:
		mes="JUL";
		break;
		case 7:
		mes="AGO";
		break;
		case 8:
		mes="SEP";
		break;
		case 9:
		mes="oct";
		break;
		case 10:
		mes="NOV";
		break;
		case 11:
		mes="dic";
		break;
		}
return mes;
}

function getdia(x){
	var dia;
	switch(x){
		case 0:
			dia="dom"
			break;
			case 1:
					dia="lun"
					break;
					case 2:
							dia="mar"
							break;
							case 3:
									dia="mie"
									break;
									case 4:
											dia="jue"
											break;
											case 5:
													dia="vie"
													break;
													case 6:
															dia="sab"
															break;
	}
	return dia;
}