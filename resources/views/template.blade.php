<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta name="title" content="@yield('title')">
    @include('/includes/head')
    <title>@yield('title')</title>
  </head>
  <body>
    @include('/includes/header', App\Category::All())
    <div class="content">
      @yield('mainContent')
    </div>
    @include('/includes/footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="/js/navbar.js"></script>
    @yield('scriptJS')
  </body>
</html>
