<?php

namespace App\Http\Livewire;

use App\Services\ProjectService;
use Livewire\Component;

class Projects extends Component
{
    public $openModal = false;
    public $openDeleteModal = false;
    public $delete_id;

    protected $listeners = ['updateProjectsList'];

    public function render(ProjectService $service)
    {
        return view('livewire.projects', ['projects' => $service->getAllPaginate()]);
    }

    public function toggleDeleteModal($id = null)
    {
        $this->delete_id = $id;
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function delete(ProjectService $service)
    {
        $service->delete($this->delete_id);
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function toggleAddModal($id = null)
    {
        $this->emit('openLeadModal', $id);
    }

    public function updateProjectsList()
    {
    }
}
