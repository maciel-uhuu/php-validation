@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Clientes</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">@sortablelink('id')</th>
                    <th scope="col">@sortablelink('name', 'Nome')</th>
                    <th scope="col">@sortablelink('email', 'E-mail')</th>
                    <th scope="col">@sortablelink('active', 'Ativo')</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr class="dd">
                        <th>{{ $client->id }}</th>
                        <th>{{ $client->name }}</th>
                        <th>{{ $client->email }}</th>
                        <th>{{ $client->active ? 'Ativo' : 'Inativo' }}</th>
                        <th>
                            <div class="row">
                                <a class="btn btn-light mr-2" data-toggle="tooltip" title="Editar"
                                    href="{{ route('client-edit', ['id' => $client->id]) }}"><i
                                        class="fa fa-pencil"></i></a>
                                @if ($client->active == 0)
                                    <form action="{{ route('client-active', ['id' => $client->id]) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-light ml-2" data-toggle="tooltip"
                                            title="Ativar"><i class="fa fa-eye"></i></button>
                                    </form>
                                @else
                                    <form action="{{ route('client-deactive', ['id' => $client->id]) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-light ml-2" data-toggle="tooltip"
                                            title="Desativar"><i class="fa fa-eye-slash"></i></button>
                                    </form>
                                @endif
                                <form action="{{ route('client-destroy', ['id' => $client->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-light ml-2" data-toggle="tooltip"
                                        title="Excluir"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-10">
                {!! $clients->appends(\Request::except('page'))->render() !!}
            </div>
            <div class="col-sm-2">
                <button onclick="location.href='/'" type="button" class="btn btn-secondary"
                    style="float: right">Voltar</button>
            </div>
        </div>
    </div>
@endsection
