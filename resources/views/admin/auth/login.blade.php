@extends('layouts.auth-area')
@section('head')
    <title>PHP - Admin Login</title>
@endsection
@section('content')
    <form class="w-1/4 h-1/2 flex flex-col bg-white shadow-lg rounded-lg p-8" action="/admin/auth/signin" method="POST">
        @csrf
        <h1 class="text-lg font-bold">Entre agora para gerir os seus clientes</h1>
        <p  class="text-base">Acesse e faça a gestão dos seus clientes</p>
        <x-forms.input label="E-mail" placeholder="Digite o seu e-mail" />
        <x-forms.input label="Senha" placeholder="Digite a sua senha" />
        <x-button type="submit">
           Entrar
        </x-button>
        <x-link-button link="{{url('admin/auth/register')}}">
            Criar uma conta
         </x-link-button>
    </form>
@endsection
