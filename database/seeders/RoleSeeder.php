<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'Sub Admin',
            ],
            [
                'name' => 'Manager',
            ],
            [
                'name' => 'User',
            ],
        ];

        foreach ($roles as $key => $role) {
            Role::create($role);
        }

    }
}
