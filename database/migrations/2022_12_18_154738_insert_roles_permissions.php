<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return new class extends Migration {
    public function up(): void
    {
        Permission::create([
            'name' => 'role_show',
        ]);

        Permission::create([
            'name' => 'role_create',
        ]);

        Permission::create([
            'name' => 'role_index',
        ]);

        Permission::create([
            'name' => 'role_delete',
        ]);

        Permission::create([
            'name' => 'role_edit',
        ]);

        Role::findByName('admin')->givePermissionTo(['role_show', 'role_create', 'role_index', 'role_delete', 'role_edit']);
    }

    public function down(): void
    {
        Permission::whereIn('name', ['role_show', 'role_create', 'role_index', 'role_delete', 'role_edit'])->delete();
    }
};
