<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = ['Carro 1', 'Carro 2', 'Carro 3', 'Carro 4'];
        foreach ($vehicles as $vehicle) {
            Vehicle::create(['name' => $vehicle]);
        }
    }
}
