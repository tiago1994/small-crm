<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class Clients extends Component
{
    public $openModal = false;
    public $openDeleteModal = false;
    public $delete_id;

    public function render()
    {
        $clients = Client::paginate(config('app.paginate_limit'));
        return view('livewire.clients', ['clients' => $clients]);
    }

    public function toggleDeleteModal($id = null)
    {
        $this->delete_id = $id;
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function delete()
    {
        Client::find($this->delete_id)->delete();
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function toggleAddModal($id = null)
    {
        $this->emit('openClientModal', ['id' => $id]);
    }
}
