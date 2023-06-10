<fieldset class="w-full flex flex-col outline-none border-none mt-2">
    <label for="{{ $id }}" class="text-base font-semibold mb-2">{{$label}}</label>
    <input id="{{ $id }}" name="{{ $id }}" class="w-full h-10 rounded-lg p-2 bg-gray-200 outline-none
        {{ $error ? 'border border-solid border-red-700' : 'border-none'}}"
        type="{{$type}}" placeholder="{{ $placeholder }}"
        value="{{ $value ?? old($id) }}"
    />
    @if($error)
        <span class="text-sm mt-1 text-red-700">
            {{ $error }}
        </span>
    @endif
</fieldset>
