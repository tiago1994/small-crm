<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Tiago Matos',
            'email' => 'tiagovmatos@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('teste123'),
            'remember_token' => Str::random(10)
        ]);

        for ($i = 1; $i <= 5; $i++) {
            $faker = Faker::create('pt_BR');

            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'email_verified_at' => now(),
                'password' => bcrypt('teste123'),
                'remember_token' => Str::random(10)
            ]);
        }
    }
}
