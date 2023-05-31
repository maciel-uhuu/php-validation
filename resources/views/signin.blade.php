@extends('layouts.master')

@section('title', 'Clients')

@section('content')
<main>
  <form action="{{ route('signin.store') }}" method="POST" class="form">
    <h1>Login</h1>
    @csrf
    <div>
      <x-text-input type="email" label="Email" name="email" />
      <x-text-input type="password" label="Senha" name="password" />
    </div>

    <div class="form_group">
      <a href="/signup">Crie sua conta</a>
      <button type="submit">Salvar</button>
    </div>
  </form>
</main>
@stop