@extends('layout')

@section('content')


{{-- {{ isset($errors) ? $errors: 'Não tem erro' }} --}}

    <div class="container d-flex justify-content-center">
        <div class="container mt-3" style="margin-bottom: 50px">
            <div style="margin-bottom: 50px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
                <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Vendas 🛒 </h1>
            </div>
            <table>
                <tr>
                    <th> # </th>
                    <th> Funcionario </th>
                    <th> Cliente </th>
                    <th> Data e Hora </th>
                    <th> Produtos vendidos </th>
                </tr>
                @foreach ($vendas as $venda)
                    <tr>
                        <td align="center" style="width: 50px;">{{ $venda->id }}</td>
                        <td align="center">{{ $venda->funcionario->nome }}</td>
                        <td align="center">{{ $venda->cliente->nome }}</td>
                        <td align="center">{{ $venda->dataHora }}</td>
                        <td align="center" style="width: 200px;"><button type="button" class="botoes btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$venda->id}}"> <i class="bi bi-box2-fill"></i> </button></td>
                    </tr>
                @endforeach
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
                        <tr>
                            <th> Nome </th>
                            <th> Marca </th>
                            <th> Valor (u)</th>
                            <th> Quantidade vendida</th>
                        </tr>
                    @foreach ($venda->produtosVenda as $produtos)
                        <tr>
                            <td align="center"> {{$produtos->produto->nome}} </td>
                            <td align="center"> {{$produtos->produto->marca}} </td>
                            <td align="center"> {{$produtos->produto->preco}} </td>
                            <td align="center"> {{$produtos->quantidade}} </td>
                        </tr>
                    @endforeach
                    </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="botoes btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                    </div>
                </div>
                </div>
            @endforeach
            <a class="botoes btn btn-primary" href="{{ route('venda.create') }}" style="margin-top: 20px;" role="button">Cadastrar venda</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@endsection