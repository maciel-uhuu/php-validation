@extends('layouts.app')

@section('content')
    <div class='container mt-5'>
        <h1>Cadastro</h1>
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
        <form action="{{ route('client-store') }}" method="POST">
            @csrf
            <div class='form.group'>
                <div class="form-group">
                    <label for="name">Nome: </label>
                    <input type="text" class="form-control" name="name" placeholder="Digite seu nome" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail: </label>
                    <input type="text" class="form-control" name="email" placeholder="Digite seu e-mail" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha: </label>
                    <input type="password" class="form-control" id="password" name="password" onkeyup='check();'
                        placeholder="Digite sua senha" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Repita a senha: </label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                        onkeyup='check();' placeholder="Digite sua senha novamente" required>
                    <span id='message'></span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit" disabled>Enviar</button>

                    <button onclick="location.href='/login'" type="button" class="btn btn-secondary">Já tenho uma
                        conta</button>
                    <button onclick="location.href='/'" type="button" class="btn btn-secondary"
                        style="float: right">Voltar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('javascript')
    <script>
        var check = function() {
            if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                document.getElementById('message').innerHTML = '';
                document.getElementById('submit').disabled = false;
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Senhas não correspondentes';
                document.getElementById('submit').disabled = true;
            }
        }

        var confirm = function() {

        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
