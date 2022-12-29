<label for="{{ $for }}" {{ $attributes->merge(['class' => 'form-label']) }}>
    {{ $title }}
    {{ $slot }}
</label>
