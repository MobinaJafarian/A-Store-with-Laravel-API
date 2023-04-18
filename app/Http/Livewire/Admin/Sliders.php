<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class Sliders extends Component
{
    
    use WithPagination;

    protected $paginationTheme='bootstrap';
    public $search;

    protected $listeners =[
        'destroySlider',
        'refreshComponent'=>'$refresh'
    ];

    public function deleteSlider($id)
    {
        $this->dispatchBrowserEvent('deleteSlider',['id'=>$id]);
    }

    public function destroySlider($id)
    {
        Slider::destroy($id);
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $sliders = Slider::query()->
        where('title', 'like', '%' . $this->search . '%')->
        paginate(10);
        return view('livewire.admin.sliders',compact('sliders'));
    }
}