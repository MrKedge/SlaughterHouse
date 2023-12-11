<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();


        UserFactory::new()->count(10)->create()->each(function ($user) use ($faker) {
            $user->update([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'address' => 'Marinduque, Phil.',
                'email_verified_at' => now(),
                'role' => 'client',
                'password' => Hash::make('capstone'),

            ]);
        });


        // UserFactory::new(['first_name' => 'Loyal', 'last_name' => 'Customer', 'email' => 'projectgame170@gmail.com', 'address' => 'Boac, Marinduque, Phil.'])->create();
    }
}
