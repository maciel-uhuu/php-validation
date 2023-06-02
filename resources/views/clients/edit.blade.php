@extends('layouts.app')

@section('title', 'Clients')

@section('scripts')
@vite(['resources/js/pages/edit_client.js'])
@endsection

@section('content')
<main class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Edit client') }}</div>
        <div class="card-body">
          <form action="{{ route('clients.update', $client->id) }}" class="form" id="form" data-id="{{ $client->id }}">
            @csrf
            @method('PUT')

            <div>
              <x-text-input label="Name" name="name" class="row mb-3" value="{{ $client->name }}" />
              <x-text-input type="email" label="Email" name="email" class="row mb-3" value="{{ $client->email }}" />
              <x-text-input type="password" label="Password" name="password" class="row mb-3" />
              <x-text-input type="password" label="Confirm password" name="password_confirmation" class="row mb-3" />

              <div>
                <input id="can_access_account" name="can_access_account" type="checkbox" {{ $client->can_access_account
                ? 'checked' : '' }} />
                <label for="can_access_account">User can access account?</label>
              </div>

              <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="button" id="form_btn" class="btn btn-primary">
                    {{ __('Save') }}
                  </button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
@stop