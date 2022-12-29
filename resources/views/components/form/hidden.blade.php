@props([
    'name',
    'value' => null,
])
<input type="hidden" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" {{ $attributes }}>
