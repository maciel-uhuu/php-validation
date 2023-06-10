<button type="{{$type}}"
    class="w-auto h-12 outline-none border-none rounded-lg bg-blue-600 cursor-pointer px-4 py-2 {{ $margin ? 'mt-6' : ''}} text-white font-bold hover:bg-blue-800">
    {{ $slot }}
</button>
