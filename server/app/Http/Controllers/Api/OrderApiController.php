<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderApiController extends BaseApiController
{
    public function orders(OrderRepository $orderRepository)
    {
        return OrderResource::collection($orderRepository->byUserId($this->userId()));
    }
}
