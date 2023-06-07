@extends('layouts.app')

@section('content')
    <div class='container mt-5'>
        <h1>Bem-vindo</h1>
        <hr>
        <button onclick="location.href='/login'" type="button" class="btn btn-primary">Entrar</button>
        <button onclick="location.href='/signup'" type="button" class="btn btn-primary">Crie sua conta</button>
        <button onclick="location.href='/list'" type="button" class="btn btn-secundary">Listagem</button>
    </div>
@endsection
