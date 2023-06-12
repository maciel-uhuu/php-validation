@extends('layouts.auth-area')
@section('head')
    <title>Hora UTC - Login</title>
@endsection
@section('content')
    <form class="w-1/4 h-1/2 flex flex-col bg-white shadow-lg rounded-lg p-8" action="/admin/auth/signin" method="POST">
        @csrf
        <h1 class="text-lg font-bold">Bem vindo! Acesse agora o nosso sistema</h1>
        <p  class="text-base">E acompanhe a hora internacional</p>
        <x-forms.input label="E-mail" placeholder="Digite o seu e-mail" />
        <x-forms.input label="Senha" placeholder="Digite a sua senha" />
        <x-button type="submit">
           Entrar
        </x-button>
        <x-link-button link="{{url('/auth/register')}}">
            Ainda não tem conta? Crie uma!
         </x-link-button>
    </form>
@endsection
