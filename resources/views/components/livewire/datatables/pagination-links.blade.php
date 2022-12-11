@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $collection */
@endphp
<div class="row">
    <div class="col-sm-12 col-md-5 d-inline-flex">
        <div>
            <select class="form-select" wire:model="perPage">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>

        <div class="ms-2 mt-1">
            @lang('global.page_of', ['current_page' => $collection->currentPage(), 'last_page' => $collection->lastPage()])
        </div>
    </div>
    <div class="col-sm-12 col-md-7 ">
        <div class="float-md-end float-sm-start">
            {!! $collection->links() !!}
        </div>
    </div>
</div>
