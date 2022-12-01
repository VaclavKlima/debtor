<div>
    <table class="table table-bordered table-vcenter">
        <thead>
            <tr>
                <th class="text-center" style="width: 50px;">ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
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
