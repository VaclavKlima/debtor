<?php

namespace App\Http\Controllers\UsersManagement;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function index()
    {
        Gate::authorize('user_index');

        return view('users-management.users.index');
    }

    public function create()
    {
        Gate::authorize('user_create');

    }

    public function store(Request $request)
    {
        Gate::authorize('user_create');

        $user = User::create($request->all());
    }

    public function show(User $user)
    {
        Gate::authorize('user_show');

    }

    public function edit(User $user)
    {
        Gate::authorize('user_edit');

    }

    public function update(Request $request, User $user)
    {
        Gate::authorize('user_edit');

    }

    public function destroy(User $user)
    {
        Gate::authorize('user_delete');

    }
}
