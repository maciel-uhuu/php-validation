@extends('layouts.auth-area')
@section('head')
    <title>Hora UTC - Login</title>
@endsection
@section('content')
    <form class="w-1/4 h-3/5 flex flex-col bg-white shadow-lg rounded-lg p-8" action="{{route('register.customer')}}" method="POST">
        @csrf
        <h1 class="text-lg font-bold">Crie sua conta agora!</h1>
        <p  class="text-base">E acompanhe o horário do mundo</p>
        <x-forms.input label="Nome completo" placeholder="Digite o seu nome completo" />
        <x-forms.input label="E-mail" placeholder="Digite o seu e-mail" />
        <x-forms.input label="Senha" placeholder="Digite a sua senha" />
        <x-button type="submit">
            Criar uma conta
        </x-button>
        <x-link-button link="{{url('/auth/login')}}">
            Já tem conta? Entre agora!
         </x-link-button>
    </form>
@endsection
