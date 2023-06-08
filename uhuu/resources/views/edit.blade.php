@extends('layouts.app')

@section('content')
    <div class='container mt-5'>
        <h1>Edite o Cadastro</h1>
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
        <form action="{{ route('client-update', ['id' => $client->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class='form.group'>
                <div class="form-group">
                    <label for="name">Nome: </label>
                    <input type="text" class="form-control" name="name" value="{{ $client->name }}"
                        placeholder="Digite seu nome">
                </div>
                <div class="form-group">
                    <label for="email">E-mail: </label>
                    <input type="text" class="form-control" name="email" value="{{ $client->email }}" disabled
                        placeholder="Digite seu e-mail">
                </div>
                <div class="form-group">
                    <label for="password">Nova senha: </label>
                    <input type="password" class="form-control" id="password" name="password" onkeyup='check();'
                        placeholder="Digite sua senha">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Repita a nova senha: </label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                        onkeyup='check();' placeholder="Digite sua senha novamente">
                    <span id='message'></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Atualizar">
                    <a href="javascript:history.back()" type="button" class="btn btn-secondary"
                        style="float: right">Voltar</a>
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
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
