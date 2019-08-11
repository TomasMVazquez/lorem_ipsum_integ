
<?php
$menu = [
  "Quiénes Somos" => "index.php#nosotres",
  "Productos" => [
    "Cósmetica Capilar" => "/products",
    "Corporales" => "/products",
  ],
  /*"Registrate" => "register.php",
  "Perfil" => "perfil.php",*/
  "Faqs" => "/faqs",
  "Contacto" => "#contacto-aqui",
]
?>

<header class="bg-dark">
  <nav class="navbar navbar-expand-md mainHeader container col-12 col-md-11 col-lg-10 navbar-dark">

    <div class="clmLogo col-12 col-sm-7 col-md-6 col-lg-3">
        <a class="navbar-brand" href="index.php"><img src="/imgs/logos/logo-loremipsum.png" alt=""></a>
        <button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
       </button>
    </div>

    <div class="clmPerfil col-12 col-sm-7 col-md-6 col-lg-8">

    <div class="col-7 perfilHeader">
        <div class="dropdown">
          @auth
            <a class="nav-link dropdown-toggle p-0"  href="#" id="navbardrop" data-toggle="dropdown">
              Bienvenide {{Auth::user()->first_name}}
               {{-- {{$imgPerfil = $user['imgProfile']}} --}}
            </a>

            <div class="dropdown-menu ">
               <a class="dropdown-item" href="/profile">Mi cuenta</a>
               <a class="dropdown-item" href="/profile">Ver Favoritos</a>
               <a class="dropdown-item" href="/logout">Cerrar Sesión</a>
            </div>

            </div>

             <div class="img">
               <img src="/storage/avatars/{{Auth::user()->avatar}}" alt="imagen de perfil del usuario logeado">
             </div>
          @endauth
          @guest
            <div style="text-align: right;">
               Bienvenide<p><i class="fas fa-sign-in-alt mr-2"></i><a href="/login">¡Ingresá al sistema!</a></p>
            </div>
          @endguest

          </div>


      </div>

         <form class="searchHeader" action="/action_page.php">
           <input class="col-lg-11 form-control mr-sm-2" type="text" placeholder="¡Quiero encontrarlo!">
           <button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
         </form>


    </div>

    <!-- Navbar links con submenu -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav mt-3">
        @foreach($menu as $boton => $seccion)
          <!-- Esta parte es para el desplegable -->
          @if(is_array($seccion))
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                {{$boton}}
              </a>

              <div class="dropdown-menu  text-center">
                @foreach ($seccion as $suboton => $subseccion)
                  <a class="dropdown-item" href="{{$subseccion}}">{{$suboton}}</a>
                @endforeach
              </div>
            </li>
          @else
              <!-- Si no es desplegable -->
              <li class="nav-item"><a class="nav-link" href="{{$seccion}}">{{$boton}}</a></li>
          @endif
        @endforeach

        @guest
            <li class="nav-item"><a class="nav-link" href="/register">Registrate</a></li>
        @endguest

        <li class="text-center perfilMobile">
              @auth
                 <a class="nav-link dropdown-toggle p-1" href="#" id="navbardrop" data-toggle="dropdown">
                   {{"Bienvenide "}}
                 </a>
                 <div class="dropdown-menu ">
                   <a class="dropdown-item" href="/profile">Mi cuenta</a>
                   <a class="dropdown-item" href="/profile">Ver Favoritos</a>
                   <a class="dropdown-item" href="/logout">Cerrar Sesión</a>
                 </div>
               @endauth
               @guest
                  <div>
                    <i class="fas fa-sign-in-alt mr-2"></i><a href="/login">¡Ingresá al sistema!</a>
                  </div>
               @endguest
         </li>
      </ul>
 </nav>

</header>
