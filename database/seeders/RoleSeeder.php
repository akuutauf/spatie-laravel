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
        // get permissions data
        $permissions = Permission::all();

        $administrator = Role::create([
            'name' => 'administrator',
            'guard_name' => 'web',
        ]);

        // ambil data manage permit dan assign permit ke role administrator
        $manage_permit = $permissions->where('name', 'manage permit')->first();
        $administrator->givePermissionTo($manage_permit);

        $creator = Role::create([
            'name' => 'creator',
            'guard_name' => 'web',
        ]);

        // ambil data create post permit dan assign permit ke role creator
        $create_permit = $permissions->where('name', 'create post')->first();
        $creator->givePermissionTo($create_permit);

        $editor = Role::create([
            'name' => 'editor',
            'guard_name' => 'web',
        ]);

        // ambil data edit post permit dan assign permit ke role editor
        $editor_permit = $permissions->where('name', 'edit post')->first();
        $editor->givePermissionTo($editor_permit);

        $user = Role::create([
            'name' => 'user',
            'guard_name' => 'web',
        ]);

        // assign permit ke role user
        $user->givePermissionTo([$create_permit, $editor_permit]);
    }
}
