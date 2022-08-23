<?php

namespace App\Http\Controllers;

use App\Components\OrderStatus;
use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request, OrderRepository $orderRepository)
    {
        return view('orders.list', [
            'orders' => $orderRepository->list(),
            'statuses' => OrderStatus::all(),
        ]);
    }

    public function show($id, OrderRepository $orderRepository)
    {
        if (!$order = $orderRepository->byId($id)) {
            abort(404);
        }
        return view('orders.order', [
            'order' => $order,
            'products' => $orderRepository->productsList($order->id),
        ]);
    }

    public function add(UserRepository $userRepository)
    {
        return view('orders.add', [
            'statuses' => OrderStatus::all(),
            'users' => $userRepository->list(),
        ]);
    }

}
