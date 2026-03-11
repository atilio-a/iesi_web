<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Administrator',
            'Editor',
            'Graduate',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['slug' => Str::slug($role)],
                ['name' => $role]
            );
        }
    }
}
