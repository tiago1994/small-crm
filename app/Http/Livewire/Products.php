<?php

namespace App\Http\Livewire;

use App\Services\ProductService;
use Livewire\Component;

class Products extends Component
{
    public $openModal = false;
    public $openDeleteModal = false;
    public $delete_id;

    protected $listeners = ['updateProductsList'];

    public function render(ProductService $service)
    {
        return view('livewire.products', ['products' => $service->getAllPaginate()]);
    }

    public function toggleDeleteModal($id = null)
    {
        $this->delete_id = $id;
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function delete(ProductService $service)
    {
        $service->delete($this->delete_id);
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function toggleAddModal($id = null)
    {
        $this->emit('openProductModal', $id);
    }

    public function updateProductsList()
    {
    }
}
