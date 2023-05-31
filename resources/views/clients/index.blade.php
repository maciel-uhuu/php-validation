@extends('layouts.master')

@section('title', 'Clients')

@section('content')
<main>
  <h1 class="title with-larasort">Clientes</h1>
  <table>
    <thead>
      <th>@sortableLink('id', 'Id')</th>
      <th>@sortableLink('name', 'Nome')</th>
      <th>@sortableLink('email', 'Email')</th>
      <th>@sortableLink('can_access_account', 'Pode acessar?')</th>
    </thead>
    <tbody>
      @empty($clients)
      <tr>
        <td colspan="5">Nenhum cliente.</td>
      </tr>
      @else
      @foreach ($clients as $client)
      <tr class="client_table_row" data-id={{$client->id}}>
        <td>{{ $client->id }}</td>
        <td>{{ $client->name }}</td>
        <td>{{ $client->email }}</td>
        <td>
          <input class="edit_client_access" type="checkbox" checked={{$client->can_access_account}} />
        </td>
        <td>
          <a href="/edit"></a>
          <img class="client_btn edit_client_btn" src={{Vite::asset('resources/icons/edit.svg')}} />
        </td>
        <td>
          <a href="/edit"></a>
          <img class="client_btn delete_client_btn" src={{Vite::asset('resources/icons/trash.svg')}} />
        </td>
      </tr>
      @endforeach
      @endempty
    </tbody>
  </table>
</main>
@stop