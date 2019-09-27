@extends('template')
@section('title',"Lorem ipsum | Home")
@section('mainContent')


  <!-- Carousel mobile-->

  <div class="mobile">
    <div id="demo" class="carousel slide" data-ride="carousel">


      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>


      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/imgs/slides/carruselMobile1.jpg" alt="img 7" width="500" {{--height="500"--}}>
          <div class="carousel-caption">
            <h3 class="textmob">Cosmética Natural</h3>
            <p class="textsl">Productos elaborados con activos naturales.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/imgs/slides/carruselMobile2.jpg" alt="img 1" width="500" {{--height="500"--}}>
          <div class="carousel-caption">
            <h3 class="textmob">Cruelty Free</h3>
            <p class="textsl">Testeos dermatológicos sin crueldad.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/imgs/slides/carruselMobile3.jpg" alt="img 3" width="500" {{--height="500"--}}>
          <div class="carousel-caption">
            <h3 class="textmob">Cuidado capilar</h3>
            <p class="textsl">Probá nuestra nueva línea de cuidado capilar</p>
          </div>
        </div>
      </div>
      <!-- controles! -->

      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </div>


  <!--hasta aca va el carousel mobile -->


  <div class="wide">
    <div id="demo2" class="carousel slide" data-ride="carousel">

      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/imgs/slides/carrusel2.jpg" alt="img 1" width="500" {{--height="500"--}}>
          <div class="carousel-caption">
            <h3 class="titulo-interno">Cosmética Natural</h3>
            <p class="texto-interno">Productos elaborados con activos naturales.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/imgs/slides/carrusel3.jpg" alt="img 2" width="500" {{--height="500"--}} >
          <div class="carousel-caption">
            <h3 class="titulo-interno">Cruelty Free</h3>
            <p class="texto-interno">Testeos dermatológicos sin crueldad.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/imgs/slides/carrusel1.jpg" alt="img 3" width="500" {{--height="500"--}}>
          <div class="carousel-caption">
            <h3 class="titulo-interno">Cuidado facial</h3>
            <p class="texto-interno">Probá nuestra nueva línea de cuidado facial</p>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#demo2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo2" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </div>

  <!--hasta aca va el carousel wide -->
  <div class="quienessomos">
    <h1 id="nosotres" class="about">Nosotres</h1>
    <p class="aboutp"><strong>Lorem Ipsum Cosmética</strong> nace para darle belleza y cuidado a tu pelo y tu piel.
      Somos una empresa dedicada al cuidado personal, porque conocemos su importancia. Nuestro objetivo es promover el bienestar general ofreciendo productos de la mas alta calidad.
    </p>
<hr>
    <h4 class="aboutsub"> Nuestra filosofía</h4>
    <p class="aboutp">Todos nuestros productos son fabricados con ingredientes naturales, hipoalergénicos y están testeados dermatológicamente con alternativas libres de crueldad.</p>
<hr>
    <h4 class="aboutsub"> Conocenos</h4>
    <p class="aboutp">  Descubrí la riqueza y los beneficios de nuestros productos visitando nuestro catálogo, donde además podrás encontrar productos de nuestros socios, a quienes les brindamos el servicio de distribución.</p>

  </div>

  <!--ver de sumar "Los favoritos de la semana"  -->


@endsection
