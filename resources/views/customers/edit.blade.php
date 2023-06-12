@extends('layouts.container')
@section('head')
    <title>Edição de um cliente</title>
@endsection
@section('content')
    <div class="flex items-center">
        <a href="/customers">
            <x-button :margin="false">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Voltar
            </x-button>
        </a>
        <h1 class="ml-4 text-xl font-bold text-white">Edição do cliente {{ $customer->name }}</h1>
    </div>
    <div class="w-full h-auto bg-white mt-8 rounded-lg flex items-center p-8">
        <form class="flex-1 h-full flex flex-col justify-between bg-white rounded-lg mr-4"
            action="{{route('customers.update', ['customer' => $customer->id])}}" method="POST">
            @method('PUT')
            @csrf
            <h3 class="text-lg font-bold">Edite um novo cliente</h3>
            <div class="w-full flex flex-col">
                <x-forms.checkbox
                    id="active"
                    label="Ativo"
                    value="{{ $customer->active }}"
                />
                <x-forms.input
                    id="name"
                    label="Nome" placeholder="Digite o seu nome"
                    value="{{ $customer->name }}"
                    error="{{ str_replace('name', 'nome', $errors->first('name')) }}"
                />
                <x-forms.input
                    id="email"
                    label="E-mail" placeholder="Digite o seu e-mail" type="email"
                    value="{{ $customer->email }}"
                    error="{{ $errors->first('email') }}"
                />
                <x-button type="submit">
                    Editar cliente
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
