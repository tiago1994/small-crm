<?php

namespace App\Http\Livewire\Components;

use App\Models\Client;
use App\Services\ClientService;
use Livewire\Component;

class ClientModal extends Component
{
    public $open = false;
    public Client $client;

    protected $rules = [
        'client.name' => 'required',
        'client.email' => 'required',
        'client.cpf' => 'sometimes',
        'client.phone' => 'sometimes',
        'client.whatsapp' => 'sometimes'
    ];

    protected $listeners = ['openClientModal'];

    public function render()
    {
        return view('livewire.components.client-modal');
    }

    public function save(ClientService $service)
    {
        $this->validate();
        $service->save([
            'id' => $this->client->id, 
            'name' => $this->client->name, 
            'email' => $this->client->email,
            'cpf' => $this->client->cpf,
            'phone' => $this->client->phone,
            'whatsapp' => $this->client->whatsapp
        ]);

        $this->closeModal();
        $this->emitUp('updateClientsList');
    }

    public function closeModal()
    {
        $this->open = false;
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->client = new Client;
    }

    public function openClientModal(ClientService $service, $id = null)
    {
        $this->open = true;
        if($id != null){
            $this->client = $service->find($id);
        }else{
            $this->client = new Client;
        }
    }
}
