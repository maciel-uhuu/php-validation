@extends('layouts.auth-area')
@section('head')
    <title>Admin Login</title>
@endsection
@section('content')
    <form class="w-1/4 h-1/2 flex flex-col bg-white shadow-lg rounded-lg p-8" action="{{ route('admin.submit.login') }}" method="POST">
        @csrf
        <h1 class="text-lg font-bold">Entre agora para gerir os seus clientes</h1>
        <p  class="text-base">Acesse e faça a gestão dos seus clientes</p>
        <x-forms.input
            id="email" type="email" label="E-mail" placeholder="Digite o seu e-mail"
            error="{{ str_replace('email', 'e-mail', $errors->first('email')) }}"
        />
        <x-forms.input
            id="password" type="password" label="Senha" placeholder="Digite a sua senha"
            error="{{ str_replace('password', 'senha', $errors->first('password')) }}"
        />
        <x-button type="submit">
           Entrar
        </x-button>
    </form>
@endsection
