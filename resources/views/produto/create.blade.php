@extends('layout')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="container mt-3">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 20px;">
                <li class="breadcrumb-item"><a href="{{route('inicial.index')}}" style="color: red !important;">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{route('produto.index')}}" style="color: red !important;">Produtos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastrar produto</li>
            </ol>
        </nav>
    <div style="margin-bottom: 50px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
            <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Cadastrar produto 📦</h1>
    </div>
    <form action="{{ route ('produto.store') }}" method="POST" style="background-color: #e9f2f9; border: 3px solid #ff5757; border-radius: 25px; padding: 25px;">
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
                    <input name="verificacao" value="true" type="hidden">
                    <label for="Nome" class="form-label">Nome</label>
                    <input name="nome" placeholder="Lápis de Cor" type="text" class="form-control" id="nome" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="Marca" class="form-label">Marca</label>
                    <input name="marca" placeholder="BIC" type="text" class="form-control" id="marca" required>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col">
                <div class="mb-3">
                    <label for="Estoque" class="form-label">Estoque inicial</label>
                    <input name="estoque" placeholder="Ex: 50" onkeypress="$(this).mask('0000')" type="text" class="form-control" id="estoque" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="Preco" class="form-label">Valor (unitário)</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">R$</span>
                    </div>
                    <input name="preco" placeholder="10.00" type="text" onkeypress="$(this).mask('000.000.000.000.000,00', {reverse: true});" class="form-control" id="preco" required aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="botoes btn btn-primary" style="margin-right: 25px;" href="{{ route('produto.index') }}"> Voltar </a>
            <button type="submit" class="botoes btn btn-primary"> Cadastrar </button>
        </div>
    </form>

    </div>
</div>
@endsection