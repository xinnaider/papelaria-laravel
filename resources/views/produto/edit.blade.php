@extends('layout')

@section('content')

<div class="container d-flex justify-content-center">
    <div class="container mt-3">

    <div style="margin-bottom: 50px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
            <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Editar funcionario 📦</h1>
    </div>
    <form action="{{ route ('produto.update', $produto->id) }}" method="post" style="background-color: #e9f2f9; border: 3px solid #ff5757; border-radius: 25px; padding: 25px;">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <label> • {{ $error }} </label> <br>
            @endforeach
        </div>
        @endif
        <div class="row g-3">
            <div class="col">
                <div class="mb-3">
                    <label for="Nome" class="form-label">Nome</label>
                    <input name="nome" value="{{ $produto->nome }}" placeholder="Lápis de Cor" type="text" class="form-control" id="nome" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="Marca" class="form-label">Marca</label>
                    <input name="marca" value="{{ $produto->marca }}" placeholder="BIC" type="text" class="form-control" id="marca" required>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col">
                <div class="mb-3">
                    <label for="Estoque" class="form-label">Estoque inicial</label>
                    <input name="estoque" value="{{ $produto->estoque }}" placeholder="Ex: 50" onkeypress="$(this).mask('0000')" type="text" class="form-control" id="estoque" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="Preco" class="form-label">Valor (unitário)</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">R$</span>
                    </div>
                    <input name="preco" value="{{ $produto->preco }}" placeholder="10.00" type="text" onkeypress="$(this).mask('000.000.000.000.000,00', {reverse: true});" class="form-control" id="preco" required aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="submitForm btn btn-primary" id="botaonav" style="margin-right: 25px;" href="{{ route('produto.index') }}"> Voltar </a>
            <button type="submit" class="submitForm btn btn-primary" id="botaonav">Salvar</button>
        </div>
    </form>

    </div>
</div>
@endsection

@push('scripts')
    <script> 
    $('.submitForm').on('click',function(e){
            e.preventDefault();
            var form = $(this).parents('form');
            Swal.fire({
            title: 'Confirmar a alteração?',
            text: "Não será possível reverter isso!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
            })
    });
    </script>
@endpush
