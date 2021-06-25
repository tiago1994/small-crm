<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\OfferService;

class Offers extends Component
{
    public $openModal = false;
    public $openDeleteModal = false;
    public $delete_id;

    protected $listeners = ['updateOfferList'];

    public function render(OfferService $service)
    {
        return view('livewire.offers', ['offers' => $service->getAllPaginate()]);
    }

    public function toggleDeleteModal($id = null)
    {
        $this->delete_id = $id;
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function delete(OfferService $service)
    {
        $service->delete($this->delete_id);
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function toggleAddModal($id = null)
    {
        $this->emit('openOfferModal', $id);
    }

    public function updateOfferList()
    {
    }
}
