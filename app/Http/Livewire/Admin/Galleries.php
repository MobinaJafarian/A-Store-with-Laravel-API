<?php

namespace App\Http\Livewire\Admin;

use App\Models\Gallery;
use Livewire\Component;

class Galleries extends Component
{
    public $product_id;

    protected $listeners =[
        'destroyGallery',
        'refreshComponent'=>'$refresh'
    ];

    public function deleteGallery($product_id,$id)
    {
        $this->dispatchBrowserEvent('deleteGallery',['product_id'=>$product_id,'id'=>$id]);
    }

    public function destroyGallery($product_id,$id)
    {
        $gallery = Gallery::query()->where('product_id',$product_id)->where('id',$id)->first();
        $path = public_path().'/images/admin/products/big/'.$gallery->image;
        unlink($path);
        $gallery->delete();
        $this->emit('refreshComponent');
    }


    public function render()
    {
        $galleries = Gallery::query()->get();
        return view('livewire.admin.galleries', compact('galleries'));
    }
}
