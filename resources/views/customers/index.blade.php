@extends('layouts.container')
@section('head')
    <title>Listagem de clientes </title>
@endsection
@section('content')
    <div class="flex items-center justify-between">
        <h1 class="text-xl font-bold text-white">Clientes</h1>
        <div class="actions flex items-center">
            <a href="{{url('/customers/create')}}" class="mr-4">
                <x-button :margin="false">
                    Excluir cliente
                </x-button>
            </a>
            <a href="{{url('/customers/create')}}">
                <x-button :margin="false">
                    Adicionar cliente
                </x-button>
            </a>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">

                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Nome
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            E-mail
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <x-modal.modal-delete
                        :args="['customer' => $customer->id]"
                        id="{{ $customer->id }}" routeDelete="customers.destroy"
                    />
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <input type="checkbox" />
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $customer->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $customer->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $customer->active ? 'Ativo' : 'Desativado' }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="/customers/{{ $customer->id }}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Editar
                            </a>
                            <a onclick="handleClickModal('{!! $customer->id !!}')" class="font-medium text-red-600 hover:underline ml-4">
                                Excluir
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if ($customers->hasPages())
        <div class="pagination">
            @if (!$customers->onFirstPage())
                <a href={{ $customers->previousPageUrl() }} class="btn">
                    <span class="material-icons">navigate_before</span>
                </a>
            @endif
            <small>
                {{ $customers->currentPage() }}
            </small>
            @if ($customers->hasMorePages())
                <a href={{ $customers->nextPageUrl() }} class="btn">
                    <span class="material-icons margin-left">navigate_next</span>
                </a>
            @endif
        </div>
    @endif
@endsection
<footer>
    <script src="{{asset('js/modal.js')}}"></script>
</footer>
