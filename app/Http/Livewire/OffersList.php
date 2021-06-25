<?php

namespace App\Http\Livewire;

use App\Services\OfferService;
use Livewire\Component;

class OffersList extends Component
{
    public $offer_id = '';
    public $offer;

    public function mount(OfferService $service, $id)
    {
        $this->offer_id = $id;
        $this->offer = $service->find($id);
    }

    public function render()
    {
        return view('livewire.offers-list');
    }
}
