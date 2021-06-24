<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Client;
use App\Models\Step;
use App\Models\User;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $steps = Step::all();
        $clients = Client::all();
        $users = User::all();

        for ($i = 1; $i <= 20; $i++) {
            $faker = Faker::create('pt_BR');
            Project::create([
                'user_id' => $users[random_int(0, 5)]->id,
                'client_id' => $clients[random_int(0, 5)]->id,
                'state_id' => 26,
                'city_id' => 3287,
                'step_id' => $steps[random_int(0, 5)]->id,
                'title' => $faker->text,
                'description' => $faker->text,
                'cep' => '13901021',
                'address' => 'Rua Endereço',
                'number' => '123',
                'neighborhood' => 'Jardim Test',
                'value' => 20.00
            ]);
        }
    }
}
