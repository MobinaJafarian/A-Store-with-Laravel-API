<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class Brands extends Component
{
    use WithPagination;

    protected $paginationTheme='bootstrap';
    public $search;

    protected $listeners =[
        'destroyBrand',
        'refreshComponent'=>'$refresh'
    ];

    public function deleteBrand($id)
    {
        $this->dispatchBrowserEvent('deleteBrand',['id'=>$id]);
    }

    public function destroyBrand($id)
    {
        Brand::destroy($id);
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $brands = Brand::query()->
        where('title', 'like', '%' . $this->search . '%')->
        paginate(10);
        return view('livewire.admin.brands', compact('brands'));
    }
}
