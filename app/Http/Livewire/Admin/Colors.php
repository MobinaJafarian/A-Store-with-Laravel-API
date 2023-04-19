<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Livewire\Component;
use Livewire\WithPagination;

class Colors extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyColor',
        'refreshComponent' => '$refresh',
    ];

    public function deleteColor($id)
    {
        $this->dispatchBrowserEvent('deleteColor', ['id' => $id]);
    }

    public function destroyColor($id)
    {
        Color::destroy($id);
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $colors = Color::query()->
            where('name', 'like', '%' . $this->search . '%')->
            paginate(10);
        return view('livewire.admin.colors', compact('colors'));

    }
}
