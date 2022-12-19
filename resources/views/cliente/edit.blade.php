@extends('layout')

@section('content')

<div class="container d-flex justify-content-center">
    <div class="container mt-3">

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <label> {{ $error }} </label>
        @endforeach
    @endif

    <form action="{{ route ('cliente.update', $cliente->id) }}" method="post">
        @method("PUT")
        @csrf
        <div class="mb-3">
            <label for="Nome" class="form-label">Nome</label>
            <input value="{{ $cliente->nome }}" name="nome" type="text" class="form-control" id="validationTooltip01" required>
        </div>
        <div class="mb-3">
            <label for="Telefone" class="form-label">Telefone</label>
            <input value="{{ $cliente->telefone }}" name="telefone" type="text" class="form-control" id="validationTooltip01" required>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input value="{{ $cliente->email }}" name="email" type="email" class="form-control" id="validationTooltip01" required>
        </div>
        
        <div class="mb-3">
            <label for="CPF" class="form-label">CPF</label>
            <input value="{{ $cliente->cpf }}" name="cpf" type="text" class="form-control" id="validationTooltip01" required>
        </div>
        <div class="mb-3">
            <label for="Sexo" class="form-label">Sexo</label>
            <select class="form-select" name="sexo" class="form-control" id="validationTooltip01" required>
                <option value="{{ $cliente->sexo }}"> {{ $cliente->sexo }} </option>
                <option value="Não dizer">Prefiro não dizer</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Datanascimento" class="form-label">Data nascimento</label>
            <input value="{{ date("m-d-Y", strtotime($cliente->dataNascimento)) }}" name="dataNascimento" type="date" class="form-control" id="validationTooltip01" required>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>

    </div>
</div>

@endsection