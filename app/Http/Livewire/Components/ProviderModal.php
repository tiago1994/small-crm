<?php

namespace App\Http\Livewire\Components;

use App\Models\Provider;
use App\Services\ProviderService;
use Livewire\Component;

class ProviderModal extends Component
{
    public $open = false;
    public Provider $provider;

    protected $rules = [
        'provider.company' => 'required',
        'provider.name' => 'required',
        'provider.email' => 'required',
        'provider.phone' => 'required'
    ];

    protected $listeners = ['openProviderModal'];

    public function render()
    {
        return view('livewire.components.provider-modal');
    }

    public function save(ProviderService $service)
    {
        $this->validate();
        $service->save([
            'id' => $this->provider->id, 
            'company' => $this->provider->company,
            'name' => $this->provider->name, 
            'email' => $this->provider->email,
            'phone' => $this->provider->phone
        ]);

        $this->closeModal();
        $this->emitUp('updateProvidersList');
    }

    public function closeModal()
    {
        $this->open = false;
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->provider = new Provider;
    }

    public function openProviderModal(ProviderService $service, $id = null)
    {
        $this->open = true;
        if($id != null){
            $this->provider = $service->find($id);
        }else{
            $this->provider = new Provider;
        }
    }
}
