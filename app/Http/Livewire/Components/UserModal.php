<?php

namespace App\Http\Livewire\Components;

use App\Models\User;
use App\Services\UserService;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserModal extends Component
{
    public $open = false;
    public User $user;
    public $roles;
    public $role_selected;
    public $user_password = '';

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required',
        'user_password' => 'sometimes',
        'role_selected' => 'required'
    ];

    protected $listeners = ['openUserModal'];

    public function mount(){
        $this->user = new User;
        $this->roles = Role::all();
    }

    public function render()
    {   
        return view('livewire.components.user-modal');
    }

    public function save(UserService $service)
    {
        $this->resetValidation();
        $this->validate();
        if(!$this->user->id){
            $this->validate([
                'user_password' => 'required'
            ]);
        }

        $service->save([
            'id' => $this->user->id, 
            'name' => $this->user->name, 
            'email' => $this->user->email,
            'password' => $this->user_password,
            'role' => $this->role_selected
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
        $this->role_selected = '';
        $this->user_password = '';
    }

    public function openUserModal(UserService $service, $id = null)
    {
        $this->resetFields();
        $this->resetValidation();
        $this->open = true;
        if($id != null){
            $this->user = $service->find($id);
            $this->role_selected = $this->user->roles()->first()->id;
        }else{
            $this->user = new User;
        }
    }
}
