<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@user.test',
            'password' => bcrypt('admin123'),
        ]);

        $admin->assignRole('administrator');

        $creator = User::create([
            'name' => 'Creator',
            'email' => 'creator@user.test',
            'password' => bcrypt('creator123'),
        ]);

        $creator->assignRole('creator');

        $editor = User::create([
            'name' => 'Editor',
            'email' => 'editor@user.test',
            'password' => bcrypt('editor123'),
        ]);

        $editor->assignRole('editor');

        $user = User::create([
            'name' => 'Taufik Hidayat',
            'email' => 'user@user.test',
            'password' => bcrypt('user123'),
        ]);

        $user->assignRole('user');
    }
}
