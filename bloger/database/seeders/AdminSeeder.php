<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Kullanıcı',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'), // Şifre hashleniyor
            'is_admin' => true, // Admin yetkisi
        ]); 
    }
}
