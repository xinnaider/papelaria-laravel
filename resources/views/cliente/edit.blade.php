@extends('layout')

@section('content')

<div class="container d-flex justify-content-center">
    <div class="container mt-3">

    <div style="margin-bottom: 50px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
            <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Editar cliente 🧑‍💼</h1>
    </div>
    <form action="{{ route ('cliente.update', $cliente->id) }}" method="post" style="background-color: #e9f2f9; border: 3px solid #ff5757; border-radius: 25px; padding: 25px;">
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
                    <input value="{{ $cliente->nome }}" name="nome" type="text" class="form-control" id="nome" required>
                </div>
            </div>
            <div class="col">
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
            </div>
        </div>
        <div class="row g-3">
            <div class="col">
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input value="{{ $cliente->email }}" name="email" type="email" class="form-control" id="email" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="CPF" class="form-label">CPF</label>
                    <input value="{{ $cliente->cpf }}" name="cpf" onkeypress="$(this).mask('000.000.000-00', {reverse: true});" type="text" class="form-control" id="cpf" required>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col">
                <div class="mb-3">
                    <label for="Sexo" class="form-label">Sexo</label>
                    <select class="form-select" name="sexo" class="form-control" id="sexo" required>
                        @if($cliente->sexo) <option value="{{ $cliente->sexo }}" selected> {{ $cliente->sexo }} </option> @endif
                        <option value="Não dizer">Prefiro não dizer</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="Datanascimento" class="form-label">Data nascimento</label>
                    <input value="{{ date('d/m/Y', strtotime($cliente->dataNascimento)) }}" name="dataNascimento" onkeypress="$(this).mask('00/00/0000', {placeholder: '__/__/____'});" type="text" class="form-control" id="dataNasc" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-primary" id="botaonav" style="margin-right: 25px;" href="{{ route('cliente.index') }}"> Voltar </a>
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