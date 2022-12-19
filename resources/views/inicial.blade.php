@extends('layout')

@section('content')
    <div class="container d-flex justify-content-center">
        <div> 
            <div class="row d-flex justify-content-center" style="margin-bottom: 50px;">
                <img src="{{ asset('imgs/papelaria.png') }}" alt="Logo" style="width: 300px; text-align: center;">
            </div>
            <div class="row g-3">
                <h1 style="color: #ff5757;"> Bem-vindo ao sistema de gerenciamento da Papelaria Cia.</h2>
            </div>
        </div>
    </div>
@endsection