@extends('layouts.master')

@section('title', 'Clients')

@section('content')
<main>
  <h1>Lista de clientes</h1>
  <ul>
    @foreach ($clients as $client)
    <li>
      {{ $client->name }}
      {{ $client->email }}
    </li>
    @endforeach
  </ul>
</main>
@stop