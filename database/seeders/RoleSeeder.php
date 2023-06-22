<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => ' 1 مشرف', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

        Permission::create(['name' => 'create-admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'index-admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'edit-admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'delete-admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

        Role::create(['name' => ' 1 ناشر', 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);

        Permission::create(['name' => 'create-article', 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'index-article', 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'edit-article', 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'delete-article', 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);

    }


}
