<x-layout>
    <x-slot name="title">
        Order #{{ $order->id }}
    </x-slot>

    <x-slot name="h1">
        Order #{{ $order->id }}
    </x-slot>

    <x-slot name="sidebar">
        <ul>
            <li><a href="{{ route('orders.list') }}"> < All orders</a></li>
            <li><a href="{{ route('orders.edit', ['id' => $order->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></li>
        </ul>
    </x-slot>
    <div class="col-sm-10"><hr></div>
    <div class="col-sm-6">
        <div>
            <strong>Customer: </strong><a href="{{ route('users.user', ['id' => $order->user_id]) }}">{{ $order->user_name }}</a>
            <br>
            <br>
            <strong>Address: </strong><span>{{ $order->address }}</span>
            <br>
            <br>
            <strong>Date: </strong><span>{{ $order->created_at }}</span>
            <br>
            <br>
            <strong>Status: </strong><span>{{ $order->status }}</span>
        </div>
    </div>
    <div class="col-sm-10"><hr></div>
    <div class="col-sm-10">
        <table class="table table-stripped">
            <tbody>
            <tr>
                <td><b>Product</b></td>
                <td><b>Price</b></td>
                <td><b>Quantity</b></td>
                <td><b>Subtotal</b></td>
            </tr>
            @foreach($products as $product)
                <div>
                    <tr>
                        <td><a href="{{ route('products.product', ['id' => $product->id]) }}">{{ $product->title }}</a></td>
                        <td><span>{{ $product->price }} $</span></td>
                        <td><span>{{ $product->quantity }}</span></td>
                        <td><span>{{ $product->price * $product->quantity }} $</span></td>
                    </tr>
                </div>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-10"><hr></div>
    <div class="col-sm-6">
        <div>
            <strong>Total quantity: </strong><span>{{ $order->total_quantity }}</span>
            <br>
            <strong>Total Price: </strong><span>{{ $order->total_price }} $</span>
        </div>
    </div>
    <div class="col-sm-10"><hr></div>
</x-layout>
