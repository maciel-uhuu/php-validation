<fieldset class="w-full flex flex-row outline-none border-none mt-2">
    @if($label)
        <label for="{{ $id }}" class="text-base font-semibold mr-2">{{$label}}</label>
    @endif
    <input id="{{ $id }}" name="{{ $id }}" value="{{$id}}" type="checkbox" {{ old($id, $value) ? 'checked' : '' }} />
</fieldset>
