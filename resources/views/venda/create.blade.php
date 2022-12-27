@extends('layout')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="container mt-3">

    <div style="margin-bottom: 50px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
            <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Cadastrar venda 🛒</h1>
    </div>
    <form action="{{ route ('venda.store') }}" method="POST" style="background-color: #e9f2f9; border: 3px solid #ff5757; border-radius: 25px; padding: 25px;">
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
                    <label for="Produto" class="form-label">Produto</label>
                    <select class="form-select" name="produto" class="form-control" id="produto" required>
                        @foreach ($produto as $item)
                        <option value="{{$item->id}}">{{$item->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="Cliente" class="form-label">Cliente</label>
                    <select class="form-select" name="cliente" class="form-control" id="cliente" required>
                        @foreach ($cliente as $item)
                        <option value="{{$item->id}}">{{$item->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col">
                <div class="mb-3">
                    <label for="Funcionario" class="form-label">Vendedor</label>
                    <select class="form-select" name="funcionario" class="form-control" id="funcionario" required>
                        @foreach ($funcionario as $item)
                        <option value="{{$item->id}}">{{$item->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row g-3">
                <div class="col">
                    <label class="form-label">Estoque</label>
                    <ul class="list-group" id="lista1">
                    @foreach ($produto as $item)
                    <li class="list-group-item" id="teste" onclick="addItem(this)">{{$item->nome}}</li>
                    @endforeach
                    </ul>
                </div>
                <div class="col">
                    <label class="form-label">Carrinho de compras (Coloque algo para aparecer)</label>
                    <ul class="list-group" id="lista2">
                    </ul>
                </div>
        </div>
        <div class="row g-3">
            <label class="form-label">‎ </label>
            <button type="submit" class="btn btn-primary form-control" id="botaonav">Enviar</button>
        </div>
        </div>
            <!-- <button type="submit" class="btn btn-primary form-control" id="botaonav">Enviar</button> -->
        </div>
    </form>

    <script>
        function addItem(variavel) {
            var a = document.getElementById("lista2");
            var candidate = variavel.textContent;
            var li = document.createElement("li");

            if (document.body.contains(document.getElementById(candidate))) {
                window.alert('Já existe')
            } else {
                li.setAttribute('id', candidate);
                li.appendChild(document.createTextNode(candidate));
                li.classList.add("list-group-item");
                var r= $('<input type="text" name="quantidade[]" style="width: 50px; height: 24px; margin-left: 10px;"> </input> <i class="bi bi-trash-fill" style="background-color: #ff5757; border-radius: 5px; padding: 5px; margin-left: 10px; cursor: pointer;" onclick="removeItem(this.id)" id="' + candidate + '"></i> <input style="visibility: hidden; width: 1px; height: 1px;" type="text" value="' + candidate + '" name="produto[]"></input>');
                a.appendChild(li);
                $('#'+candidate).append(r);
            }

        }
 
        // Creating a function to remove item from list
        function removeItem(variavel) {
            // Declaring a variable to get select element
            $('#'+variavel).remove();
        }
    </script>

    </div>
</div>
@endsection