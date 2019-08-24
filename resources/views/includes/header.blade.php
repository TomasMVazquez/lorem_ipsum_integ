@php
  use App\Category;
  $categories = Category::all();
@endphp

{{-- Comienzo del header --}}
<header class="bg-dark">
  {{-- comienzp de la nav bar --}}
  <nav class="navbar navbar-expand-md mainHeader container col-12 col-md-11 col-lg-10 navbar-dark">

    {{-- logo --}}
    <div class="clmLogo col-12 col-sm-7 col-md-3 col-lg-3">
      <a class="navbar-brand" href="/">
        <img src="/imgs/logos/logo-loremipsum.png" alt="logo de lorem ipsum">
      </a>
      {{-- boton hamburguesa en mobile --}}
      <button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    {{-- fin logo --}}

    {{-- Buscador --}}
    <div class="clmPerfil col-12 col-sm-7 col-md-4 col-lg-3" style="margin-top:20px">
      <form class="searchHeader" action="/search">
        @csrf
        {{ method_field('put') }}
        <input class="col-lg-11 form-control mr-sm-2" type="text" placeholder="¡Quiero encontrarlo!" name="search">
        <button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>

    {{-- comienzo del perfil o del guest --}}
    {{-- en mobile desaparece --}}
    <div class="clmPerfilOrig col-12 col-sm-7 col-md-5 col-lg-6">
      <div class="clmPerfil perfilHeader">
        <div class="dropdown">
          {{-- Si estas logeado --}}
          @auth
          <a class="nav-link dropdown-toggle p-0" href="#" id="navbardropLogin" data-toggle="dropdown">
            Bienvenide {{Auth::user()->first_name}}
          </a>
          <div class="dropdown-menu ">
            <a class="dropdown-item" href="/profile">Mi cuenta</a>
            <a class="dropdown-item" href="/profile">Ver Favoritos</a>
            <a class="dropdown-item" href="/logout">Cerrar Sesión</a>
          </div>
        </div>

        <div class="img">
          <img src="/storage/avatars/{{ Auth::user()->avatar }}" alt="imagen de perfil del usuario logeado">
        </div>
        @endauth
        {{-- Si no estas logeado --}}
        @guest
        <div style="text-align: right;">
          Bienvenide<p><i class="fas fa-sign-in-alt mr-2"></i><a href="/login">¡Ingresá al sistema!</a></p>
        </div>
        @endguest
      </div>
    </div>
    {{-- fin del perfil lgeado o no  --}}

    <!-- Navbar links con submenu -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav mt-3">
        <li class="nav-item">
          <a class="nav-link" href="/#nosotres">Quiénes Somos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Productos
          </a>
          <div class="dropdown-menu  text-center">
            <a class="dropdown-item" href="/products">Todes</a>
            @foreach ($categories as $category)
              <a class="dropdown-item" href="/products/category/{{ $category->id }}">{{ $category->name }}</a>
            @endforeach
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/faqs">Faqs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contacto-aqui">Contacto</a>
        </li>
        {{-- Si no estas logeado --}}
        @guest
        <li class="nav-item">
          <a class="nav-link" href="/register">Registrate</a>
        </li>
        <li class="text-center perfilMobile">
          <i class="fas fa-sign-in-alt mr-2"></i>
          <a href="/login">¡Ingresá al sistema!</a>
        </li>
        @endguest
        {{-- para mobile --}}
        @auth
        <li class="text-center perfilMobile">
          <a class="nav-link dropdown-toggle p-1" href="#" id="navbardrop" data-toggle="dropdown">
            Bienvenide {{Auth::user()->first_name}}
          </a>
          <div class="dropdown-menu ">
            <a class="dropdown-item" href="/profile">Mi cuenta</a>
            <a class="dropdown-item" href="/profile">Ver Favoritos</a>
            <a class="dropdown-item" href="/logout">Cerrar Sesión</a>
          </div>
        </li>
        @endauth
      </ul>
    </div>
  </nav>
</header>
