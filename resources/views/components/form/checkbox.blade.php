@aware(['model'])
<div class="form-check">
    <input id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" type="checkbox" @checked(old( $name ,  $checked ?? $model?->{$name} )) {{ $attributes->merge(['class' => $errors->has($name) ? 'form-check-input is-invalid' : 'form-check-input']) }}>
    @isset($title)
        <x-form.label class="form-check-label" :for="$name" :title="$title"/>
    @endisset
    <x-form.error :name="$name"/>
</div>
