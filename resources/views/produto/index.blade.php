@extends('layout')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="container mt-3" style="margin-bottom: 50px">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-size: 20px;">
                    <li class="breadcrumb-item"><a href="{{route('inicial.index')}}" style="color: red !important;">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Produtos</li>
                </ol>
            </nav>
            <div style="margin-bottom: 25px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
                <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Produtos 📦</h1>
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
                    <a class="botoes btn btn-primary" href="{{ route('produto.create') }}" style="width: 300px;" role="button">Cadastrar produto</a>
                </div>
            </div>
            <table id="tabelaproduto">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Preço</th>
                        <th>Estoque</th>
                        <th>Funções</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($produtos as $item)
                    <tr>
                        <td align="center"> {{ $item->nome }} </td>
                        <td align="center"> {{ $item->marca }} </td>
                        <td align="center"> R$ {{ $item->preco }} </td>
                        <td align="center"> {{ $item->estoque }} (u) </td>
                        <td style="width: 200px;"> 
                            <div style="display: flex; justify-content: space-evenly;">
                            <a style="border-radius: 25px !important;" class="botoes btn btn-primary" href="{{ route('produto.edit', $item->id) }}" role="button"> <i class="bi bi-pencil-square"></i>  </a>
                            <form action="{{route('produto.delete', $item->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button style="border-radius: 25px !important;" class="submitForm botoes btn btn-primary" type="submit"> <i class="bi bi-trash"></i> </button>
                            </form> 
                            </div>
                        </td>
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
        $('#tabelaproduto tbody tr').filter(function(){
            console.log($(this).text());
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