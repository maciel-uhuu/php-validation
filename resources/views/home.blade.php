@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="public/vendor/larasort/css/larasort.css">
@vite(['resources/sass/pages/home.scss'])
@endsection

@section('scripts')
@vite(['resources/js/pages/home.js'])
@endsection

@section('content')
<main>
  <h1 class="title with-larasort">Clients</h1>
  <table>
    <thead>
      <th>@sortableLink('id', 'Id')</th>
      <th>@sortableLink('name', 'Name')</th>
      <th>@sortableLink('email', 'Email')</th>
      <th>@sortableLink('can_access_account', 'Can access?')</th>
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
          <input class="edit_client_access" type="checkbox" {{ $client->can_access_account ? 'checked' : '' }} />
        </td>
        <td>
          <a href="{{ route('clients.edit', ['client' => $client]) }}">
            <img class="client_btn edit_client_btn" src={{Vite::asset('resources/icons/edit.svg')}} />
          </a>
        </td>
        <td>
          <button type="button">
            <img class="client_btn delete_client_btn" src={{Vite::asset('resources/icons/trash.svg')}} />
          </button>
        </td>
      </tr>
      @endforeach
      @endempty
    </tbody>
  </table>
</main>
@stop