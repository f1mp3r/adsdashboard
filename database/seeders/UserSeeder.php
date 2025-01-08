<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Super Admin Sam',
                'email' => 'superadmin@test.com',
                'password' => 'password',
                'role' => 'Super Admin',
            ],
            [
                'name' => 'Admin Adam',
                'email' => 'admin@test.com',
                'password' => 'password',
                'role' => 'Admin',
            ],
            [
                'name' => 'Editor Ella',
                'email' => 'editor@test.com',
                'password' => 'password',
                'role' => 'Editor',
            ],
            [
                'name' => 'Viewer Victor',
                'email' => 'viewer@test.com',
                'password' => 'password',
                'role' => 'Viewer',
            ],
        ];

        foreach ($data as $user) {
            $role = $user['role'];
            unset($user['role']);

            $user = User::create($user);
            $user->assignRole($role);
        }
    }
}
