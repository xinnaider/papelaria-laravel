@extends('layout')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="container mt-3">
            <table class="table">
                <caption>Lista de Clientes</caption>
                <thead class="table-secondary">
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>CPF</th>
                        <th>Sexo</th>
                        <th>DataNascimento</th>
                        <th>Funções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $item)
                        <tr>
                            <td> {{ $item->nome }} </td>
                            <td> {{ $item->telefone }} </td>
                            <td> {{ $item->email }} </td>
                            <td> {{ $item->cpf }} </td>
                            <td> {{ $item->sexo }} </td>
                            <td> {{  date("m-d-Y", strtotime($item->dataNascimento)) }} </td>
                            <td> 
                                <div style="display: flex; justify-content: space-evenly;">
                                <a class="btn btn-primary" href="{{ route('cliente.edit', $item->id) }}" role="button">Atualizar</a>
                                <form action="{{route('cliente.delete', $item->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-primary" type="submit"> Deletar </button>
                                </form> 
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{ route('cliente.create') }}" role="button">Adicionar cliente</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@endsection