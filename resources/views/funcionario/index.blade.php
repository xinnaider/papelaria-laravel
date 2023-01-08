@extends('layout')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="container mt-3" style="margin-bottom: 50px"> 
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
                @foreach ($funcionarios as $funcionario)
                    <tr>
                        <td align="center"> {{ $funcionario->nome }} </td>
                        <td align="center"> {{ $funcionario->telefone }} </td>
                        <td align="center"> {{ $funcionario->email }} </td>
                        <td align="center"> {{ $funcionario->cpf }} </td>
                        <td align="center"> {{ $funcionario->sexo }} </td>
                        <td align="center"> {{  date("d/m/Y", strtotime($funcionario->dataNascimento)) }} </td>
                        <td> 
                            <div style="display: flex; justify-content: space-evenly;">
                            <a class="botoes btn btn-primary" href="{{ route('funcionario.edit', $funcionario->id) }}" role="button"> <i class="bi bi-pencil-square"></i>  </a>
                            <form action="{{route('funcionario.delete', $funcionario->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="submitForm botoes btn btn-primary" type="submit"> <i class="bi bi-trash"></i> </button>
                            </form> 
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <a class="botoes btn btn-primary" href="{{ route('funcionario.create') }}" style="margin-top: 20px;" role="button">Registrar funcionario</a>
        </div>
    </div>
@endsection

@push('scripts')
    <script> 
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