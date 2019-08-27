@extends('template')

{{-- Agregar el nombre del producto --}}
@section('title',"Lorem ipsum | $id")

@section('mainContent')


<div class="row justify-content-center" style="margin:5px 0">
  <div class="col-12 col-md-11 col-xl-10">
    <!--Barra de navegacion -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/products/">Productos</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            {{ $product->name }}
        </li>
      </ol>
    </nav>
    <!--Fin Barra de navegacion -->
    <!--Producto detallado -->
    <section class="producto-detallado">
      <div class="card">
        <div class="row">
          <div class="img-producto col-md-5">
            <img class="card-img-top" src="/storage/items/{{ $product->images->first()->route}}"
            alt="Imagen Producto 1">
            <div class="img-min">
             @foreach ($product->images as $prodImg)
               <!-- Large modal -->
            <button type="button" class="" data-toggle="modal" data-target=".bd-example-modal-lg">
              <img src="/storage/items/{{$prodImg->route}}" alt="{{ $product->name }}" style="width:50px;">
            </button>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <img src="/storage/items/{{$prodImg->route}}" alt="{{ $product->name }}" style="width:300px;">
                </div>
              </div>
            </div>

              @endforeach
            </div>
          </div>

          <div class="col-md-7">
            <div class="card-body">
              <div class="encabezado-producto">
                <h5 class="card-title nombre-producto-detalle" style="text-align:left;">
                  {{ $product->name }}
                </h5>
                <div>
                  <ul class="corazon">
                    <li style="width:20%">
                      <form id="theFavForm" method="post" style="margin:0;">
                        <input class="form-control" type="text" name="fav-id" readonly value="{{ $product->id }}" style="display:none;">
                        <input class="form-control" type="text" name="user-id" readonly value="@auth{{Auth::user()->id}}@endauth" style="display:none;">
                        <button type="submit" name="button" style="background: none;border: none;padding:0;">
                          @auth
                            @php
                              $var = true;
                            @endphp

                            @foreach (Auth::user()->products as $oneFav)
                              @if ($oneFav->id == $product->id)
                                <i class="fas fa-heart"></i>
                                @php
                                  $var = false;
                                @endphp
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
                    </li>
                  </ul>

                </div>
              </div>
              <hr>
              <p class="card-text">
              {{ $product->brief }}
              </p>
              <hr>
              <div class="presentaciones">
                <p style="text-transform:uppercase;"><strong>Presentaciones</strong></p>
                <ul>
              @foreach ($product->presentation as $presentation)
                  <li class="presentacion">
                  {{ $presentation->type }}
                  </li>
              @endforeach
                </ul>
              </div>
              <hr>
              <br>
              <!-- Acordeon con info -->
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <span style="font-size:1.1em;">+</span> Descripción
                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      {{ $product->description }}
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span style="font-size:1.1em;">+</span> Beneficios
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      {{ $product->benefits }}
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span style="font-size:1.1em;">+</span> Modo de uso
                      </button>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      {{ $product->uses }}
                    </div>
                  </div>
                </div>
              </div>
              <!-- Fin Acordeon con info -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Fin Producto detallado -->
  </div>
</div>
@endsection
