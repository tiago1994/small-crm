<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\UserService;

class Users extends Component
{
    public $openModal = false;
    public $openDeleteModal = false;
    public $delete_id;

    protected $listeners = ['updateUsersList'];

    public function render(UserService $service)
    {
        return view('livewire.users', ['users' => $service->getAllPaginate()]);
    }

    public function toggleDeleteModal($id = null)
    {
        $this->delete_id = $id;
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function delete(UserService $service)
    {
        $service->delete($this->delete_id);
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function toggleAddModal($id = null)
    {
        $this->emit('openUserModal', $id);
    }

    public function updateUsersList()
    {
    }
}
