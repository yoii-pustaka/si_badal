<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Buat roles
        $roles = [
            'admin',
            'pelaksana',
            'user'
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Daftar akun default
        $defaultUsers = [
            [
                'email' => 'admin@example.com',
                'name' => 'Administrator',
                'role' => 'admin',
            ],
            [
                'email' => 'pelaksana@example.com',
                'name' => 'Pelaksana Umroh',
                'role' => 'pelaksana',
            ],
            [
                'email' => 'user@example.com',
                'name' => 'User Pendaftar',
                'role' => 'user',
            ],
        ];

        foreach ($defaultUsers as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password123')
                ]
            );

            // Assign role
            $user->assignRole($data['role']);

            // Pastikan ada profilnya
            UserProfile::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'full_name' => $data['name'],
                    'phone' => '08123456789',
                    'address' => 'Alamat default',
                    'passport_number' => 'P' . rand(100000, 999999),
                ]
            );
        }
    }
}
