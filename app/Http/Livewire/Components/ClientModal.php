<?php

namespace App\Http\Livewire\Components;

use App\Models\Client;
use Livewire\Component;

class ClientModal extends Component
{
    public $open = false;
    public $client;

    protected $listeners = ['openClientModal'];

    public function render()
    {
        return view('livewire.components.client-modal');
    }

    public function save()
    {
        
    }

    public function closeModal()
    {
        $this->open = false;
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->client = '';
    }

    public function openClientModal($id = null)
    {
        $this->open = true;
        $this->client = Client::find($id);
    }
}
