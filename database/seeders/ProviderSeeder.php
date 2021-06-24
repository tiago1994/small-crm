<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provider;use Faker\Factory as Faker;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 5; $i++) { 
            $faker = Faker::create('pt_BR');
            Provider::create([
                'company' => 'Fornecedor '.$i,
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->cellphone(false),
            ]);
        }
    }
}
