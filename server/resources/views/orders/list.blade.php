<x-layout>
    <x-slot name="title">
        Orders
    </x-slot>

    <x-slot name="h1">
        Orders
    </x-slot>

    <x-slot name="sidebar">
        <ul>
            <li><a href="{{ route('orders.add') }}"> + Add new</a></li>
        </ul>
    </x-slot>

    <x-slot name="filters">
        <form class="navbar-form navbar-right filters">
            <button type="submit">Filter</button>
        </form>
    </x-slot>

    <table class="table table-stripped">
        <tbody>
        <tr>
            <td><b>Order ID</b></td>
            <td><b>Customer</b></td>
            <td><b>Quantity</b></td>
            <td><b>Total</b></td>
            <td><b>Status</b></td>
            <td><b>Date</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @foreach($orders as $order)
            <div>
                <tr>
                    <td><span>{{ $order->id }}</span></td>
                    <td>
                        <a href="{{ route('users.user', ['id' => $order->user_id]) }}">
                            <span>
                                {{ $order->user_name }}
                            </span>
                        </a>
                    </td>
                    <td><span>{{ $order->total_quantity }}</span></td>
                    <td><span>{{ $order->total_price }} $</span></td>
                    <td><span>{{ $order->status }}</span></td>
                    <td><span>{{ $order->created_at }}</span></td>
                    <td><a href="{{ route('orders.order', ['id' => $order->id]) }}">Details</a></td>
                    <td><a href="{{ route('orders.edit', ['id' => $order->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
                    <td>
                        <form action="{{ route('orders.delete', ['id' => $order->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            </div>
        @endforeach
        </tbody>
    </table>
</x-layout>
