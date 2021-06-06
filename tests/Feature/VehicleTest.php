<?php

namespace Tests\Feature;

use App\Repositories\Contracts\VehiclesRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use App\Http\Livewire\Vehicles;
use App\Models\Vehicle;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_vehicle()
    {
        $model = new VehiclesRepositoryInterface();
        Livewire::test(Vehicles::class)
            ->set('vehicle.name', 'Carro 999')
            ->set('vehicle.code', '102030')
            ->call('save');

        $this->assertTrue($model->where('name', '=', 'Carro 999')->exists());
    }
}
