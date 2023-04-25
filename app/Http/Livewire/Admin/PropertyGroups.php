<?php

namespace App\Http\Livewire\Admin;

use App\Models\PropertyGroup;
use Livewire\Component;
use Livewire\WithPagination;

class PropertyGroups extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyPropertyGroup',
        'refreshComponent' => '$refresh',
    ];

    public function deletePropertyGroup($id)
    {
        $this->dispatchBrowserEvent('deletePropertyGroup', ['id' => $id]);
    }

    public function destroyPropertyGroup($id)
    {
        PropertyGroup::destroy($id);
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $property_groups = PropertyGroup::query()->
            where('title', 'like', '%' . $this->search . '%')->
            paginate(10);
        return view('livewire.admin.property-groups', compact('property_groups'));
    }

}
