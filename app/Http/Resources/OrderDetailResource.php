<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'product'=>$this->product->title,
            'count'=>$this->count,
            'price'=>$this->price,
            'discount'=>$this->discount,
            'discount_price'=>$this->discount_price,
            'status'=>$this->status
        ];
    }
}
