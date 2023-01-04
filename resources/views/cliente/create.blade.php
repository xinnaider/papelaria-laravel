@extends('layout')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="container mt-3">

    <div style="margin-bottom: 50px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
            <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Cadastrar cliente 🧑‍💼</h1>
    </div>
    <form action="{{ route ('cliente.store') }}" method="POST" style="background-color: #e9f2f9; border: 3px solid #ff5757; border-radius: 25px; padding: 25px;">
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
                    <input name="nome" placeholder="Fulano da Silva" type="text" class="form-control" id="nome" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input name="email" placeholder="exemplo@email.com" type="email" class="form-control" id="email" required>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col">
                <div class="mb-3">
                    <label for="Telefone" class="form-label">Telefone</label>
                    <input name="telefone" placeholder="(00) 0000-0000" onkeypress="$(this).mask('(00) 0000-0000')" type="text" class="form-control" id="telefone" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="CPF" class="form-label">CPF</label>
                    <input name="cpf" placeholder="000.000.000-00" type="text" onkeypress="$(this).mask('000.000.000-00', {reverse: true});" class="form-control" id="cpf" required>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col">
                <div class="mb-3">
                    <label for="Sexo" class="form-label">Sexo</label>
                    <select class="form-select" name="sexo" class="form-control" id="sexo" required>
                        <option value="Não dizer" selected>Prefiro não dizer</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="Datanascimento" class="form-label">Data nascimento</label>
                    <input name="dataNascimento" placeholder="__/__/____" onkeypress="$(this).mask('00/00/0000', {placeholder: '__/__/____'});" type="text" class="form-control" id="data" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-primary" id="botaonav" style="margin-right: 25px;" href="{{ route('cliente.index') }}"> Voltar </a>
            <button type="submit" class="btn btn-primary" id="botaonav">Salvar</button>
        </div>
    </form>

    </div>
</div>
@endsection