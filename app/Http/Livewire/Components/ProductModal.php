<?php

namespace App\Http\Livewire\Components;

use App\Models\Product;
use App\Services\ProductService;
use Livewire\Component;

class ProductModal extends Component
{
    public $open = false;
    public Product $product;

    protected $rules = [
        'product.name' => 'required'
    ];

    protected $listeners = ['openProductModal'];

    public function render()
    {
        return view('livewire.components.product-modal');
    }

    public function save(ProductService $service)
    {
        $this->validate();
        $service->save([
            'id' => $this->product->id, 
            'name' => $this->product->name
        ]);

        $this->closeModal();
        $this->emitUp('updateProductsList');
    }

    public function closeModal()
    {
        $this->open = false;
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->product = new Product;
    }

    public function openProductModal(ProductService $service, $id = null)
    {
        $this->open = true;
        if($id != null){
            $this->product = $service->find($id);
        }else{
            $this->product = new Product;
        }
    }
}
