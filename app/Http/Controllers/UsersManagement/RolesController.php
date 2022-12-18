<?php

namespace App\Http\Controllers\UsersManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index(): View
    {
        Gate::authorize('role_index');

        return view('users-management.roles.index');
    }

    public function create()
    {
        Gate::authorize('role_create');

        return view('users-management.roles.create', [
            'permissions' => Permission::pluck('name', 'id'),
        ]);
    }

    public function store(RoleStoreRequest $request): RedirectResponse
    {
        $role = Role::create($request->validated());

        $role->syncPermissions($request->get('permissions'));


        return redirect()->route('users_management.roles.index')
            ->with('success', trans('usersManagement/roles.created'));

    }

    public function edit(Role $role)
    {

        return view('users-management.roles.edit', [
            'role' => $role->load('permissions'),
            'permissions' => Permission::pluck('name', 'id'),
        ]);
    }

    public function update(RoleUpdateRequest $request, Role $role): RedirectResponse
    {
        $role->update($request->validated());

        $role->syncPermissions($request->get('permissions'));

        return redirect()->route('users_management.roles.index')
            ->with('success', trans('usersManagement/roles.updated'));
    }
}
