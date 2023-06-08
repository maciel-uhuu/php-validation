@extends('layouts.app')

@section('content')
    <div class='container mt-5'>
        <h1>Login</h1>
        <hr>
        <form action="{{ route('client-store') }}" method="GET">
            @csrf
            <div class='form.group'>
                <div class="form-group">
                    <label for="email">E-mail: </label>
                    <input type="text" class="form-control" name="email" placeholder="Digite seu e-mail" required>
                </div>
            </div>
            <div class='form.group'>
                <div class="form-group">
                    <label for="password">Senha: </label>
                    <input type="password" class="form-control" name="password" placeholder="Digite sua senha" required>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Entrar</button>

                <button onclick="location.href='/signup'" type="button" class="btn btn-secondary">Não tenho uma
                    conta</button>
                <button onclick="location.href='/'" type="button" class="btn btn-secondary"
                    style="float: right">Voltar</button>
            </div>
        </form>
    </div>
@endsection
