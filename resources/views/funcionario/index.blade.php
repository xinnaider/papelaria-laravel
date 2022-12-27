@extends('layout')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="container mt-3">
            <div style="margin-bottom: 50px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
                <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Funcionarios 🧑‍🔧</h1>
            </div>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Sexo</th>
                    <th>Data de Nascimento</th>
                    <th>Funções</th>
                </tr>
                @foreach ($funcionarios as $item)
                    <tr>
                        <td> {{ $item->nome }} </td>
                        <td> {{ $item->telefone }} </td>
                        <td> {{ $item->email }} </td>
                        <td> {{ $item->cpf }} </td>
                        <td> {{ $item->sexo }} </td>
                        <td> {{  date("d/m/Y", strtotime($item->dataNascimento)) }} </td>
                        <td> 
                            <div style="display: flex; justify-content: space-evenly;">
                            <a class="btn btn-primary" href="{{ route('funcionario.edit', $item->id) }}" role="button" id="botaonav"> <i class="bi bi-pencil-square"></i>  </a>
                            <form action="{{route('funcionario.delete', $item->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-primary" type="submit" id="botaonav"> <i class="bi bi-trash"></i> </button>
                            </form> 
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <a class="btn btn-primary" id="botaonav" href="{{ route('funcionario.create') }}" style="margin-top: 20px;" role="button">Adicionar funcionario</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@endsection