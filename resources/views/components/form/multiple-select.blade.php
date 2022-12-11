<div class="form-group">
    @isset($title)
        {{ Form::label($name, $title, ['class' => 'form-label']) }}
    @endisset
    <select @class(['js-select2 form-control', 'is-invalid' => $errors->has(str_replace('[]', '',$name))]) name="{{ $name }}" id="{{ $name }}" multiple style="width: 100%;" data-placeholder="{{ $attributes['placeholder'] ?? trans('global.choose_multiple') }}">
        <option></option>
        @foreach($options as $value => $label)
            <option value="{{ $value }}" @selected(collect($selected)->filter(fn($selectedValue) => $value === $selectedValue)->count() > 0)>{{ $label }}</option>
        @endforeach
    </select>
    @error(str_replace('[]', '',$name))
    <div class="invalid-feedback animated fadeIn">
        {{ $message }}
    </div>
    @enderror
</div>
