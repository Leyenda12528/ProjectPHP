window.onLoad = vuelos()

function vuelos(){
  let numVuelos = document.querySelector('#vuelos').innerHTML
  let main = document.querySelector('#main')
  let alerta = document.querySelector('#alerta')

  if(numVuelos == 0){
    main.classList = 'container flex d-none'
    alerta.classList = 'd-block p-4'
  }
}

document.addEventListener('click',Datos)

function Datos(e) {

  if(e.target.classList == 'class' || e.target.classList == 'price'){
    let clasetarifa = e.target.parentNode.parentNode.getAttribute('data-id');
    let vuelo = e.target.parentNode.parentNode.parentNode.getAttribute('data-id');
    let divhora = e.target.parentNode.parentNode.parentNode.getElementsByTagName('div')[2];
    let hora = divhora.getElementsByTagName('span')[1].innerHTML;

    let horaP = document.querySelector("#horaPartida")
    let claseT = document.querySelector("#claseT")
    let precioT = document.querySelector('#precioT')
    let numPasajeros = document.querySelector('#numPasajeros').innerHTML;
    let nv = document.querySelector('#nVuelo');

    let ct = '';
    let p = 0;

    if(e.target.classList == 'class'){
      ct = e.target.innerHTML;
      p = e.target.parentNode.getElementsByTagName('p')[1].innerHTML
      p = parseFloat(numPasajeros) * parseFloat(p)
    }
    else{

      ct = e.target.parentNode.getElementsByTagName('p')[0].innerHTML
      p = e.target.innerHTML
      p = parseFloat(numPasajeros) * parseFloat(p)

    }

   horaP.innerHTML = hora;
  claseT.innerHTML = ct;
  precioT.innerHTML = p;
  nv.innerHTML = vuelo;

  let ticket = document.querySelector('#ticket-zone')

  ticket.classList = "ticket-zone d-block"
  }
    
}