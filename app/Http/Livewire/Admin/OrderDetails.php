<?php

namespace App\Http\Livewire\Admin;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\OrderDetail;
use Livewire\Component;
use Livewire\WithPagination;

class OrderDetails extends Component
{
    public $order_id;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    public function changeStatus($order_detail_id)
    {
        $order_detai = OrderDetail::query()->find($order_detail_id);
        if($order_detai->status === OrderStatus::Received->value){
            $order_detai->update([
                'status'=>OrderStatus::Rejected->value
            ]);
        }else if($order_detai->status === OrderStatus::Processing->value){
            $order_detai->update([
                'status'=>OrderStatus::Received->value
            ]);
        }else{
            $order_detai->update([
                'status'=>OrderStatus::Processing->value
            ]);
        }
    }

    public function render()
    {
        $orderDetails = OrderDetail::query()->where('order_id', $this->order_id)
        ->paginate(10);
        $total_price = Order::query()->find($this->order_id)->total_price;
        return view('livewire.admin.order-details', compact('orderDetails', 'total_price'));
    }
}
