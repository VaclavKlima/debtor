<div class="form-group">
    @isset($title)
        {{ Form::label($name, $title, ['class' => 'form-label']) }}
    @endisset
    {{ Form::text($name, $value, array_merge_recursive($attributes, ['class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')])) }}
    @error($name)
    <div class="invalid-feedback animated fadeIn">
        {{ $message }}
    </div>
    @enderror
</div>
