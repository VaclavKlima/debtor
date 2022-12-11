@props([
    'useOnlyValues' => false,
    'placeholder' => '-',
    'options' => []
])
<th>
    <select type="text" {{ $attributes->class('form-select') }}>
        <option value="">{{ $placeholder }}</option>
        @foreach($options as $key => $value)
            <option value="{{ $useOnlyValues ? $value : $key }}">{{ $value }}</option>
        @endforeach
    </select>
</th>
