<div>
    <table class="table table-bordered table-vcenter">
        <thead>
            <tr>
                <x-livewire.datatables.sorter column="id" :sort-by="$sortBy" :sort-column="$sortColumn">
                    @lang('validation.attributes.id')
                </x-livewire.datatables.sorter>
                <x-livewire.datatables.sorter column="name" :sort-by="$sortBy" :sort-column="$sortColumn">
                    @lang('validation.attributes.full_name')
                </x-livewire.datatables.sorter>
                <x-livewire.datatables.sorter column="email" :sort-by="$sortBy" :sort-column="$sortColumn">
                    @lang('validation.attributes.email')
                </x-livewire.datatables.sorter>
                <th>
                    @lang('usersManagement/roles.roles')
                </th>

                <th class="text-center">
                    @can('user_create')
                        <a class="btn btn-sm btn-alt-success" href="{{ route('users-management.users.create') }}">
                            @lang('usersManagement/users.create')
                        </a>
                    @endcan
                </th>
            </tr>
            <tr>
                <x-livewire.datatables.search-columns.number wire:model.lazy="search.id" :placeholder="trans('validation.attributes.id')"/>
                <x-livewire.datatables.search-columns.text wire:model.lazy="search.full_name" :placeholder="trans('validation.attributes.full_name')"/>
                <x-livewire.datatables.search-columns.email wire:model.lazy="search.email" :placeholder="trans('validation.attributes.email')"/>
                <x-livewire.datatables.search-columns.select wire:model.lazy="search.role_id" :options="$roles"/>

                <th></th>
            </tr>
        </thead>
        <tbody>
            @php /** @var \App\Models\User $user */ @endphp
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge bg-primary">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            @can('user_edit')
                                <a class="btn btn-sm btn-alt-info" href="{{ route('users-management.users.edit', $user) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            @endcan
                            <x-livewire.datatables.delete-button :model="$user" permission="user_delete"/>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <x-livewire.datatables.pagination-links :collection="$users"/>
</div>
