let url = window.location
let menu = document.querySelector('#menu')
menu = menu.getElementsByTagName('li')

if(url == 'http://127.0.0.1:8000/clasetarifa'){
	menu[2].className += ' active'
}
else if(url == 'http://127.0.0.1:8000/rutas'){
	menu[3].className += ' active'
}
else if(url == 'http://127.0.0.1:8000/aviones'){
	menu[4].className += ' active'
}
else if(url == 'http://127.0.0.1:8000/viajes'){
	menu[5].className += ' active'
}
else if(url == 'http://127.0.0.1:8000/clientes'){
	menu[6].className += ' active'
}
else{
	menu[1].className += ' active'
}