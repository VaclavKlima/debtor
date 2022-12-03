<div>
    <table class="table table-bordered table-vcenter">
        <thead>
            <tr>
                <th>@lang('validation.attributes.id')</th>
                <th>@lang('validation.attributes.name')</th>
                <th>@lang('validation.attributes.email')</th>
                <th>@lang('usersManagement/roles.roles')</th>
                <th></th>
            </tr>
            <tr>
                <x-livewire.datatables.search-columns.number wire:model.lazy="search.id" :placeholder="trans('validation.attributes.id')"/>
                <x-livewire.datatables.search-columns.text wire:model.lazy="search.name" :placeholder="trans('validation.attributes.name')"/>
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
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge bg-primary">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    </td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <x-livewire.datatables.pagination-links :collection="$users"/>
</div>
