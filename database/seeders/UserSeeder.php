<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Veterinaria',
            'email' => 'admin@vetcare.com',
            'password' => Hash::make('password123'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Veterinario Staff',
            'email' => 'staff@vetcare.com',
            'password' => Hash::make('password123'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Cliente Ejemplo',
            'email' => 'cliente@vetcare.com',
            'password' => Hash::make('password123'),
            'role_id' => 3,
        ]);
    }
}
