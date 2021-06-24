<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\ProviderService;

class Providers extends Component
{
    public $openModal = false;
    public $openDeleteModal = false;
    public $delete_id;

    protected $listeners = ['updateProvidersList'];

    public function render(ProviderService $service)
    {
        return view('livewire.providers', ['providers' => $service->getAll()]);
    }

    public function toggleDeleteModal($id = null)
    {
        $this->delete_id = $id;
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function delete(ProviderService $service)
    {
        $service->delete($this->delete_id);
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function toggleAddModal($id = null)
    {
        $this->emit('openProviderModal', $id);
    }

    public function updateProvidersList()
    {
    }
}
