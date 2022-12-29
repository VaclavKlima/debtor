<div class="form-group">
    @isset($title)
        <x-form.label :for="$name" :title="$title"/>
    @endisset
    <select @class(['js-select2 form-control', 'is-invalid' => $errors->has($name)]) name="{{ $name }}" id="{{ $name }}" style="width: 100%;" data-placeholder="{{ $attributes['placeholder'] ?? trans('global.choose_multiple') }}">
        <option></option>
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

