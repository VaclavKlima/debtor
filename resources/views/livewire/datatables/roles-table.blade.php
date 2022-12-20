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
                    @can('role_create')
                        <a class="btn btn-sm btn-alt-success" href="{{ route('users-management.roles.create') }}">
                            @lang('usersManagement/roles.create')
                        </a>
                    @endcan
                </th>
            </tr>
            <tr>
                <x-livewire.datatables.search-columns.number wire:model.lazy="search.id" :placeholder="trans('validation.attributes.id')"/>
                <x-livewire.datatables.search-columns.text wire:model.lazy="search.name" :placeholder="trans('validation.attributes.name')"/>
                <x-livewire.datatables.search-columns.select wire:model.lazy="search.permission_id" :options="$permissions"/>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php /** @var \Spatie\Permission\Models\Role $role  */ @endphp
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        @foreach($role->permissions as $permission)
                            <span @class([ $permission->id === (int) ($this->search['permission_id'] ?? null) ? 'bg-success' : 'bg-primary','badge'])>
                                {{ $permission->name }}
                            </span>
                        @endforeach
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            @can('user_edit')
                                <a class="btn btn-sm btn-alt-info" href="{{ route('users-management.roles.edit', $role) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            @endcan
                            <x-livewire.datatables.delete-button :model="$role" permission="role_delete"/>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <x-livewire.datatables.pagination-links :collection="$roles"/>
</div>
