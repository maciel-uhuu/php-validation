@extends('layouts.container')
@section('head')
    <title>Criação de um cliente</title>
@endsection
@section('content')
    <div class="flex items-center">
        <a href="/customers">
            <x-button :margin="false">
                Voltar
            </x-button>
        </a>
        <h1 class="ml-4 text-xl font-bold text-white">Cadastro de clientes</h1>
    </div>
    <div class="w-full h-auto bg-white mt-8 rounded-lg flex items-center p-8">
        <form class="flex-1 h-full flex flex-col justify-between bg-white rounded-lg mr-4" action="{{route('customers.store')}}" method="POST">
            @csrf
            <h3 class="text-lg font-bold">Cadastre um novo cliente no sistema</h3>
            <div class="w-full flex flex-col">
                <x-forms.input
                    id="name"
                    label="Nome" placeholder="Digite o seu nome"
                    error="{{ str_replace('name', 'nome', $errors->first('name')) }}"
                />
                <x-forms.input
                    id="email"
                    label="E-mail" placeholder="Digite o seu e-mail" type="email"
                    error="{{ $errors->first('email') }}"
                />
                <x-forms.input
                    id="password"
                    label="Senha" placeholder="Digite a sua senha" type="password"
                    error="{{ str_replace('password', 'senha', $errors->first('password')) }}"
                />
                <x-button type="submit">
                    Criar novo cliente
                </x-button>
                @if(session('success'))
                    <h4 class="text-base font-bold text-green-700">{{session('success')}}</h4>
                @endif
            </div>
        </form>
        <div class="flex-1 h-full bg-red-800 flex items-center justify-center">
            IMAGE
        </div>
    </div>
@endsection
