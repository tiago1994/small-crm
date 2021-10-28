<?php

namespace App\Http\Livewire\Components;

use App\Models\Offer;
use App\Services\OfferService;
use App\Services\OfferProviderService;
use App\Services\ProviderService;
use Livewire\Component;
use Livewire\WithFileUploads;

class OfferModal extends Component
{
    use WithFileUploads;

    public $open = false;
    public $providers;
    public $providers_selected = [];
    public $provider_select;
    public $file;
    public Offer $offer;

    protected $rules = [
        'offer.title' => 'required',
        'offer.description' => 'required',
        'file' => 'required',
        'providers_selected' => 'required',
    ];

    protected $listeners = ['openOfferModal'];

    public function mount(ProviderService $service)
    {
        $this->providers = $service->getAll();
    }

    public function render()
    {
        return view('livewire.components.offer-modal');
    }

    public function save(OfferService $service, OfferProviderService $offerProviderService)
    {
        $this->validate();
        $file_name = time() . '.' . $this->file->getClientOriginalExtension();
        $this->file->storeAs('public/offers', $file_name);
        $new_offer = $service->save([
            'id' => $this->offer->id,
            'title' => $this->offer->title,
            'description' => $this->offer->description,
            'file' => $file_name
        ]);

        collect($this->providers_selected)->map(function ($provider) use ($new_offer, $offerProviderService) {
            $offerProviderService->save($new_offer->id, $provider['id']);
        });

        $this->closeModal();
        $this->emitUp('updateOfferList');
    }

    public function closeModal()
    {
        $this->open = false;
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->offer = new Offer;
    }

    public function openOfferModal(OfferService $service, $id = null)
    {
        $this->open = true;
        if ($id != null) {
            $this->offer = $service->find($id);
        } else {
            $this->offer = new Offer;
        }
    }

    public function updatedProviderSelect()
    {
        $search_id = $this->provider_select;
        $this->providers_selected[] = collect($this->providers)->firstWhere('id', $search_id);
        $this->provider_select = [];
    }

    public function removeSelectedProvider($id)
    {
        $this->providers_selected = collect($this->providers_selected)->where('id', '!=', $id);
    }
}
