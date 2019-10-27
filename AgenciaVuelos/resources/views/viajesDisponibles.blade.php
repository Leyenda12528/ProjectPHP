<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Selecciona tu vuelo</title>
    <link
      href="https://fonts.googleapis.com/css?family=Barlow+Condensed:400,700,900|Merriweather:400,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/animate.css" />
    <link rel="stylesheet" href="../css/slick.css" />
    <link rel="stylesheet" href="../css/slick-theme.css" />
    <link rel="stylesheet" href="../css/style1.css" />
  </head>
  <body class="vuelos">
    <header class="white">
        <div class="bar flex container">
            <div class="content flex">
                <a href="index.html">
                    <div class="logo">
                        <img src="../img/ogo1.png" alt="" />
                    </div>
                </a>
                <button class="toggle">
                    <img src="../svg/menu.svg" alt="">
                </button>
            </div>
            <nav class="main-menu flex">
                <li><a href="http://127.0.0.1:8000/">Inicio</a></li>
                <li><a href="promos.html">Promociones</a></li>
                <li><a href="vuelos.html">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="ourteam.html">Our team</a></li>
                <li><a href="login.html">
                    <span>asd
                    <svg class="menu-logo" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<path d="M437.02,330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521,243.251,404,198.548,404,148
			C404,66.393,337.607,0,256,0S108,66.393,108,148c0,50.548,25.479,95.251,64.262,121.962
			c-36.21,12.495-69.398,33.136-97.281,61.018C26.629,379.333,0,443.62,0,512h40c0-119.103,96.897-216,216-216s216,96.897,216,216
			h40C512,443.62,485.371,379.333,437.02,330.98z M256,256c-59.551,0-108-48.448-108-108S196.449,40,256,40
			c59.551,0,108,48.448,108,108S315.551,256,256,256z"/>
	</g>
</g>
</svg>
                </span>
            </a></li>
            </nav>
        </div>
    </header>

    <div class="wrapper">
      <section class="banner">
        <div class="container in-menu flex">
          <h1>Selecciona tu vuelo</h1>
          <p>
            <a href="index.html">Book it</a> /
            <a class="select" href="vuelos.html">Vuelo</a>
          </p>
        </div>
      </section>
      <div id="alerta" class="d-none">
        <h2>No hay vuelos disponibles</h2>
      </div>
      <section class="container flex" id="main">
        <div class="schedule-show">
          <h2 class="text-center">Datos</h2>
          <div class="flight-info">
            <h3>Ida</h3>
            <div class="flex justify-content-between">
              <p id="co"><img src="../svg/here.svg" alt="" />{{$data['co']}}</p>
              <p id="cd"><img src="../svg/there.svg" alt="" />{{$data['cd']}}</p>
              <p id="fecha"><img src="../svg/calendar.svg" alt="" /> {{$data['fecha']}}</p>
            </div>
          </div>
          @php ($i = 0)
          <div class="schedules">
            @foreach($data['viajes'] as $viaje)
              <div class="boleto" data-id="{{$viaje->id}}">
              <div class="circle left"></div>
              <div class="circle right"></div>
              <div class="flight-title">
                <p>
                  <span>Vuelo número {{$viaje->id}}</span>
                  <img src="../svg/time.svg" alt="Tiempo" />
                  <span> {{$viaje->hora}}</span>
                </p>
              </div>
              @php ($j = 0)
              @foreach($data['tarifas'][$i] as $tarifa)
                <div class="precios flex" data-id="{{$tarifa->ctId}}">
                <div>
                  <p class="class">{{$tarifa->clase}}/{{$tarifa->tarifa}}</p>
                  <p class="price">{{$data['precios'][$i][$j]->precio}}</p>
                  {{-- <p class="price">{{$tarifa->ctId}}</p> --}}
                </div>
              </div>
                @php ($j ++)
              @endforeach
              @php ($i ++)
            </div>
            @endforeach
          </div>
        </div>
        <p id="vuelos" class="d-none">{{$i}}</p>
        <div class="ticket-zone d-none" id="ticket-zone">
          <div class="ticket">
            <h2>Tu selección</h2>
            <p class="pasajero" id="numPasajeros">{{$data['pasajeros']}} Pasajeros</p>
            <div class="ida">
              <p>
                <span><img src="../svg/black-plane.svg" alt="" />Ida</span>
              </p>
              <p>Vuelo número <span id="nVuelo"></span></p>
              <p>Fecha {{$data['fecha']}}</p>
              <p>Desde {{$data['co']}}</p>
              <p>Hacia {{$data['cd']}}</p>
              <p>Hora de partida <span id="horaPartida"></span></p>
              <p>Clase/Tarifa: <span id="claseT"></span></p>
              <p>Precio: <span id="precioT"></span></p>
            </div>

            <a href="#" class="btn-redb">Continuar</a>
          </div>
        </div>
      </section>
      <footer>
        <div class="container flex">
          <div class="logo"><img src="../img/ogo1.png" alt="" /></div>
          <div class="menu-foot flex">
            <li><a href="#">Terminos y Condiciones</a></li>
            <li><a href="#">Politicas de privacidad</a></li>
            <li><a href="#">Integrantes</a></li>
          </div>
        </div>
        <div class="team flex">
          <p>PHP 2019</p>
          <div class="social-networks">
            <a href="#"
              ><svg
                class="network-logo"
                version="1.1"
                id="Capa_1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px"
                y="0px"
                viewBox="0 0 96.124 96.123"
                style="enable-background:new 0 0 96.124 96.123;"
                xml:space="preserve"
              >
                <g>
                  <g>
                    <path
                      d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803
                         c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654
                         c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246
                         c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z"
                    />
                  </g>
                </g>
              </svg>
            </a>

            <a href="#">
              <svg
                class="network-logo"
                version="1.1"
                id="Capa_1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px"
                y="0px"
                viewBox="0 0 512 512"
                style="enable-background:new 0 0 512 512;"
                xml:space="preserve"
              >
                <g>
                  <g>
                    <path
                      d="M352,0H160C71.648,0,0,71.648,0,160v192c0,88.352,71.648,160,160,160h192c88.352,0,160-71.648,160-160V160
                         C512,71.648,440.352,0,352,0z M464,352c0,61.76-50.24,112-112,112H160c-61.76,0-112-50.24-112-112V160C48,98.24,98.24,48,160,48
                         h192c61.76,0,112,50.24,112,112V352z"
                    />
                  </g>
                </g>
                <g>
                  <g>
                    <path
                      d="M256,128c-70.688,0-128,57.312-128,128s57.312,128,128,128s128-57.312,128-128S326.688,128,256,128z M256,336
                         c-44.096,0-80-35.904-80-80c0-44.128,35.904-80,80-80s80,35.872,80,80C336,300.096,300.096,336,256,336z"
                    />
                  </g>
                </g>
                <g>
                  <g>
                    <circle cx="393.6" cy="118.4" r="17.056" />
                  </g>
                </g>
              </svg>
            </a>

            <a href="#">
              <svg
                class="network-logo"
                version="1.1"
                id="Capa_1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px"
                y="0px"
                viewBox="0 0 612 612"
                style="enable-background:new 0 0 612 612;"
                xml:space="preserve"
              >
                <g>
                  <g>
                    <path
                      d="M612,116.258c-22.525,9.981-46.694,16.75-72.088,19.772c25.929-15.527,45.777-40.155,55.184-69.411
                             c-24.322,14.379-51.169,24.82-79.775,30.48c-22.907-24.437-55.49-39.658-91.63-39.658c-69.334,0-125.551,56.217-125.551,125.513
                             c0,9.828,1.109,19.427,3.251,28.606C197.065,206.32,104.556,156.337,42.641,80.386c-10.823,18.51-16.98,40.078-16.98,63.101
                             c0,43.559,22.181,81.993,55.835,104.479c-20.575-0.688-39.926-6.348-56.867-15.756v1.568c0,60.806,43.291,111.554,100.693,123.104
                             c-10.517,2.83-21.607,4.398-33.08,4.398c-8.107,0-15.947-0.803-23.634-2.333c15.985,49.907,62.336,86.199,117.253,87.194
                             c-42.947,33.654-97.099,53.655-155.916,53.655c-10.134,0-20.116-0.612-29.944-1.721c55.567,35.681,121.536,56.485,192.438,56.485
                             c230.948,0,357.188-191.291,357.188-357.188l-0.421-16.253C573.872,163.526,595.211,141.422,612,116.258z"
                    />
                  </g>
                </g>
              </svg>
            </a>
          </div>
        </div>
      </footer>
    </div>

    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/wow.js"></script>
    <script src="../js/jquery.waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/myjs.js"></script>
    <script>
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
    </script>
  </body>
</html>