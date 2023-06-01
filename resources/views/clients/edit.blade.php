@extends('layouts.app')

@section('title', 'Clients')

@section('content')
<main class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Edit client') }}</div>
        <div class="card-body">
          <form action="{{ route('clients.store') }}" method="POST" class="form">
            @csrf
            <div>
              <x-text-input label="Name" name="name" class="row mb-3" />
              <x-text-input type="email" label="Email" name="email" class="row mb-3" />
              <x-text-input type="password" label="Password" name="password" class="row mb-3" />
              <x-text-input type="password" label="Confirm password" name="password_confirmation" class="row mb-3" />
            </div>

            <div class="row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
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