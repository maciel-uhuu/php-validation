<fieldset class="{{$widthFieldset ?? 'w-full'}} flex flex-col outline-none border-none {{ $marginFieldset ?? 'mt-2'}}">
    @if($label)
        <label for="{{ $id }}" class="text-base font-semibold mb-2">{{$label}}</label>
    @endif
    <input id="{{ $id }}" name="{{ $id }}" class="w-full {{ $height ?? 'h-10'}} rounded-lg p-2 bg-gray-200 outline-none
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
