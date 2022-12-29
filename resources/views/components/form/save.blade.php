<div class="form-group">
    <button {{ $attributes->except(['class']) }} class="{{ $attributes->get('class', 'btn btn-success mt-3')}}" type="submit">
        {!! $slot->isNotEmpty() ? $slot : '<i class="fas fa-save"></i> ' . trans('global.save') !!}
    </button>
</div>
