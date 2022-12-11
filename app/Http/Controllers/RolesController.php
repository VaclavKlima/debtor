<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        return view('users-management.roles.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Role $role)
    {
    }

    public function edit(Role $role)
    {
    }

    public function update(Request $request, Role $role)
    {
    }

    public function destroy(Role $role)
    {
    }
}
