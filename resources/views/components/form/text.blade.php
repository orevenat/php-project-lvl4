@php
    $className = $errors->has($name) ? 'form-control is-invalid' : 'form-control'
@endphp

<div class="form-group">

    {{ Form::label($name, null) }}
    {{ Form::text($name, $value, ['class' => $className]) }}
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
