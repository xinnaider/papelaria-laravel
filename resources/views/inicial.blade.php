@extends('layout')

@section('content')
    <div class="container d-flex justify-content-center">
        <!-- <div> 
            <div class="row d-flex justify-content-center" style="margin-bottom: 50px;">
                <img src="{{ asset('imgs/papelaria.png') }}" alt="Logo" style="width: 300px; text-align: center;">
            </div>
            <div class="row g-3">
                <h1 style="color: #ff5757;"> Bem-vindo ao sistema de gerenciamento da Papelaria Cia.</h2>
            </div>
        </div> -->
        <div>
            <div class="row" style="margin-top: 75px">
                <div class="col d-flex align-items-center" style="margin-top: 75px">
                    <img src="{{ asset('imgs/papelaria.png') }}" alt="Logo" style="width: 300px; margin-top: 75px; margin-right: 100px;">
                </div>
                <div class="col">
                <div class="row g-0" style="width: 750px; height: 200px;">
                    <div class="col">
                        <button id="botoesinicial" style="background-color:#b1cf72; width: 100%; height: 100%; border-top-left-radius: 50px;"  onclick="window.location='{{ route('venda.create') }}'"> VENDER </button>
                    </div>
                    <div class="col">
                        <button id="botoesinicial" style="background-color:#e36b6b; width: 100%; height: 100%; border-top-right-radius: 50px;" onclick="window.location='{{ route('produto.index') }}'"> PRODUTOS </button>
                    </div>
                </div>
                <div class="row g-0" style="height: 200px;">
                    <button id="botoesinicial" style="background-color:#008584; width: 100%; height: 100%;" onclick="window.location='{{ route('cliente.index') }}'"> CLIENTES </button>
                    <button id="botoesinicial" style="background-color:#ffc55f; width: 100%; height: 100%; border-bottom-left-radius: 50px; border-bottom-right-radius: 50px;" onclick="window.location='{{ route('funcionario.index') }}'"> FUNCIONARIOS </button>
                    </div>
                </div>
                </div>
            </div>
        </div>
@endsection