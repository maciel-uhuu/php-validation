@extends('layouts.master')

@section('title', 'Clients')

@section('content')
<main>

  <form action="{{ route('clients.store') }}" method="POST" class="form">
    @csrf
    <h1>Criar conta</h1>
    <div>
      <x-text-input label="Nome" name="name" />
      <x-text-input type="email" label="Email" name="email" />
      <x-text-input type="password" label="Senha" name="password" />
    </div>

    <div class="form_group">
      <a href="/signin">Já tem uma conta?</a>
      <button type="submit">Entrar</button>
    </div>
  </form>
</main>
@stop