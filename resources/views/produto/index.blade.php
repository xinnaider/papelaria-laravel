@extends('layout')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="container mt-3">
            <div style="margin-bottom: 50px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
                <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Produtos </h1>
            </div>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Marca</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Funções</th>
                </tr>
                @foreach ($produtos as $item)
                    <tr>
                        <td> {{ $item->nome }} </td>
                        <td> {{ $item->marca }} </td>
                        <td> {{ $item->preco }} </td>
                        <td> {{ $item->estoque }} </td>
                        <td> 
                            <div style="display: flex; justify-content: space-evenly;">
                            <a class="btn btn-primary" href="{{ route('produto.edit', $item->id) }}" role="button" id="botaonav"> <i class="bi bi-pencil-square"></i>  </a>
                            <form action="{{route('produto.delete', $item->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-primary" type="submit" id="botaonav"> <i class="bi bi-trash"></i> </button>
                            </form> 
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <a class="btn btn-primary" id="botaonav" href="{{ route('produto.create') }}" style="margin-top: 20px;" role="button">Adicionar produto</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@endsection