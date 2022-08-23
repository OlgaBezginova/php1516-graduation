<?php

namespace App\Http\Resources;

use App\Repositories\OrderRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'       => $this->id,
            'address'  => $this->address,
            'date'     => $this->created_at,
            'status'   => $this->status,
            'quantity' => $this->total_quantity,
            'total'    => $this->total_price,
            'products' => OrderProductResource::collection($this->orderRepository()->productsList($this->id)),
        ];
    }

    private function orderRepository(): OrderRepository
    {
        return app(OrderRepository::class);
    }

}
