@extends('layouts.container')
@section('head')
    <title>Listagem de clientes </title>
@endsection
@section('content')
    <h1 class="text-xl font-bold text-white mb-4">Clientes</h1>
    <div class="flex items-center justify-between">
        <form class="flex flex-1 m-0 p-0 mr-20" method="GET">
            <x-forms.input
                id="search"
                label="" placeholder="Pesquise usando o nome ou e-mail"
                height="h-12"
                marginFieldset="mr-4"
                widthFieldset="flex-1"
                value={{$search}}
            />
            <x-button :margin="false" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
                Pesquisar
            </x-button>
        </form>
        <div class="flex items-center">
            <a href="{{url('/customers/create')}}" class="mr-4">
                <x-button :margin="false" mode="danger">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    Excluir clientes selecionados
                </x-button>
            </a>
            <a href="{{url('/customers/create')}}">
                <x-button :margin="false">
                    <i class="fa fa-plus" aria-hidden="true"></i>
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
                        title="Exclusão do cliente {{$customer->name}}"
                        description="Cuidado! ao excluir o cliente {{$customer->name}} não será possível reverter a ação"
                        buttonText="Excluir o cliente"
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
                            <a onclick="handleClickModal('{!! $customer->id !!}')" class="font-medium text-red-600 hover:underline ml-4 cursor-pointer">
                                Excluir
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if ($customers->hasPages())
        <div class="flex items-center justify-center mt-4">
            <a href={{ $customers->previousPageUrl().'&search='.$search }} class="text-white">
                <x-button :disabled="$customers->onFirstPage()" :margin="false">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    Voltar
                </x-button>
            </a>
            <small class="text-base text-white mx-4 font-bold">
                {{ $customers->currentPage() }}
            </small>
            <a href={{ $customers->nextPageUrl().'&search='.$search }} class="text-white">
                <x-button :disabled="!$customers->hasMorePages()" :margin="false">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    Próxima
                </x-button>
            </a>
        </div>
    @endif
@endsection
<footer>
    <script src="{{asset('js/modal.js')}}"></script>
</footer>
