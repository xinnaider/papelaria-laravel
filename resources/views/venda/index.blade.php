@extends('layout')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="container mt-3" style="margin-bottom: 50px">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-size: 20px;">
                    <li class="breadcrumb-item"><a href="{{route('inicial.index')}}" style="color: red !important;">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vendas</li>
                </ol>
            </nav>
            <div style="margin-bottom: 25px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
                <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Vendas 🛒 </h1>
            </div>
            <div class="row g-3" style="margin-bottom: 25px;">
                <div class="col">
                    <div class="input-group flex-nowrap" style="width: 300px;">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-search"></i> </span>
                        <input type="text" id="filtro" class="form-control" placeholder="Pesquisar" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                </div>
                <div class="col d-flex justify-content-end">
                    <a class="botoes btn btn-primary" href="{{ route('venda.create') }}" style="width: 300px;" role="button"> Realizar venda </a>
                </div>
            </div>
            <table id="tabelavenda">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Vendedor </th>
                    <th> Cliente </th>
                    <th> Método de Pagamento </th>
                    <th> Valor total vendido </th>
                    <th> Data e Hora </th>
                    <th> Produtos vendidos </th>
                    <th> Imprimir nota </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($vendas as $venda)
                    <tr>
                        <td align="center" style="width: 50px;">#{{ $venda->id }}</td>
                        <td align="center">{{ $venda->Vendedor->nome }}</td>
                        <td align="center">{{ $venda->cliente->nome }}</td>
                        <td align="center">{{ $venda->metodoPagamento }}</td>
                        <td align="center">R$ {{ $venda->valorTotal }}</td>
                        <td align="center">{{ $venda->dataHora->format('d-m-Y / H:i:s') }}</td>
                        <td align="center" style="width: 170px;"> <button type="button" style="border-radius: 25px !important;" class="botoes btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$venda->id}}"> <i class="bi bi-box2-fill"></i> </button> </td>
                        <td align="center" style="width: 170px;"> <a href="{{route('venda.pdf', $venda->id)}}" type="button" style="border-radius: 25px !important;" class="botoes btn btn-primary"> <i class="bi bi-download"></i> </a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @foreach ($vendas as $venda)
                <div class="modal fade" id="modal{{$venda->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Produtos vendidos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <table>
                        <thead>
                            <tr>
                                <th> Nome </th>
                                <th> Marca </th>
                                <th> Valor (u)</th>
                                <th> Quantidade vendida</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($venda->produtosVenda as $produtos)
                                <tr>
                                    <td align="center"> {{$produtos->produto->nome}} </td>
                                    <td align="center"> {{$produtos->produto->marca}} </td>
                                    <td align="center"> {{$produtos->produto->preco}} </td>
                                    <td align="center"> {{$produtos->quantidade}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="botoes btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#filtro').on('keyup', function () {
            var search = $(this).val().toLowerCase();
            $('#tabelavenda tbody tr').filter(function(){
                console.log($(this).text());
                $(this).toggle($(this).text().toLowerCase().indexOf(search) > -1);
            });
        })
    </script>
@endpush