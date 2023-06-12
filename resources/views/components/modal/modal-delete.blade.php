<div class="flex items-center justify-center opacity-0 fixed top-0 left-0 right-0 bottom-0
    w-screen h-screen z-index-10 transition-all duration-500 bg-black/50 pointer-events-none" id="modal-container-{{ $id }}">
    <div class="rounded-lg px-10 py-10 w-2/5 max-w-full bg-white shadow-lg">
        <h2 class="text-lg font-bold">{{ $title ?? 'Exclusão' }}</h2>
        <h3 class="text-sm font-bold">
            {{ $description ?? 'Essa ação não é reversível' }}
        </h3>
        <div class="flex items-center justify-end mt-8 w-full">
            <button onclick="handleClickModal('{!! $id !!}')" type="button"
                class="mr-4">
                <x-link-button link="" :margin="false">
                    Fechar
                </x-link-button>
            </button>
            <form method="POST" action="{{ route($routeDelete, $args) }}">
                @method('DELETE')
                @csrf
                <x-button type="submit" :margin="false" mode="danger">
                    {{ $buttonText ?? 'Excluir' }}
                </x-button>
            </form>
        </div>
    </div>
</div>
