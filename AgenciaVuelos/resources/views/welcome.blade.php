<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Aviones a tu alcance</title>
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:400,700,900|Merriweather:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/style.css" />
    </head>
    <body class="index">
        <!-- <div class="flex-center position-ref full-height">

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div> -->
        <header>
        <div class="bar flex container">
            <div class="content flex">
                <a href="index.html">
                    <div class="logo">
                        <img src="img/logos.png" alt="" />
                    </div>
                </a>
                <button class="toggle">
                    <img src="svg/menu.svg" alt="">
                </button>
            </div>
            <nav class="main-menu flex">
                @auth
                    <li><a href="#">Bienvenido/a {{ Auth::user()->name }}</a></li>
                @endauth
                <li><a href="index.html">Book</a></li>
                <li><a href="promos.html">Promociones</a></li>
                <li><a href="vuelos.html">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="ourteam.html">Our team</a></li>
                @auth
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                @else     
                <li>
                <a class="" href="{{ route('login') }}">Login</a>
                </li>
    @if (Route::has('register'))
    <li>
    <a class="" href="{{ route('register') }}">Registrarse</a></li>
                    @endif           
<!-- 
                <li class="dropdown">
  <button class="btn btn-gold dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Usuario
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
    @if (Route::has('register'))
    <a class="dropdown-item" href="{{ route('register') }}">Registrarse</a>
                    @endif
    
  </div>
</li> -->
                   
                @endauth
                <div class="dropdown">
  <button class="btn btn-gold dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  @auth
                     {{ Auth::user()->name }}
                    @else
                    Usuario
                @endauth
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  @auth
  <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        @else
  <a class="dropdown-item" href="{{ route('login') }}">Login</a>
  @if (Route::has('register'))
  <a class="dropdown-item" href="{{ route('register') }}">Registrarse</a>
  @endif
  @endauth
  </div>
</div>
            </nav>
        </div>
    </header>

        <div class="wrapper">
    <section class="slider">
        <div class="slider-son">
        <div class="container content flex">
            <img src="img/aviongris.png" alt="">
            <div class="info-cont">
                <h2 class="h1">Vuela con la mejor aerolinea a nivel mundial.</h2>
                <p>
                    Curly Airline proudly raises the bar and exceeds the standard for
                    luxury and corporate private jet charter services. We pride
                    ourselves on offering a professional service.
                </p>
            </div>
        </div>
    </div>



    <div class="slider-son">
            <div class="container content flex">
                <img src="img/seats.jpg" alt="">
                <div class="info-cont">
                    <h2 class="h1"> 2 Vuela con la mejor aerolinea a nivel mundial.</h2>
                    <p>
                        Curly Airline proudly raises the bar and exceeds the standard for
                        luxury and corporate private jet charter services. We pride
                        ourselves on offering a professional service.
                    </p>
                </div>
            </div>
        </div>
        
    </section>
    <section class="line container ">
        <div class="space">
            <p class="number counter">95</p>
            <p class="text">Professional pilots</p>
        </div>
        <div class="space">
            <p class="number counter">150</p>
            <p class="text">workers</p>
        </div>
        <div class="space">
            <p class="number counter">290</p>
            <p class="text">World Airports</p>
        </div>
        <div class="space">
            <p class="number counter">68</p>
            <p class="text">Airplanes</p>
        </div>
    </section>
    <main>
        <div class="container">
            <h1 class="wow fadeIn">Book now</h1>
            <hr class="hr" />
            <div class="content wow bounceInRight">
                <div class="tab-father flex">
                    <button id="default-tab" class="tab" onclick="openTab(event, 'ida-vuelta')">Ida y vuelta</button>
                    <button class="tab" onclick="openTab(event, 'vuelta')">Solo ida</button>
                    <!-- <button class="tab">Multidestino?</button> -->
                </div>
            
            <div class="info-form">
                <div id="ida-vuelta" class="tabcontent">
                    <form class="ida-vuelta flex" action="">
                        <div class="where">
                            <div class="campo">
                                <label for="origen">Desde</label>
                                <input type="text" name="origen" id="origen"
                                    placeholder="Nombre de ciudad o aeropuerto" />
                            </div>
                            <button class="change">C</button>
                            <div class="campo">
                                <label for="origen">Desde</label>
                                <input type="text" name="destino" id="destino" placeholder="Hacia" />
                            </div>
                        </div>
                        <div class="when">
                            <div class="campo">
                                <label for="f-ida">Fecha de salida</label>
                                <input type="date" name="f-ida" id="f-ida" placeholder="Fecha de ida" />
                            </div>
                            <div class="campo">
                                <label for="f-vuelta">Fecha de regreso</label>
                                <input type="date" name="f-vuelta" id="f-vuelta" placeholder="Fecha de vuelta" />
                            </div>
                        </div>
                        <div class="how">
                            <div class="campo">
                                <label for="passengers">Pasajeros</label>
                                <select name="passengers" id="passengers">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="campo">
                                <label for="baggage">Clase</label>
                                <select name="baggage" id="baggage">
                                    <option value="eco">Economico</option>
                                    <option value="vip">VIP</option>
                                </select>
                            </div>
                        </div>
                        <input class="btn-gold" type="submit" value="Buscar vuelos">
                    </form>
                </div>
                <div id="vuelta" class="tabcontent bounce">
                    <form class="vuelta flex" action="">
                        <div class="where">
                            <div class="campo">
                                <label for="origen">Desde</label>
                                <input type="text" name="origen" id="origen"
                                    placeholder="Nombre de ciudad o aeropuerto" />
                            </div>
                            <button class="change">C</button>
                            <div class="campo">
                                <label for="origen">Desde</label>
                                <input type="text" name="destino" id="destino" placeholder="Hacia" />
                            </div>
                        </div>
                        <div class="when">
                            <div class="campo">
                                <label for="f-ida">Fecha de salida</label>
                                <input type="date" name="f-ida" id="f-ida" placeholder="Fecha de ida" />
                            </div>
                            <!-- <div class="campo">
                                <label for="f-vuelta">Fecha de regreso</label>
                                <input type="date" name="f-vuelta" id="f-vuelta" placeholder="Fecha de vuelta" />
                            </div> -->
                        </div>
                        <div class="how">
                            <div class="campo">
                                <label for="passengers">Pasajeros</label>
                                <select name="passengers" id="passengers">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="campo">
                                <label for="baggage">Clase</label>
                                <select name="baggage" id="baggage">
                                    <option value="eco">Economico</option>
                                    <option value="vip">VIP</option>
                                </select>
                            </div>
                        </div>
                        <input class="btn-gold" type="submit" value="Buscar vuelos">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>
    <section class="promos">
        <div class="container text-center">
            <p class="hashtag wow bounceIn">#Promos</p>
            <h2 class="wow slideInRight">Descubre buenas promociones</h2>
            <hr class="text-center hr">
            <p class="terms">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil nemo labore aperiam suscipit
                voluptatibus iste quos, minima aliquid pariatur veritatis obcaecati eligendi eius est illo!</p>
            <div class="flex sales-father">
                <div class="big-sale">
                    <div class="filter-card">
                    <img src="img/esa.jpg" alt="">
                    <div class="back">
                        <h3>El Salvador</h3>
                        <p class="price">$399.90</p>
                        <a href="#" class="btn-red">Reservar</a>
                    </div>
                </div>
                </div>
                <div class="flex promo-content">
                    <div class="promo-item">
                        <div class=" filter-card">

                        <img src="img/paris_hero.jpg" alt="">

                        <div class="back">
                            <h3>Francia</h3>
                            <p class="price">$1500</p>
                            <a href="#" class="btn-red">Reservar</a>
                        </div>
                    </div>
                    </div>
                    <div class="promo-item">
                        <div class=" filter-card">
                        <img src="img/roatan.jpg" alt="">
                        <div class="back">
                            <h3>Honduras</h3>
                            <p class="price">$150</p>
                            <a href="#" class="btn-red">Reservar</a>
                        </div>
                    </div>
                    </div>
                    <div class="promo-item">
                        <div class=" filter-card">
                        <img src="img/Japón-sol-naciente.jpg" alt="">
                        <div class="back">
                            <h3>Japon</h3>
                        <p class="price">$1024.06</p>
                            <a href="#" class="btn-red">Reservar</a>
                        </div>
                    </div>
                    </div>
                    <div class="promo-item">
                        <div class=" filter-card">
                        <img src="img/greece.jpg" alt="">
                        <div class="back">
                            <h3>Grecia</h3>
                            <p class="price">$10.35</p>
                            <a href="#" class="btn-red">Reservar</a>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="text-center">
                <a href="promos.html" class="btn-gold">Ver mas</a>
            </div>
    </section>
    <section class="planes flex">
        <div class="banner">
            <img src="img/jet.jpg" alt="">
        </div>
        <div class="info-banner">
            <h2 class="wow flipInX" class="wow bounceInDown">Aviones que mejoran la <span>experiencia del usuario</span></h2>
            <p>Conozco acerca de nuestros aviones</p>
            <div class="text-right">
                <a href="#" class="btn-red">Ir al blog</a>
            </div>
        </div>
    </section>
    <section class="q-a">
        <div class="container">
            <p class="hashtag wow bounceIn">#Information</p>
            <h2 class="wow slideInRight">Preguntas frecuentes</h2>
            <hr class="hr">
            <div class="content flex">
                <div class="q-a-item">
                    <div class="collapse-head flex">
                            <p>Cuantas personas maximo pueden viajar</p>
                            <span class="button-qa"><img src="img/add.svg" alt=""></span>
                    </div>
                    <div class="collapse-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum rerum a cum! Eos quam sed officiis sapiente ullam dolore iusto, aperiam, a ducimus aliquid at id pariatur laborum omnis dignissimos?</p>
                    </div>   
                </div>

                <div class="q-a-item">
                    <div class="collapse-head flex">
                            <p>Cuantas personas maximo pueden viajar</p>
                            <span class="button-qa"><img src="img/add.svg" alt=""></span>
                    </div>
                    <div class="collapse-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum rerum a cum! Eos quam sed officiis sapiente ullam dolore iusto, aperiam, a ducimus aliquid at id pariatur laborum omnis dignissimos?</p>
                    </div>   
                </div>

                <div class="q-a-item">
                    <div class="collapse-head flex">
                            <p>Cuantas personas maximo pueden viajar</p>
                            <span class="button-qa"><img src="img/add.svg" alt=""></span>
                    </div>
                    <div class="collapse-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum rerum a cum! Eos quam sed officiis sapiente ullam dolore iusto, aperiam, a ducimus aliquid at id pariatur laborum omnis dignissimos?</p>
                    </div>   
                </div>

                <div class="q-a-item">
                    <div class="collapse-head flex">
                            <p>Cuantas personas maximo pueden viajar</p>
                            <span class="button-qa"><img src="img/add.svg" alt=""></span>
                    </div>
                    <div class="collapse-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum rerum a cum! Eos quam sed officiis sapiente ullam dolore iusto, aperiam, a ducimus aliquid at id pariatur laborum omnis dignissimos?</p>
                    </div>   
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="faq.html" class="btn-redb">Leer mas</a>
        </div>
    </section>
    <section class="newsletter">
        <div class="container">
        
            <h3 class="wow pulse">Susbcribete a nuestro Newsletter</h3>
            <p>Recibe noticias, descuentos, promociones ineditas antes que todos</p>
        
        <div class="campo">
            <input type="text" placeholder="usuario@correo.com">
            <button class="btn-goldred">Enviar</button>
        </div>
    </div>
    </section>
    <!-- <section class="carousel">    </section> -->
    <footer>
        <div class="container flex">
            <div class="logo"><img src="img/logos.png" alt=""></div>
            <div class="menu-foot flex">
                <li><a href="#">Terminos y Condiciones</a></li>
                <li><a href="#">Politicas de privacidad</a></li>
                <li><a href="#">Integrantes</a></li>
            </div>
            
        
        </div>
        <div class="team flex">
            <p>PHP 2019</p>
            <div class="social-networks">
                <a href="#"><svg class="network-logo" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 96.124 96.123" style="enable-background:new 0 0 96.124 96.123;"
                    xml:space="preserve">
                    <g>
               <g>
                   <path d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803
                       c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654
                       c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246
                       c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z"/>
               </g>
               
               </g>
               </svg>
               </a>

               <a href="#">
                   <svg class="network-logo" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
           <g>
               <g>
                   <path d="M352,0H160C71.648,0,0,71.648,0,160v192c0,88.352,71.648,160,160,160h192c88.352,0,160-71.648,160-160V160
                       C512,71.648,440.352,0,352,0z M464,352c0,61.76-50.24,112-112,112H160c-61.76,0-112-50.24-112-112V160C48,98.24,98.24,48,160,48
                       h192c61.76,0,112,50.24,112,112V352z"/>
               </g>
           </g>
           <g>
               <g>
                   <path d="M256,128c-70.688,0-128,57.312-128,128s57.312,128,128,128s128-57.312,128-128S326.688,128,256,128z M256,336
                       c-44.096,0-80-35.904-80-80c0-44.128,35.904-80,80-80s80,35.872,80,80C336,300.096,300.096,336,256,336z"/>
               </g>
           </g>
           <g>
               <g>
                   <circle cx="393.6" cy="118.4" r="17.056"/>
               </g>
           </g>
           </svg>
           </a>


               <a href="#">
                    <svg class="network-logo" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
               <g>
                   <g>
                       <path  d="M612,116.258c-22.525,9.981-46.694,16.75-72.088,19.772c25.929-15.527,45.777-40.155,55.184-69.411
                           c-24.322,14.379-51.169,24.82-79.775,30.48c-22.907-24.437-55.49-39.658-91.63-39.658c-69.334,0-125.551,56.217-125.551,125.513
                           c0,9.828,1.109,19.427,3.251,28.606C197.065,206.32,104.556,156.337,42.641,80.386c-10.823,18.51-16.98,40.078-16.98,63.101
                           c0,43.559,22.181,81.993,55.835,104.479c-20.575-0.688-39.926-6.348-56.867-15.756v1.568c0,60.806,43.291,111.554,100.693,123.104
                           c-10.517,2.83-21.607,4.398-33.08,4.398c-8.107,0-15.947-0.803-23.634-2.333c15.985,49.907,62.336,86.199,117.253,87.194
                           c-42.947,33.654-97.099,53.655-155.916,53.655c-10.134,0-20.116-0.612-29.944-1.721c55.567,35.681,121.536,56.485,192.438,56.485
                           c230.948,0,357.188-191.291,357.188-357.188l-0.421-16.253C573.872,163.526,595.211,141.422,612,116.258z"/>
                   </g>
               </g>
               </svg>               
               </a>


            </div>
        </div>
    </footer>
</div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/myjs.js"></script>
    <script>
     
        new WOW().init();
        
      </script>
    </body>
</html>
