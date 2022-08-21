<?php

namespace App\Repositories;


use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    private function orderQuery()
    {
        return Order::join('order_product', 'orders.id', '=', 'order_product.order_id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->selectRaw(
                'orders.id,
                 orders.address,
                 orders.status,
                 orders.user_id,
                 orders.created_at,
                 sum(order_product.quantity) as total_quantity,
                 sum(order_product.price*order_product.quantity) as total_price,
                 users.name as user_name,
                 users.email')
            ->groupBy('orders.id');
    }

    public function list()
    {
        return $this->orderQuery()->get();
    }

    public function byId($id)
    {
        return $this->orderQuery()->find($id);
    }

    public function productsList($id)
    {
        return Product::join('order_product', 'products.id', '=', 'order_product.product_id')
            ->select(
                'products.id',
                'products.title',
                'order_product.price as price',
                'order_product.quantity as quantity')
            ->where('order_product.order_id', $id)
            ->get();
    }

    public function byUserId($id)
    {
        return $this->orderQuery()->where('orders.user_id', $id)->get();
    }

    public function delete(Order $order)
    {
        $order->delete();
    }
}
