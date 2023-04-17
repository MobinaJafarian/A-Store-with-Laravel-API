<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    protected $paginationTheme='bootstrap';
    public $search;

    protected $listeners =[
        'destroyCategory',
        'refreshComponent'=>'$refresh'
    ];

    public function deleteCategory($id)
    {
        $this->dispatchBrowserEvent('deleteCategory',['id'=>$id]);
    }

    public function destroyCategory($id)
    {
        Category::destroy($id);
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $categories = Category::query()->
        where('title', 'like', '%' . $this->search . '%')->
        paginate(10);
        return view('livewire.admin.categories', compact('categories'));
    }
    
}
