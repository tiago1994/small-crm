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
        $codes = ['PCU-1010', 'DLM-2121', 'RTZ-3012', 'MXC-1201'];
        foreach ($vehicles as $i => $vehicle) {
            Vehicle::create([
                'name' => $vehicle,
                'code' => $codes[$i]
            ]);
        }
    }
}
