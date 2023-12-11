<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Abbatoir',
            'last_name' => 'Worker',
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('adminako123'),
            'role' => 'admin',
        ]);
    }
}
