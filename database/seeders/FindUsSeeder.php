<?php

namespace Database\Seeders;

use App\Models\FindUs;
use Illuminate\Database\Seeder;

class FindUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $find_us = [
            "Facebook",
            "Instagram",
            "Google",
            "Indicação de Cliente",
            "Outros"
        ];
        foreach ($find_us as $type) {
            FindUs::create([
                'name' => $type
            ]);
        }
    }
}
