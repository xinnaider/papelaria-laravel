@extends('layout')

@section('content')


{{-- {{ isset($errors) ? $errors: 'Não tem erro' }} --}}

    <div class="container d-flex justify-content-center">
        <div class="container mt-3">
            <div style="margin-bottom: 50px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
                <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Vendas 🛒 </h1>
            </div>
            <table>
                <tr>
                    <th>Funcionario</th>
                    <th>Cliente</th>
                </tr>
                @foreach ($vendas as $venda)
                    <tr>
                        <td>{{ $venda->funcionario->nome }}</td>
                        <td>{{ $venda->cliente->nome }}</td>
                    {{-- @foreach ($venda->produtosVenda as $produto)
                        <td> {{ $produto->quantidade }} </td>
                        <td> {{ $produto->produtos }} </td>
                    @endforeach --}}
                    </tr>
                @endforeach
            </table>
            <a class="btn btn-primary" id="botaonav" href="{{ route('venda.create') }}" style="margin-top: 20px;" role="button">Cadastrar venda</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@endsection