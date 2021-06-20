<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            'Acre',
            'Alagoas',
            'Amazonas',
            'Amapá',
            'Bahia',
            'Ceará',
            'Distrito Federal',
            'Espírito Santo',
            'Goiás',
            'Maranhão',
            'Minas Gerais',
            'Mato Grosso do Sul',
            'Mato Grosso',
            'Pará',
            'Paraíba',
            'Pernambuco',
            'Piauí',
            'Paraná',
            'Rio de Janeiro',
            'Rio Grande do Norte',
            'Rondônia',
            'Roraima',
            'Rio Grande do Sul',
            'Santa Catarina',
            'Sergipe',
            'São Paulo',
            'Tocantins',
        ];
        foreach($states as $state){
            State::create(['name' => $state]);
        }  
    }
}
