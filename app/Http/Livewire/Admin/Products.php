<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    protected $paginationTheme='bootstrap';
    public $search;

    protected $listeners =[
        'destroyProduct',
        'refreshComponent'=>'$refresh'
    ];

    public function deleteProduct($id)
    {
        $this->dispatchBrowserEvent('deleteProduct',['id'=>$id]);
    }

    public function destroyProduct($id)
    {
        $product = Product::query()->find($id);
        $path = public_path().'/images/admin/products/big/'.$product->image;
        unlink($path);
        $product->delete();
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $products = Product::query()->
        where('title', 'like', '%' . $this->search . '%')->
        orWhere('title_en', 'like', '%' . $this->search . '%')->
        orWhere('description', 'like', '%' . $this->search . '%')->
        paginate(10);
        return view('livewire.admin.products', compact('products'));
    }
}

