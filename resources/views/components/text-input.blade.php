@props([
'type' => 'text',
'name',
'label',
'value' => ''
])

<div {{ $attributes->merge(['class' => 'app_input']) }}>
  @if ($label)
  <label for={{ $name }} class="col-md-4 col-form-label text-md-end">{{ $label }}</label>
  @endif
  <div class="col-md-6">
    <input type={{ $type }} name="{{ $name }}" id="{{ $name }}" value="{{ $value }}"
      class="form-control @error('{{ $name }}') is-invalid @enderror" />

    @error($name)
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>