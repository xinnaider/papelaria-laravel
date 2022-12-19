<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
      <nav class="navbar" style="margin-bottom: 100px; background-color:#e9f2f9; border-bottom: 5px solid #ff5757">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="{{ asset('imgs/papelaria.png') }}" alt="Logo" width="75" class="d-inline-block align-text-top">
            <div class="d-flex justify-content-end">
            <a class="btn p-2 px-3 m-3 nav-link" id="botaonav" aria-current="page" href="{{ url('/') }}">Inicio</a>
            <a class="btn p-2 px-3 m-3 nav-link" id="botaonav" href="{{ route('cliente.index') }}">Cliente</a>
            </div>
          </a>
        </div>
      </nav>
      <div>
          @yield('content')
      </div>
      </body>
</html>