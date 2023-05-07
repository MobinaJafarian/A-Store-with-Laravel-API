<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'refreshComponent' => '$refresh',
    ];

    public function render()
    {
        $orders = Order::query()->
            where('code', 'like', '%' . $this->search . '%')->
            orWhereHas('user', function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')->
                orWhere('mobile', 'like', '%' . $this->search . '%');
        })->paginate(10);
        return view('livewire.admin.orders', compact('orders'));
    }

}
