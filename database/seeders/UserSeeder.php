<?php

namespace Database\Seeders;

use App\Enum\UserRolEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::count()) {
            User::create([
                'rol_id' => UserRolEnum::ADMIN,
                'active' => 1,
                'name' => 'Admin Unerg',
                'email' => 'admin@unerg.com',
                'password' => '$2y$12$NWPqdf64qABn2cYnV2rJQ.1kCm9ajyS.9TcYhNhzF5a86eRAKa0jW', // admin123
            ]);
        }
    }
}
