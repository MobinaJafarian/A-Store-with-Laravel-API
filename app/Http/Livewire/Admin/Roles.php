<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithPagination;

    protected $paginationTheme='bootstrap';    
    public $search;

    public function render()
    {
        $roles = Role::query()->
            where('name', 'like', '%' . $this->search . '%')->
            paginate(10);
        return view('livewire.admin.roles', compact('roles'));
    }
}
