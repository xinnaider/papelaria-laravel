<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Page Title</title>
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/components.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
      </head>
    <body>
      <nav class="navbar" style="margin-bottom: 30px; background-color:#e9f2f9; border-bottom: 5px solid #ff5757">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="{{ asset('imgs/papelaria.png') }}" alt="Logo" width="75" class="d-inline-block align-text-top">
            <div class="d-flex justify-content-end">
            <a class="btn p-2 px-3 m-3 nav-link" id="botaonav" aria-current="page" href="{{ url('/') }}">Inicio</a>
            <a class="btn p-2 px-3 m-3 nav-link" id="botaonav" href="{{ route('cliente.index') }}">Cliente</a>
            <a class="btn p-2 px-3 m-3 nav-link" id="botaonav" href="{{ route('funcionario.index') }}">Funcionario</a>
            <a class="btn p-2 px-3 m-3 nav-link" id="botaonav" href="{{ route('produto.index') }}">Produto</a>
            </div>
          </a>
        </div>
      </nav>
      <div>
          @yield('content')
      </div>
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.js" integrity="sha512-NMtENEqUQ8zHZWjwLg6/1FmcTWwRS2T5f487CCbQB3pQwouZfbrQfylryimT3XvQnpE7ctEKoZgQOAkWkCW/vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
      @section('scripts')
      @endsection
    </body>
</html>