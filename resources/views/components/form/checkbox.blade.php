<div class="form-check">
    {{ Form::checkbox($name, $value, $checked ,array_merge_recursive($attributes, ['class' => 'form-check-input' . ($errors->has($name) ? 'is-invalid' : ''), 'id' => $name])) }}
    @isset($title)
        {{ Form::label($name, $title, ['class' => 'form-check-label']) }}
    @endisset
    @error($name)
    <div class="invalid-feedback animated fadeIn">
        {{ $message }}
    </div>
    @enderror
</div>
