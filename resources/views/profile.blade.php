@extends('template')

{{-- Agregar el nombre del producto --}}
@section('title',"Lorem ipsum | Bienvenido $user")

@section('mainContent')


<div class="containerProfile">
      <div class="col-12 col-md-11 col-lg-10">
        <!-- COMIENZA EL PROFILE -->
        <div class="row">
          <!-- COSTADO CON EL PROFILE -->
          <aside class="containerAside col-12 col-md-6 col-lg-4">
            <div class="aside">
              <br>
              <h2>Bienvenid@ {{-- {{$user->name}} --}}</h2>

              <!-- PONEMOS UN FORMULARIO AUTOCOMPLETADO PARA QUE SI QUIERE LO PUEDA EDITAR -->
              <form class="profile" method="post" enctype="multipart/form-data">

                <!-- CONTENEDOR IMAGEN AVATAR -->
                <div class="imgContainerProfile">
                  <label for="avatar"><b>Imagen de Perfil</b>
                    <div class="imgPerfil">
                      <img src="{{-- {{$user['avatar']}} --}}" alt="Avatar"  style="cursor:pointer">
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
                  <input type="text" placeholder="Ingresar Usuario" name="user" value="{{--  $user["user"] --}}"
                   disabled>

                  <label for="name"><b>Nombre</b></label>
                  <input type="text" placeholder="Ingresar Nombre" name="name" value="{{--  $user["name"]  --}}"
                  style="{{-- isset($errorsUpdate['inName']) ? 'border: solid 1.5px #BD3131;' : ''  --}}">

                  <!-- Manejo de errores usuario -->
                  {{-- if ( isset($errorsUpdate['inName']) ) : --}}
                  <div class="alert alert-danger">
                    {{--$errorsUpdate['inName'] --}}
                  </div>
                  {{-- endif --}}

                  <label for="lastName"><b>Apellido</b></label>
                  <input type="text" placeholder="Ingresar Apellido" name="lastName" value="{{-- $user["lastName"] --}}"
                  style="{{-- isset($errorsUpdate['inLastName']) ? 'border: solid 1.5px #BD3131;' : ''  --}}">
                  <!-- Manejo de errores usuario -->
                  {{-- if ( isset($errorsUpdate['inLastName']) ) : --}}
                  <div class="alert alert-danger">
                    {{-- $errorsUpdate['inLastName'] --}}
                  </div>
                  {{-- endif; --}}

                  <label for="email"><b>Email</b></label>
                  <input type="email" placeholder="Ingresar Email" name="email" value="{{--  $user["email"]  --}}"
                  style="{{--  isset($errorsUpdate['inEmail']) ? 'border: solid 1.5px #BD3131;' : ''  --}}">
                  <!-- Manejo de errores usuario -->
                  {{--  if ( isset($errorsUpdate['inEmail']) ) :  --}}
                  <div class="alert alert-danger">
                    {{--  $errorsUpdate['inEmail']  --}}
                  </div>
                  {{--  endif;  --}}

                  <label for="pais"><b>País</b></label>
                  <select class="custom-select" name="pais">
                   {{--   foreach ($arrayPaises as $pais): 
                       if ($user["pais"] == $pais["alpha2Code"]): 
                        <option value=" $pais["alpha2Code"] " selected > $pais["name"] </option>
                       else: 
                        <option value=" $pais["alpha2Code"] "> $pais["name"] </option>
                       endif; 
                     endforeach;  --}}
                  </select>

                  <!-- SWITCH PARA QUE QUIERO VER -->
                  <div class="container containerSwitch">
                    {{--  foreach ($categorias as $unaCategoria) :  --}}
                      <div class="containerUnSwitch col-12">
                        <label class="switch">
                          <input type="checkbox" name="categorias[]" value="{{--  $unaCategoria "
                             if ($_POST): 
                               if (isset($categoriasInPost)): 
                                 foreach ($categoriasInPost as $unaCatInPost): 
                                   if ($unaCatInPost == $unaCategoria): 
                                    checked
                                   endif; 
                                 endforeach; 
                               endif; 
                             else: 
                               if (isset($user['categorias'])) : 
                                 foreach ($user['categorias'] as $categoria) : 
                                   if ($categoria == $unaCategoria) : 
                                    checked
                                   endif; 
                                 endforeach; 
                               endif; 
                             endif;  --}}
                          >
                          <span class="slider round"></span>
                        </label>
                        <span class="switchText switchTextPerfil">{{--  $unaCategoria  --}}</span>
                      </div>
                    {{--  endforeach;  --}}
                  </div>
                  <!-- SWITCH PARA QUE QUIERO RECIBIR -->
                  <div class="container containerSwitch">
                    {{--  foreach ($notificaciones as $unaNotificacion) :  --}}
                      <div class="containerUnSwitch col-12">
                        <label class="switch">
                          <input type="checkbox" name="notificaciones[]" value="{{--  $unaNotificacion  --}}"
                            {{--  if ($_POST): 
                               if (isset($categoriasInPost)): 
                                 foreach ($categoriasInPost as $unaCatInPost): 
                                   if ($unaCatInPost == $unaCategoria): 
                                    checked
                                   endif; 
                                 endforeach; 
                               endif; 
                             else: 
                               if (isset($user['notificaciones'])) :  checked  endif; 
                             endif;  --}}
                          >
                          <span class="slider round"></span>
                        </label>
                        <em class="switchText">Quiero recibir {{--  $unaNotificacion  --}}</em>
                      </div>
                    {{--  endforeach;  --}}
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
          <main class="containerMain col-12 col-md-6 col-lg-8">
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
