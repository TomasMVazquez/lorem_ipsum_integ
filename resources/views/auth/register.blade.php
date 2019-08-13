@extends('template')

@section('title',"Lorem ipsum | Register")

@section('mainContent')

  <?php //Buscamos los paises en la API
  $paises = file_get_contents('https://restcountries.eu/rest/v2/all');
  //Los pasamos a un array
  $arrayPaises = json_decode($paises,true);

?>



  <div class="mainContainer">
    <!-- TITULO DE LA PAG -->
    <div class="col-12 col-md-11 col-xl-10">
      <h1 class="titulo">Registro</h1>
      <p>
        Completá el formulario para crear una cuenta.
      </p>
    </div>
    <!-- FIN TITULO DE LA PAG -->
  </div>


<div class="mainContainer">

    <form class="col-12 col-md-11 col-xl-10" method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
      @csrf


    <div class="container containerRegister">
      <!-- CONTENEDOR IMAGEN AVATAR -->
      <div class="imgcontainer col-12 col-md-5 col-xl-4">
        <label for="avatar">
          <img src="/imgs/img_avatar4.png" alt="Avatar" class="avatar" style="cursor:pointer">
          <span class="imgtexto">Foto de Perfil</span>
        </label>
        <input id="avatar" type="file" name="avatar" class="custom-file-input">
        <!-- Manejo de errores en la imagen -->
        @error('avatar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

      </div>
      <!-- FIN CONTENEDOR IMAGEN AVATAR -->

      <!-- CONTENEDOR USUARIO NOMBRE APELLIDO EMAIL PAIS -->
      <div class="container col-12 col-md-7 col-xl-8">
        <div class="form-group row">
            <label for="user" class="col-md-4 col-xl-2 col-form-label text-md-right">{{ __('Usuario') }}</label>

            <div class="col-md-8 col-xl-10">
                <input id="name" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ old('user') }}" autocomplete="user" autofocus>

                @error('user')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="first_name" class="col-md-4 col-xl-2 col-form-label text-md-right">{{ __('Nombre') }}</label>

            <div class="col-md-8 col-xl-10">
                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"  autocomplete="first_name" autofocus>

                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="last_name" class="col-md-4 col-xl-2 col-form-label text-md-right">{{ __('Apellido') }}</label>

            <div class="col-md-8 col-xl-10">
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-xl-2 col-form-label text-md-right">{{ __('E-Mail') }}</label>

            <div class="col-md-8 col-xl-10">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="country" class="col-md-4 col-xl-2 col-form-label text-md-right">{{ __('País') }}</label>

            <div class="col-md-8 col-xl-10">
                  <select class="form-control @error('country') is-invalid @enderror custom-select" name="country">
                    <option value="">Seleccionar país</option>
                    @foreach ($arrayPaises as $pais)
                        <option value="{{$pais["alpha2Code"]}}"> {{$pais["name"]}} </option>
                    @endforeach
                  </select>
                @error('country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

      </div>
      <!-- FIN CONTENEDOR USUARIO NOMBRE APELLIDO EMAIL PAIS -->

    </div>

    <hr>

    {{--CONTENEDOR DESDE CATEGORIAS HASTA EL FINAL--}}
    <div>
      <div class="col-12">
        <!-- SWITCH PARA QUE QUIERO VER -->
        <label for="categories"><b>Categorías</b></label>
        <div class="container containerSwitch">
            @foreach ($categories as $oneCategory)
              <div class="containerUnSwitchCat col-6 col-md-4 col-xl-4">
                {{-- <label class="switch">
                  <input type="checkbox" name="categories[]">
                  <span class="slider round"></span>
                </label> --}}
                <span class="switchText">{{$oneCategory->name}}</span>
              </div>

              <label for="subcategories"></label>
              <div class="container containerSwitch">

                @foreach ($subcategories as $oneSubcategory)

                  @if ($oneSubcategory->category_id == $oneCategory->id)

                    <div class="containerUnSwitchCat col-6 col-md-4 col-xl-4">
                      <label class="switch">
                        <input type="checkbox" name="subcategories[]" value="{{$oneSubcategory->id}}">
                        <span class="slider round"></span>
                      </label>
                      <span class="switchText">{{$oneSubcategory->name}}</span>
                    </div>

                  @endif

                @endforeach

              </div>
            @endforeach
        </div>
        <!-- FIN SWITCH PARA QUE QUIERO VER -->
        <!-- SWITCH PARA QUE QUIERO RECIBIR -->
        <div class="container containerSwitch">

            <div class="containerUnSwitchNot col-12">
              <label class="switch">
                <input type="checkbox" name="notifications" value="1"
                @if ($_POST)
                  @if (isset($notifInPost))
                    checked
                  @endif
                @else
                  checked
                @endif
                 >
                <span class="slider round"></span>
              </label>
              <em class="switchText">Quiero recibir noticias </em>
            </div>
        </div>
        <!-- FIN SWITCH PARA QUE QUIERO RECIBIR -->
      </div>
      <hr>
      <div class="container col-8 col-md-10 col-xl-8">
        <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

          <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Repetir Contraseña') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Recordarme') }}
                </label>
            </div>
        </div>
    </div>

    <div>
        Al crearse una cuenta, usted acepta nuestros
        <a href="#" style="color:dodgerblue">Terminos & Condiciones</a>.
    </div>

      </div>
    </div>
    {{--FIN CONTENEDOR DESDE CATEGORIAS--}}

    <div class="container">
      <div class="btnForm">
        <button class="btn-secondary volver" type="button">Volver</button>
        <button class="btn-primary" type="submit">{{ __('Registrarse') }}</button>
      </div>
    </div>


  </form>

</div>
@endsection
