<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Papelaria Cia.</title>
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/components.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
        <link href="{{ asset('css/venda.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
      </head>
    <body>
      <nav class="navbar" style="margin-bottom: 30px; background-color:#e9f2f9; border-bottom: 5px solid #ff5757">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="{{ asset('imgs/papelaria.png') }}" onclick=" window.location.href = '{{ route('inicial.index') }}'" alt="Logo" width="75" class="d-inline-block align-text-top">
            <div class="d-flex justify-content-end">
            <a class="botoes btn p-2 px-3 m-3 nav-link" aria-current="page" href="{{ route('inicial.index') }}">Inicio</a>
            <a class="botoes btn p-2 px-3 m-3 nav-link" href="{{ route('cliente.index') }}">Cliente</a>
            <a class="botoes btn p-2 px-3 m-3 nav-link" href="{{ route('vendedor.index') }}">Vendedor</a>
              <div class="dropdown">
                <button class="botoes btn dropdown-toggle p-2 px-3 m-3 nav-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Estoque
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('produto.index') }}">Produtos</a></li>
                  <li><a class="dropdown-item" href="{{ route('movimentacao.index') }}">Movimentações</a></li>
                </ul>
              </div>            
            <a class="botoes btn p-2 px-3 m-3 nav-link" href="{{ route('venda.index') }}">Venda</a>
            </div>
          </a>
        </div>
      </nav>
      <div>
          @if (session('msgInsert'))
            @push('scripts')
            <script> 
              // Swal.fire(
              // 'Bom trabalho!',
              // '{{session('msgInsert')}}',
              // 'success'
              // )
              Toastify({
              text: "{{session('msgInsert')}}",
              duration: 3000,
              close: true,
              gravity: "top",
              position: "center",
              stopOnFocus: true,
              style: {
                margintop: '250px',
                background: 'rgb(63,156,53)',
              }
              }).showToast();
            </script>
            @endpush
          @endif
          @if (session('msgDelete'))
            @push('scripts')
            <script> 
              // Swal.fire(
              //   'Bom trabalho!',
              //   '{{session('msgDelete')}}',
              //   'success'
              // )
              Toastify({
              text: "{{session('msgDelete')}}",
              duration: 3000,
              close: true,
              gravity: "top",
              position: "center",
              stopOnFocus: true,
              style: {
                margintop: '250px',
                background: 'rgb(63,156,53)',
              }
              }).showToast();
            </script>
            @endpush
          @endif
          @if (session('msgEdit'))
            @push('scripts')
            <script> 
              // Swal.fire(
              //   'Bom trabalho!',
              //   '{{session('msgEdit')}}',
              //   'success'
              // )
              Toastify({
              text: "{{session('msgEdit')}}",
              duration: 3000,
              close: true,
              gravity: "top",
              position: "center",
              stopOnFocus: true,
              style: {
                margintop: '250px',
                background: 'rgb(63,156,53)',
              }
            }).showToast();
            </script>
            @endpush
          @endif
          @yield('content')
      </div>
      <!-- JavaScript Bundle with Popper -->
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.js" integrity="sha512-NMtENEqUQ8zHZWjwLg6/1FmcTWwRS2T5f487CCbQB3pQwouZfbrQfylryimT3XvQnpE7ctEKoZgQOAkWkCW/vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
      @stack('scripts')
    </body>
</html>