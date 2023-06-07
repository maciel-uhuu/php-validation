@extends('layouts.app')

@section('content')
    <h1>Bem-vindo</h1>
    <button onclick="location.href='/login'" type="button">Entrar</button>
    <button onclick="location.href='/signup'" type="button">Crie sua conta</button>
@endsection
