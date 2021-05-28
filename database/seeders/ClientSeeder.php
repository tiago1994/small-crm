<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 6; $i++) { 
            $faker = Faker::create('pt_BR');
            Client::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'cpf' => $faker->cpf(false),
                'phone' => $faker->cellphone(false),
                'whatsapp' => $faker->cellphone(false)
            ]);
        }
    }
}
