<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Pastikan ini diimport

class UserSeeder extends Seeder
{
    public function run()
    {
        // Membuat pengguna dengan role 'admin'
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('password123'), // Ganti password dengan yang Anda inginkan
        ]);

        // Membuat pengguna dengan role 'pustakawan'
        User::factory()->create([
            'name' => 'Pustakawan',
            'email' => 'pustakawan@example.com',
            'role' => 'pustakawan',
            'password' => Hash::make('password123'), // Ganti password dengan yang Anda inginkan
        ]);
    }
}
