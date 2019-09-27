@extends('template')

{{-- Agregar el nombre del categoría --}}
@section('title',"Lorem ipsum | Productos")

@section('mainContent')

<div class="contenedor-productos">
    <div class="row justify-content-center row-sin-margen">
      <div class="col-12 col-md-11 col-xl-10">

<!--encabezado-->

        <div>
          @if (isset($fromCategory))
            <h1 class="tit-productos-cat"><a href="/products/category/{{ $categoryId  }}">{{ $fromCategory }}</a></h1>
            <h1 class="tit-productos-subcat"><span class="punto">{{ "·" }}</span>{{ $title }}</h1>
          @elseif ($title!=null)
            <h1 class="tit-productos"> {{ $title }}</h1>
          @else
            <h1 class="tit-productos">Productos</h1>
          @endif
          @if (isset($subtitle))
            <h5>{{ $subtitle }}</h5>
          @endif

        </div>

<!--fin encabezado-->


<!--listado de articulos-->

  <div class="listado-productos">
    @foreach ($products as $product)

      <div class="col-md-6 col-lg-4 col-producto">
        <div class="card producto">
          <a href="/products/{{ $product->id }}"><img src="/storage/items/{{ $product->images->first()->route }}" class="card-img-top" alt="{{ $product->name }}"></a>
          <div class="card-body detalle-producto">
            <div class="encabezado-producto">
              <h5 class="card-title nombre-producto text-left">
                <a href="/product-detail/{{ $product->id }}">
                  {{   $product->name  }}
                </a>
              </h5>
              <div>
                <ul class="corazon">
                  <li class="w-20">
                    <form class="m-0" id="theFavForm" method="post">
                      <input class="form-control d-none" type="text" name="fav-id" readonly value="{{ $product->id }}">
                      <input class="form-control d-none" type="text" name="user-id" readonly value="@auth{{Auth::user()->id}}@endauth">
                      <button class="btnHeart" type="submit" name="button">
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
              <div class="">
                <ul class="corazon">
                  <li class="w-20">
                    <button class="btnHeart" data-html="true" data-toggle="popover" id="showPopover">
                      <i class="fas fa-share-alt"></i>
                    </button>
                  </li>
                </ul>
              </div>
            </div>
            <p class="card-text">
              {{str_limit($product->brief, $limit = 100, $end= '...')}} </p>


              <div class="boton-detalle">
                <a class="btn btn-primary btn-block" href="/products/{{ $product->id }}" role="button">Ver detalle</a>
              </div>
            </div>
          </div>
        </div>
    @endforeach

    </div>
    <!-- fin listado de articulos-->

    </div>
  </div>
</div>

@endsection
@section('scriptJS')
    <script src="/js/favorite.js"></script>
    <script src="/js/share.js"></script>
@endsection
