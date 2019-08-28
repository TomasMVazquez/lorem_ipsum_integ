@extends('template')

{{-- Agregar el nombre del producto --}}
@section('title',"Lorem ipsum | Bienvenid@")

@section('mainContent')



<div class="containerProfile">
      <div class="col-12 col-md-11 col-lg-10">
        <!-- COMIENZA EL PROFILE -->


        <div class="row">
          <!-- COSTADO CON EL PROFILE -->
          <aside class="containerAside col-12  col-lg-5">
            <div class="aside">
              <br>
              <h2>Bienvenid@ {{ Auth::user()->first_name }}</h2>

              <!-- PONEMOS UN FORMULARIO AUTOCOMPLETADO PARA QUE SI QUIERE LO PUEDA EDITAR -->
              <form class="profile theForm" method="post" enctype="multipart/form-data">

                 @csrf

                 {{method_field('put')}}

                <!-- CONTENEDOR IMAGEN AVATAR -->
                <div class="imgContainerProfile">
                  <label for="avatar">
                    <input id="avatar" type="file" name="avatar" class="custom-file-input">
                    <div class="imgPerfil">
                      <img src="/storage/avatars/{{ Auth::user()->avatar }}" alt="Avatar"  style="cursor:pointer">
                    </div>
                  @error('avatar')
                    <span class="invalid-feedback imgError" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  <p class="m-3">¡Modifica tu foto clickeando en la imagen!</p>
                  </label>


                </div>
                <!-- FIN CONTENEDOR IMAGEN AVATAR -->

                <div class="container form-group">

                  <label for="user"><b>Usuario</b></label>
                  <input id="name" class="form-control" type="text" placeholder="Ingresar Usuario" name="user" value="{{Auth::user()->user}}"
                   disabled>

                  <label for="name"><b>Nombre</b></label>
                   <input id="first_name" type="text" placeholder="Ingresar Nombre" name="first_name" class="form-control @error('first_name') is-invalid @enderror"  value="{{Auth::user()->first_name}}" autocomplete="first_name" autofocus>

                   @error('first_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  <div class="invalid">
                    <!-- Mensaje de error -->
                  </div>


                  <label for="lastName"><b>Apellido</b></label>
                  <input type="text" placeholder="Ingresar Apellido" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{Auth::user()->last_name}}" autocomplete="last_name" autofocus>

                  @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                   <div class="invalid">
                    <!-- Mensaje de error -->
                  </div>

                  <label for="email"><b>Email</b></label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Ingresar Email" value="{{Auth::user()->email}}">

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror

                   <div class="invalid">
                    <!-- Mensaje de error -->
                  </div>

                  <div class="form-group row">
              <label for="country" class="col-md-4 col-xl-2 col-form-label text-md-right">{{ __('País') }}</label>


              <div class="col-md-8 col-xl-10">
                    <input type="hidden" name="pais_del_usuario" value="{{ Auth::user()->country }}">
                    <select class="form-control @error('country') is-invalid @enderror custom-select" name="country">

                      <option value="">Seleccionar país</option>

                    </select>
                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="invalid">
                      <!-- Mensaje de error -->
                    </div>

              </div>
          </div>
          <div class="selectProvince form-group row" style="display: none;">
              <label for="province" class="col-md-4 col-xl-2 col-form-label text-md-right">{{ __('Provincia') }}</label>


              <div class="col-md-8 col-xl-10">
                    <select class="form-control @error('province') is-invalid @enderror custom-select"  name="province">
                      <option value="">Seleccionar provincia</option>
                    </select>
                    @error('province')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

              </div>
          </div>




                  <hr>

                  <div>


                  <!-- SWITCH PARA QUE QUIERO VER -->
                  <label for="categories"><b>¿Qué te interesa?</b></label>
                  <div class="container containerSwitch p-0">
                   @foreach ($categories as $category)
                      <div class="containerUnSwitchProfile col-12 p-0">

                        <div class="w-100 mb-3">
                          <span class="switchTextCat"> <strong>{{$category->name}}</strong></span>
                        </div>


                        @foreach ($subcategories as $subcategory)

                            @if ($subcategory->category_id == $category->id)
                                <div class="col-8 col-md-6 p-0 mb-3">
                                  <label class="switch">
                                    <input type="checkbox" name="subcategories[]" value="{{$subcategory->id}}"
                                      @if ($_POST)
                                        @if (isset($categoriesInPost))
                                          @foreach ($categoriesInPost as $categoryInPost)
                                            @if ($categoryInPost == $subcategory->id) checked
                                            @endif
                                          @endforeach
                                        @endif

                                        @else
                                          @if (isset(Auth::user()->subcategories))
                                            @foreach (Auth::user()->subcategories as $userSubcategory)

                                               @if ($userSubcategory->id == $subcategory->id) checked
                                                @endif
                                            @endforeach
                                          @endif
                                        @endif >



                                    <span class="slider round"></span>
                                  </label>
                                  <span class="switchText switchTextPerfil"> {{$subcategory->name}}</span>
                                </div>
                            @endif
                          @endforeach

                      </div>


                   @endforeach

                </div>
              </div>

              <hr>
                  <!-- SWITCH PARA QUE QUIERO RECIBIR -->
                  <div class="container containerSwitch p-0">
                    {{--  foreach ($notificaciones as $unaNotificacion) :  --}}
                      <div class="containerUnSwitch col-12 p-0">
                        <label class="switch">
                          <input type="checkbox" name="notifications" value="
                            1"

                          @if ($_POST)
                            @if (isset(Auth::user()->notifications))
                              checked
                            @endif
                          @endif


                          @if(Auth::user()->notifications == 1 )
                              checked
                          @endif
                          >


                          <span class="slider round"></span>
                        </label>

                        <strong class="switchTextNoticias">Quiero recibir noticias!</strong>
                      </div>

                  </div>

                  <div class="btnForm" style="margin-top:20px">
                    <button class="btn-primary" type="submit">Actualizar</button>
                  </div>
                  <hr>

                  <div class="btnForm">
                    <a class="btn btn-secondary" href="">Modificar Contraseña</a>
                  </div>
                  <hr>
                  <div class="btnForm btnLogOut">
                    <a class="btn btn-block log-out" href="/logout">Cerrar Sesión</a>
                  </div>
                </div>
              </form>
            </div>
          </aside>
          <!-- MAIN CON LOS FAVORITOS -->
          <main class="containerMain col-12 col-lg-7">
            <div class="main">

              <hr>

              <div class="container">
                <h5>Estos son tus favoritos</h5>
              </div>

              <hr>
              <!-- TARJETAS FAVORITOS -->
              @foreach ($products as $product)
                @foreach (Auth::user()->products as $userProduct)
                  @if($userProduct->id == $product->id)

                    <div class="col-12 favProduct">


                      <div class="col-12 col-md-4 col-lg-3 p-0">
                         <img src="/storage/items/{{ $userProduct->images->first()->route }}" class="fav-img" alt="...">
                      </div>

                      <div class="col-12 col-md-8 col-lg-9 p-0">

                        <h5 class="fav-title">{{$userProduct->name}}</h5>
                        <p style="font-size: 14px;">{{$userProduct->brief}}</p>

                        <div class="d-flex justify-content-between align-items-center">

                          <div class="btn btn-secondary"><a href="products/{{ $userProduct->id }}">Ver Producto</a></div>

                          <form id="theFavForm" method="post" class="corazon " style="margin:0;">
                            <input class="form-control" type="text" name="fav-id" readonly value="{{ $product->id }}" style="display:none;">
                            <input class="form-control" type="text" name="user-id" readonly value="@auth{{Auth::user()->id}}@endauth" style="display:none;">
                            <button type="submit" name="button" style="background: none;border: none;padding:0;">
                               @auth
                                  @php $var = true; @endphp

                                  @foreach (Auth::user()->products as $oneFav)
                                    @if ($oneFav->id == $product->id)
                                      <i class="fas fa-heart"></i>
                                      @php $var = false; @endphp
                                      @continue
                                    @endif
                                  @endforeach

                                  @if ($var)
                                    <i class="far fa-heart"></i>
                                  @endif
                                @endauth
                                @guest
                                    <i class="far fa-heart"></i>
                                @endguest
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endif
                @endforeach
              @endforeach

              <!--FIN TARJETAS FAVORITOS -->
            </div>
          </main>
        </div>
        <!-- TERMINA EL PROFILE -->
      </div>

    </div>


@endsection

@section('scriptJS')
  <script type="text/javascript" src="/js/countries.js"></script>
  <script type="text/javascript" src="/js/provinces.js"></script>
  <script src="/js/registerValidate.js"></script>
  <script src="/js/favorite.js"></script>
@endsection
