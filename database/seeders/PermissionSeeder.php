<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permit
        Permission::create([
            'name' => 'create post',
            'guard_name' => 'web',
        ]);

        // edit permit
        Permission::create([
            'name' => 'edit post',
            'guard_name' => 'web',
        ]);

        // manage permit
        Permission::create([
            'name' => 'manage permit',
            'guard_name' => 'web',
        ]);
    }
}
