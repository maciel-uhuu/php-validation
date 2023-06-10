<div class="flex items-center justify-center opacity-0 fixed top-0 left-0 right-0 bottom-0
    w-screen h-screen z-index-10 transition-all duration-500 bg-black/50 pointer-events-none" id="modal-container-{{ $id }}">
    <div class="rounded-lg px-10 py-10 w-2/5 max-w-full bg-white shadow-lg">
        <h2>{{ $title ?? 'Exclusão' }}</h2>
        <h3>
            {{ $description ?? 'Essa ação não é reversível' }}
        </h3>
        <div class="modal-actions">
            <button onclick="handleClickModal('{!! $id !!}')" type="button"
                class="btn btn-modal btn-with-border">
                Fechar
            </button>
            <form method="POST" action="{{ route($routeDelete, $args) }}">
                @csrf
                <button type="submit" class="btn btn-modal delete">
                    {{ $buttonText ?? 'Excluir' }}
                </button>
            </form>
        </div>
    </div>
</div>
