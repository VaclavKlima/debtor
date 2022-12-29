@aware(['model'])
<div class="form-group">
    @isset($title)
        <x-form.label :for="$name" :title="$title"/>
    @endisset
    <input id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value ?? $model?->{$name}) }}" type="{{ $type }}" {{ $attributes->merge(['class' => $errors->has($name) ? 'form-control is-invalid' : 'form-control']) }}>
    <x-form.error :name="$name"/>
</div>
