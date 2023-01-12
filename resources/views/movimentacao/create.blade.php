@extends('layout')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="container mt-3">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 20px;">
                <li class="breadcrumb-item"><a href="{{route('inicial.index')}}" style="color: red !important;">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{route('movimentacao.index')}}" style="color: red !important;">Movimentações</a></li>
              <li class="breadcrumb-item active" aria-current="page">Gerar movimentação</li>
            </ol>
        </nav>
    <div style="margin-bottom: 50px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
            <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Gerar movimentação 📈</h1>
    </div>
    <form id="formulariomovi" action="{{ route('movimentacao.create') }}" method="POST" style="background-color: #e9f2f9; border: 3px solid #ff5757; border-radius: 25px; padding: 25px;">
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
                    <label for="produto" class="form-label">Produto</label>
                    <select class="form-select" name="produto" class="form-control" id="produto" required>
                        @foreach ($produtos as $produto)
                        <option value="{{$produto->id}}" data-qtd="{{$produto->estoque}}">{{$produto->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="estoquedisponivel" class="form-label"> Estoque atual </label>
                        <input type="number" class="form-control" id="estoquedisponivel" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col">
                <label class="form-label">Tipo de movimentação</label>
                <select class="form-select" name="tipo" class="form-control" id="tipo" required>
                    <option value="1"> Entrada </option>
                    <option value="2"> Saida </option>
                </select>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="qtd" class="form-label"> Quantidade </label>
                    <input name="qtd" placeholder="Ex: 0" onkeypress="$(this).mask('00000')" type="number" class="form-control" id="qtd" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="botoes btn btn-primary" style="margin-right: 25px;" href="{{ route('movimentacao.index') }}"> Voltar </a>
            <button type="submit" class="submit botoes btn btn-primary">Gerar</button>
        </div>
    </form>

    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        var disponivel = $("#produto option:selected").data('qtd');
        $("#estoquedisponivel").val(disponivel).change();
    });

    $("#produto").on('change', function(){
        var disponivel = $("#produto option:selected").data('qtd');
        $("#estoquedisponivel").val(disponivel).change();
    });

    $(".submit").click(function(e){
        e.preventDefault();

        var verificador = true;
        var quantidade = $("#qtd").val();

        if($("#tipo option:selected").val() == 2){
            var valor = $("#produto option:selected").data('qtd');
            if(valor < quantidade){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Verifique o estoque disponível para o produto!',
                });
            verificador = false;
            }
        }

        if(quantidade === "0" || !quantidade){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'A quantidade não pode estar vazia ou zerada!',
            });

            verificador = false;
        }
        if($("#produto option:selected").val() == undefined){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Você precisa selecionar o produto!',
            });

            verificador = false;
        }
        if(verificador === true){
            var form = $(this).parents('form');
            form.submit();
        }
    })

</script>
@endpush