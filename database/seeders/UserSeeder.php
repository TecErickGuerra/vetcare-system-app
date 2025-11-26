<?php
// database/seeders/UserSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Veterinaria',
            'email' => 'admin@vetcare.com',
            'password' => Hash::make('password123'),
            'role_id' => 1, // Administrator
            'is_active' => true,
            'is_protected' => true,
        ]);

        User::create([
            'name' => 'Veterinario Staff',
            'email' => 'staff@vetcare.com', 
            'password' => Hash::make('password123'),
            'role_id' => 2, // Staff
            'is_active' => true,
            'is_protected' => true,
        ]);

        User::create([
            'name' => 'Cliente Ejemplo',
            'email' => 'cliente@vetcare.com',
            'password' => Hash::make('password123'),
            'role_id' => 3, // Cliente
            'is_active' => true,
            'is_protected' => true,
        ]);
    }
}