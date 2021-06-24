<?php

namespace App\Http\Livewire\Components;

use App\Models\User;
use App\Services\UserService;
use Livewire\Component;

class UserModal extends Component
{
    public $open = false;
    public User $user;

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required'
    ];

    protected $listeners = ['openUserModal'];

    public function render()
    {
        return view('livewire.components.user-modal');
    }

    public function save(UserService $service)
    {
        $this->validate();
        $service->save([
            'id' => $this->user->id, 
            'name' => $this->user->name, 
            'email' => $this->user->email
        ]);

        $this->closeModal();
        $this->emitUp('updateUsersList');
    }

    public function closeModal()
    {
        $this->open = false;
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->user = new User;
    }

    public function openUserModal(UserService $service, $id = null)
    {
        $this->open = true;
        if($id != null){
            $this->user = $service->find($id);
        }else{
            $this->user = new User;
        }
    }
}
