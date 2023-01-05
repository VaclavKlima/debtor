<div>
    <table class="table table-bordered table-vcenter">
        <thead>
            <tr>
                <x-livewire.datatables.sorter column="id" :sort-by="$sortBy" :sort-column="$sortColumn">
                    @lang('validation.attributes.id')
                </x-livewire.datatables.sorter>
                <x-livewire.datatables.sorter column="name" :sort-by="$sortBy" :sort-column="$sortColumn">
                    @lang('validation.attributes.name')
                </x-livewire.datatables.sorter>
                <th>
                    @lang('usersManagement/roles.permissions')
                </th>
                <th class="text-center">
                    <a class="btn btn-sm btn-alt-success" href="{{ route('orders.create') }}">
                        @lang('orders.create_order')
                    </a>
                </th>
            </tr>
            <tr>
                <x-livewire.datatables.search-columns.number wire:model.lazy="search.id" :placeholder="trans('validation.attributes.id')"/>
                <x-livewire.datatables.search-columns.text wire:model.lazy="search.name" :placeholder="trans('validation.attributes.name')"/>
                {{--                <x-livewire.datatables.search-columns.select wire:model.lazy="search.permission_id" :options="$permissions"/>--}}
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php /** @var \App\Models\Order $order  */ @endphp
            @foreach($orders as $order)
                <tr>
                    <td>
                        <a href="{{ route('orders.show', $order) }}">
                            {{ $order->id }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('orders.show', $order) }}">
                            {{ $order->title }}
                        </a>
                    </td>
                    <td></td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-alt-info" href="{{ route('orders.edit', $order) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <x-livewire.datatables.delete-button :model="$order"/>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <x-livewire.datatables.pagination-links :collection="$orders"/>
</div>
