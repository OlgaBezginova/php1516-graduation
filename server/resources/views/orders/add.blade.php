<x-layout>
    <x-slot name="title">
        New Order
    </x-slot>

    <x-slot name="h1">
        New Order
    </x-slot>

    <x-slot name="sidebar">
        <ul>
            <li><a href="{{ route('orders.list') }}">< All orders</a></li>
        </ul>
    </x-slot>
    <div class="col-sm-6">
        <form action="{{ route('orders.create') }}" method="post" class="add-order">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="form-group col-md-12">
                <select name="user" class="form-control">
                    <option value="">User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address') }}">
                </div>
            </div>
            <div  id="products">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <h3>Products</h3>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <select name="products[]" class="form-control">
                            <option value="">User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <input min="1" type="number" class="form-control" name="quantities[]" value="1">
                    </div>
                    <div class="form-group col-md-1">
                        <button>X</button>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <button>+ Add Product</button>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <button type="submit">Save Order</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
