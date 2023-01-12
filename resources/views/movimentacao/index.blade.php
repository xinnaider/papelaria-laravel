@extends('layout')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="container mt-3" style="margin-bottom: 50px">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-size: 20px;">
                    <li class="breadcrumb-item"><a href="{{route('inicial.index')}}" style="color: red !important;">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Movimentações</li>
                </ol>
            </nav>
            <div style="margin-bottom: 25px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
                <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Movimentações 📈 </h1>
            </div>
            @if (session('msgAlerta'))
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle" style="margin-right: 10px;"></i>
                    <div>
                    {{session('msgAlerta')}}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row g-3" style="margin-bottom: 25px;">
                <div class="col">
                    <div class="input-group flex-nowrap" style="width: 300px;">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-search"></i> </span>
                        <input type="text" id="filtro" class="form-control" placeholder="Pesquisar" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                </div>
                <div class="col d-flex justify-content-end">
                    <a class="botoes btn btn-primary" href="{{ route('movimentacao.create') }}" style="width: 300px;" role="button">Gerar movimentação</a>
                </div>
            </div>
            <table id="tabelacliente">
                <thead>
                    <th>Produto</th>
                    <th>Tipo</th>
                    <th>Quantidade</th>
                    <th>Número da venda</th>
                </thead>
                <tbody>
                    @foreach ($movimentacoes as $movimentacao)
                        <tr>
                            <td align="center"> {{ $movimentacao->produto->nome }} </td>
                            <td align="center"> {{ $movimentacao->tipo }} </td>
                            <td align="center"> {{ $movimentacao->quantidade }} </td>
                            @if(!empty($movimentacao->venda))
                            <td align="center" style="width: 250px;"> {{ $movimentacao->venda->id }} </td>
                            @else
                            <td align="center" style="width: 250px;"> ❌ </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script> 
    $('#filtro').on('keyup', function () {
        var search = $(this).val().toLowerCase();
        $('#tabelacliente tbody tr').filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(search) > -1);
        });
    })

    $('.submitForm').on('click',function(e){
            console.log('teste');
            e.preventDefault();
            var form = $(this).parents('form');
            Swal.fire({
            title: 'Você tem certeza?',
            text: "Não será possível reverter isso!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, delete isso',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
            })
    });
    </script>
@endpush