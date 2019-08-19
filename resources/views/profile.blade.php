@extends('template')

{{-- Agregar el nombre del producto --}}
@section('title',"Lorem ipsum | Bienvenid@")

@section('mainContent')

<?php //Buscamos los paises en la API
  $countries = file_get_contents('https://restcountries.eu/rest/v2/all');
  //Los pasamos a un array
  $arrayCountries = json_decode($countries,true);
  
   ?>

<div class="containerProfile">
      <div class="col-12 col-md-11 col-lg-10">
        <!-- COMIENZA EL PROFILE -->
        <div class="row">
          <!-- COSTADO CON EL PROFILE -->
          <aside class="containerAside col-12 col-md-6 col-lg-5">
            <div class="aside">
              <br>
              <h2>Bienvenid@ {{ Auth::user()->first_name }} </h2>
    <img src="public/avatars/img_5d58a1488f0e4.jpeg" alt="">
              <!-- PONEMOS UN FORMULARIO AUTOCOMPLETADO PARA QUE SI QUIERE LO PUEDA EDITAR -->
              <form class="profile" method="POST" enctype="multipart/form-data" action="/profile">{{-- {{ route('profile') }} --}}

                 @csrf

                 {{method_field('put')}}

                <!-- CONTENEDOR IMAGEN AVATAR -->
                <div class="imgContainerProfile">
                  <label for="avatar"><b>Imagen de Perfil</b>
                    <div class="imgPerfil">
                      <img src="/storage/avatars/{{ Auth::user()->avatar }}" alt="Avatar"  style="cursor:pointer">

                     
                    </div>

                  </label>
                  <input id="avatar" type="file" name="avatar" class="custom-file-input">
                  {{--  if ( isset($errorsRegister['inAvatar']) ) : 
                    <div class="alert alert-danger">
                       $errorsInRegister['inAvatar'] 
                    </div>
                  endif;  --}}
                </div>

                <!-- FIN CONTENEDOR IMAGEN AVATAR -->

                <div class="container">

                 
                  <label for="user"><b>Usuario</b></label>
                  <input type="text" placeholder="Ingresar Usuario"  name="user"  value="{{Auth::user()->user}}"
                   disabled>
                  
                  

                  <label for="first_name"><b>Nombre</b></label>
                  <input id="first_name" type="text" placeholder="Ingresar Nombre" name="first_name" class="form-control @error('first_name') is-invalid @enderror"  value="{{Auth::user()->first_name}}"
                  {{-- style="isset($errorsUpdate['inName']) ? 'border: solid 1.5px #BD3131;' : ''  --}}>

                  <!-- Manejo de errores usuario -->
                  @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  {{-- if ( isset($errorsUpdate['inName']) ) : 
                  <div class="alert alert-danger">
                   $errorsUpdate['inName'] 
                  </div>--}}
                  {{-- endif --}}

                  <label for="lastName"><b>Apellido</b></label>
                  <input type="text" placeholder="Ingresar Apellido" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{Auth::user()->last_name}}"
                  {{--style=" isset($errorsUpdate['inLastName']) ? 'border: solid 1.5px #BD3131;' : ''  --}}>
                  <!-- Manejo de errores usuario -->
                  @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  {{-- if ( isset($errorsUpdate['inLastName']) ) : 
                  <div class="alert alert-danger">
                     $errorsUpdate['inLastName']
                  </div>
                   endif; --}}

                  <label for="email"><b>Email</b></label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Ingresar Email" value="{{Auth::user()->email}}"
                  {{--style="  isset($errorsUpdate['inEmail']) ? 'border: solid 1.5px #BD3131;' : ''  --}}">
                  <!-- Manejo de errores usuario -->
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  {{--  if ( isset($errorsUpdate['inEmail']) ) :  
                  <div class="alert alert-danger">
                     $errorsUpdate['inEmail']  
                  </div>
                    endif;  --}}

                  <label for="country"><b>País</b></label>
                  <select class="form-control @error('country') is-invalid @enderror custom-select" name="country">
                   @foreach ($arrayCountries as $country): 
                      @if (Auth::user()->country == $country["alpha2Code"]): 
                        <option value="{{$country["alpha2Code"]}}" selected > {{$country["name"]}} </option>
                       @else: 
                        <option value="{{$country["alpha2Code"]}} "> {{$country["name"]}} </option>
                       @endif
                    @endforeach; 
                  </select>
                  @error('country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror

                  <!-- SWITCH PARA QUE QUIERO VER -->
                  <div class="container containerSwitch">
                    @foreach ($categories as $category)
                      <div class="containerUnSwitch col-12">
                        <h5>{{$category->name}}</h5>
                      </div>
                       
                          <label for="subcategories"></label>

                        
                            <div class="container containerSwitch">
                                @foreach ($subcategories as $subcategory)
  
                                  @if ($subcategory->category_id == $category->id)
                                    <div class="col-6"> 
                                      <label class="switch">

                                        @foreach (Auth::user()->subcategories as $userCategory)
                                        
                                          @if ($userCategory->id != $subcategory->id)
                                            <input type="checkbox" name="subcategories[]" value="{{$subcategory->id}}" >
                                          @else
                                            <input type="checkbox" name="subcategories[]" value="{{$subcategory->id}}" checked>
                                          @endif

                                     @endforeach 

                                        <span class="slider round"></span>
                                      </label>
                                      <span class="switchText">{{$subcategory->name}}</span>
                                    </div>                                  
                                    @endif
                                 @endforeach
                            </div>
                          
                    @endforeach
                  </div>
                  <!-- SWITCH PARA QUE QUIERO RECIBIR -->
                  {{-- <div class="container containerSwitch">
                      @foreach ($notificaciones as $unaNotificacion) :  
                      <div class="containerUnSwitch col-12">
                        <label class="switch">
                          <input type="checkbox" name="notificaciones[]" value="  $unaNotificacion "
                             if ($_POST): 
                               if (isset($categoriasInPost)): 
                                 foreach ($categoriasInPost as $unaCatInPost): 
                                   if ($unaCatInPost == $unaCategoria): 
                                    checked
                                   endif; 
                                 endforeach; 
                               endif; 
                             else: 
                               if (isset($user['notificaciones'])) :  checked  endif; 
                             endif;  
                          >
                          <span class="slider round"></span>
                        </label>
                       
                      </div>
                     endforeach; --}}
                    <div class="container containerSwitch">
                       <div class="containerUnSwitch col-12">
                        <label class="switch">
                        
                          <input type="checkbox" name="subcategories[]" value="{{Auth::user()->notifications}}" >
                          <span class="slider round"></span>
                        </label>
                      </div>
                      <em class="switchText">Quiero recibir novedades!</em> 
                  </div> 
                  <div class="btnForm" style="margin-top:20px">
                    <button class="btn-primary" type="submit">Actualizar</button>
                  </div>
                  <hr>
                  <div class="btnForm">
                    <a class="btn btn-secondary" href="change_pass.php">Modificar Contraseña</a>
                  </div>
                  <hr>
                  <div class="btnForm btnLogOut">
                    <a class="btn btn-block log-out" href="log_out.php">Cerrar Sesión</a>
                  </div>
                </div>
              </form>
            </div>
          </aside>
          <!-- MAIN CON LOS FAVORITOS -->
          <main class="containerMain col-12 col-md-6 col-lg-7">
            <div class="main">
              <hr>
              <div class="container">
                <h2>Estos son tus favoritos</h2>
              </div>
              <hr>
              <!-- TARJETAS FAVORITOS -->
              <div class="col-12 justify-content-center">
                <div class="card">
                  <div class="tituloCardFav">
                    <h3 class="card-title">Card title</h3>
                    <div class="corazon">
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="row no-gutters">
                    <div class="col-4">
                      <img src="imgs/items/1.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-8">
                      <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="buttonsCard">
                          <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--FIN TARJETAS FAVORITOS -->
            </div>
          </main>
        </div>
        <!-- TERMINA EL PROFILE -->
      </div>

    </div>


@endsection
