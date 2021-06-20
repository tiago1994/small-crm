<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Step;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $steps = ['Lead', 'Primeiro Contato', 'Segundo Contato', 'Proposta', 'Sucesso', 'Falha'];
        $steps_visible = [true, true, true, true, false, false];
        foreach ($steps as $i => $step) {
            Step::create([
                'name' => $step, 
                'visible' => $steps_visible[$i]
            ]);
        }
    }
}
