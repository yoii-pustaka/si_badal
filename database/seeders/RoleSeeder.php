<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Buat roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $pelaksanaRole = Role::firstOrCreate(['name' => 'pelaksana']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Buat akun admin default
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password123')
            ]
        );
        $admin->assignRole($adminRole);

        // Buat akun pelaksana default
        $pelaksana = User::firstOrCreate(
            ['email' => 'pelaksana@example.com'],
            [
                'name' => 'Pelaksana Umroh',
                'password' => Hash::make('password123')
            ]
        );
        $pelaksana->assignRole($pelaksanaRole);

        // Buat akun user default
        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'User Pendaftar',
                'password' => Hash::make('password123')
            ]
        );
        $user->assignRole($userRole);
    }
}
