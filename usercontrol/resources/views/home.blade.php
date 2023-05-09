@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Essa é a sua página inicial
                    </h2>
                    
                    @foreach($users as $user)
                        {{$user->email}} <br/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
