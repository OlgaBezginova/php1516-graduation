<?php

namespace App\Http\Controllers;

use App\Components\OrderStatus;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request, OrderRepository $orderRepository)
    {
        $orders = $orderRepository->list();

        $statuses = OrderStatus::all();

        return view('orders.list', ['orders' => $orders, 'statuses' => $statuses]);
    }

}
