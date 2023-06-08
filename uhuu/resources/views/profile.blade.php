@extends('layouts.app')

@section('content')
    <div class='container mt-5'>
        <h1>Olá {{ $client->name }}</h1>
        <hr>
        <div class="row">
            <button onclick="location.href='/'" type="button" class="btn btn-secondary mr-2">Voltar</button>
        </div>
    </div>
@endsection
