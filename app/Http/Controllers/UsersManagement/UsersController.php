<?php

namespace App\Http\Controllers\UsersManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index(): View
    {
        Gate::authorize('user_index');

        return view('users-management.users.index');
    }

    public function create(): View
    {
        Gate::authorize('user_create');

        return view('users-management.users.create', [
            'roles' => Role::pluck('name', 'id'),
        ]);
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());
        $user->syncRoles($request->get('roles'));

        return redirect()->route('users-management.users.index')
            ->with('success', trans('usersManagement/users.created'));
    }

    public function show(User $user)
    {
        Gate::authorize('user_show');

    }

    public function edit(User $user)
    {
        Gate::authorize('user_edit');

        return view('users-management.users.edit', [
            'user' => $user->load('roles'),
            'roles' => Role::pluck('name', 'id'),
        ]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->syncRoles($request->get('roles'));

        return redirect()->route('users-management.users.index')
            ->with('success', trans('usersManagement/users.updated'));
    }

    public function destroy(User $user)
    {
        Gate::authorize('user_delete');

    }
}
