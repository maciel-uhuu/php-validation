@extends('layouts.app')

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr class="dd">
                    <th>{{ $client->id }}</th>
                    <th>{{ $client->name }}</th>
                    <th>{{ $client->email }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$clients->onEachSide(1)->links()}}
@endsection
