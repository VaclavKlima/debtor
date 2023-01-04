<div class="form-group">
    @isset($title)
        <x-form.label :for="$name" :title="$title"/>
    @endisset
    <select @class(['form-select', 'is-invalid' => $errors->has($name)]) name="{{ $name }}" id="{{ $name }}" {{ $attributes->except('placeholder') }}>
        <option value="">{{ $attributes['placeholder'] ?? trans('global.choose_one') }}</option>
        @foreach($options as $value => $label)
            <option value="{{ $value }}" @selected($selected === $value)>{{ $label }}</option>
        @endforeach
    </select>
    @error($name)
    <div class="invalid-feedback animated fadeIn">
        {{ $message }}
    </div>
    @enderror
</div>

