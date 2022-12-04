@props([
    'permission' => null,
    'model'
])

@if($permission === null || Auth::user()->can($permission))
    <button class="btn btn-sm btn-alt-danger" wire:click="delete({{ $model->id }}, '{{ str_replace('\\', '\\\\',$model::class) }}', '{{ $permission }}')">
        <i class="fas fa-trash"></i>
    </button>
@endif
