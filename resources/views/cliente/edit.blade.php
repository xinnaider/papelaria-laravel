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
        @csrf
        <div class="mb-3">
            <label for="Nome" class="form-label">Nome</label>
            <input value="{{ $cliente->nome }}" name="nome" type="text" class="form-control" id="nome" required>
        </div>
        <div class="mb-3">
            <label for="Telefone" class="form-label">Telefone</label>
            <input value="{{ $cliente->telefone }}" 
                name="telefone" 
                type="tel"
                onkeypress="$(this).mask('(00) 0000-0000')"
                class="form-control" 
                id="telefone" 
                required>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input value="{{ $cliente->email }}" name="email" type="email" class="form-control" id="email" required>
        </div>
        
        <div class="mb-3">
            <label for="CPF" class="form-label">CPF</label>
            <input value="{{ $cliente->cpf }}" name="cpf" type="text" class="form-control" id="cpf" required>
        </div>
        <div class="mb-3">
            <label for="Sexo" class="form-label">Sexo</label>
            <select class="form-select" name="sexo" class="form-control" id="sexo" required>
                @if($cliente->sexo) <option value="{{ $cliente->sexo }}" selected> {{ $cliente->sexo }} </option> @endif
                <option value="Não dizer">Prefiro não dizer</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Datanascimento" class="form-label">Data nascimento</label>
            <input value="$cliente->dataNascimento" name="dataNascimento" type="date" class="form-control" id="dataNasc" required>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>

    </div>
</div>
@push('scripts')
<script>
    $("#telefone").mask('(##) ####-####');
</script>
@endpush
@endsection