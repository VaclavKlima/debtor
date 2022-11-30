<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return new class extends Migration {
    public function up(): void
    {
        $admin = Role::create([
            'name' => 'admin',
        ]);

        Role::create([
            'name' => 'default',
        ]);

        Permission::create([
            'name' => 'user_show',
        ]);

        Permission::create([
            'name' => 'user_create',
        ]);

        Permission::create([
            'name' => 'user_index',
        ]);

        Permission::create([
            'name' => 'user_delete',
        ]);

        $admin->givePermissionTo(['user_show', 'user_create', 'user_index', 'user_delete']);
    }

    public function down(): void
    {
        Role::whereIn('name', ['admin', 'default'])->delete();
        Permission::whereIn('name', ['user_show', 'user_create', 'user_index', 'user_delete'])->delete();
    }
};
