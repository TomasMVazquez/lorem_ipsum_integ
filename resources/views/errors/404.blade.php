<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta name="title" content="@yield('title')">
    @include('/includes/head')
    <title>@yield('title', "Error")</title>

  </head>
<body>
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-6 offset-lg-3 col-sm-6 offset-sm-3 col-12 p-3 error-main">
          <div class="row">
            <div class="col-lg-8 col-12 col-sm-10 offset-lg-2 offset-sm-1">
              <h1 class="m-0 title">404</h1>
              <h2 class="about">Error!</h2>
              <p>No encontramos lo que estás buscando!.</p>
                <div class="tomGif">
                  <img src="/imgs/errorImg/tomGif.gif" alt="gif 404 not found" >
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="/js/navbar.js"></script>
@yield('scriptJS')
</body>
</html>
