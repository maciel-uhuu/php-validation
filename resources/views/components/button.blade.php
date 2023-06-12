<button type="{{$type}}"
    class="w-auto h-12 outline-none border-none rounded-lg cursor-pointer px-4 py-2 {{ $margin ? 'mt-6' : ''}}
    text-white font-bold
    {{$mode == 'primary' ? 'bg-blue-600' : 'bg-red-600'}} hover:{{$mode == 'primary' ? 'bg-blue-800' : 'bg-red-800'}}
    disabled:opacity-50 disabled:cursor-not-allowed"
    {{ $disabled ? 'disabled' : ''}}>
    {{ $slot }}
</button>
