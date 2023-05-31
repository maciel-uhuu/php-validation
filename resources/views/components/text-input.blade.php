@props([
'type' => 'text',
'name',
'label'
])

<div {{ $attributes->merge(['class' => 'app_input']) }}>
    @if ($label)
    <label for={{ $name }}>{{ $label }}</label>
    @endif
    <input type={{ $type }} name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}">
    <span>@error($name) {{ $message }} @enderror</span>
</div>