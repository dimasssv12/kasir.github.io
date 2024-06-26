<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data admin
        User::create([
            'kode' => 'ADM001',
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminpassword'),
            'level' => 'admin',
        ]);

        // Menambahkan data kasir
        User::create([
            'kode' => 'KSR001',
            'nama' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('kasirpassword'),
            'level' => 'kasir',
        ]);
    }
}
