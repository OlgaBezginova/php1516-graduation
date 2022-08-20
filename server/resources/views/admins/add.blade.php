<x-layout>
    <x-slot name="title">
        New Admin
    </x-slot>

    <x-slot name="h1">
        New Admin
    </x-slot>

    <x-slot name="sidebar">
        <ul>
            <li><a href="{{ route('admins.list') }}">< All admins</a></li>
        </ul>
    </x-slot>
    <div class="col-sm-6">
        <form action="{{ route('admins.create') }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password_confirm" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <select name="status" class="form-control">
                    <option value="">Status</option>
                    @foreach($statuses as $value=>$status)
                        <option value="{{ $value }}">{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Add</button>
        </form>
    </div>
</x-layout>
