@extends('layouts.app')

@section('content')
    <div class='container'>
        <h1>Cadastro</h1>
        <hr>
        <form action="" method="POST">
            <div class='form.group'>
                <div class="form-group">
                    <label for="name">Nome: </label>
                    <input type="text" class="form-control" name="name" placeholder="Digite seu nome">
                </div>
                <div class="form-group">
                    <label for="email">E-mail: </label>
                    <input type="text" class="form-control" name="email" placeholder="Digite seu e-mail">
                </div>
                <div class="form-group">
                    <label for="password">Senha: </label>
                    <input type="password" class="form-control" id="password" name="password" onkeyup='check();'
                        placeholder="Digite sua senha">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Repita a senha: </label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" onkeyup='check();'
                        placeholder="Digite sua senha novamente">
                    <span id='message'></span>
                </div>
            </div>
        </form>
        <button onclick="location.href='/login'" type="button" disabled id="post">Criar</button>
        <button onclick="location.href='/login'" type="button">Já tenho uma conta</button>
        <button onclick="location.href='/'" type="button">Voltar</button>
    </div>
@endsection

@section('javascript')
    <script>
        var check = function() {
            if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';
                document.getElementById('post').disabled = false;
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matching';
                document.getElementById('post').disabled = true;
            }
        }
    </script>
@endsection
