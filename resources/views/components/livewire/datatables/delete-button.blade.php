@props([
    'permission' => null,
    'model'
])

@if($permission === null || Auth::user()->can($permission))
    <button x-data="livewireDeleteButton"
            x-on:click="deleteModel"
            class="btn btn-sm btn-alt-danger js-swal-question"
            data-id="{{ $model->id }}" data-class="{{ $model::class }}" data-permission="{{ $permission }}"
    >
        <i class="fas fa-trash"></i>
    </button>
@endif
