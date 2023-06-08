@extends('layouts.app')

@section('content')
    <div class='container mt-5'>
        <h1>Login</h1>
        <hr>
        @if (count($errors))
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        @endif
        <form action="{{ route('client-login') }}" method="GET">
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
                <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Entrar">

                <button onclick="location.href='/signup'" type="button" class="btn btn-secondary">Não tenho uma
                    conta</button>
                <button onclick="location.href='/'" type="button" class="btn btn-secondary"
                    style="float: right">Voltar</button>
            </div>
        </form>
    </div>
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection