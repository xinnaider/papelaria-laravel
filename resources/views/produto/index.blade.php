@extends('layout')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="container mt-3" style="margin-bottom: 50px">
            <div style="margin-bottom: 50px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
                <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Produtos 📦</h1>
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
                        <td align="center"> {{ $item->nome }} </td>
                        <td align="center"> {{ $item->marca }} </td>
                        <td align="center"> R$ {{ $item->preco }} </td>
                        <td align="center"> {{ $item->estoque }} (u) </td>
                        <td style="width: 200px;"> 
                            <div style="display: flex; justify-content: space-evenly;">
                            <a class="btn btn-primary" href="{{ route('produto.edit', $item->id) }}" role="button" id="botaonav"> <i class="bi bi-pencil-square"></i>  </a>
                            <form action="{{route('produto.delete', $item->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="submitForm btn btn-primary" type="submit" id="botaonav"> <i class="bi bi-trash"></i> </button>
                            </form> 
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <a class="btn btn-primary" id="botaonav" href="{{ route('produto.create') }}" style="margin-top: 20px;" role="button">Registrar produto</a>
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