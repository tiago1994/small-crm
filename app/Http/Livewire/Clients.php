<?php

namespace App\Http\Livewire;

use App\Services\ClientService;
use Livewire\Component;

class Clients extends Component
{
    public $openModal = false;
    public $openDeleteModal = false;
    public $delete_id;

    protected $listeners = ['updateClientsList'];

    public function render(ClientService $service)
    {
        return view('livewire.clients', ['clients' => $service->getAllPaginate()]);
    }

    public function toggleDeleteModal($id = null)
    {
        $this->delete_id = $id;
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function delete(ClientService $service)
    {
        $service->delete($this->delete_id);
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function toggleAddModal($id = null)
    {
        $this->emit('openClientModal', $id);
    }

    public function updateClientsList()
    {
    }
}
