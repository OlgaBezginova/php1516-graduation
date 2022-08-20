<x-layout>
    <x-slot name="title">
        Edit Admin {{ $admin->name }}
    </x-slot>

    <x-slot name="h1">
        Edit admin {{ $admin->name }}
    </x-slot>

    <x-slot name="sidebar">
        <ul>
            <li><a href="{{ route('admins.list') }}">< All admins</a></li>
        </ul>
    </x-slot>
    <div class="col-sm-6">
        <form action="{{ route('admins.update', ['id' => $admin->id]) }}" method="post">
            @csrf
            @if(auth()->id() == $admin->id)
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $admin->name }}">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password_confirm" placeholder="Confirm Password">
                </div>
            @endauth
            @if(auth()->id() != $admin->id)
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="">Status</option>
                        @foreach($statuses as $value=>$status)
                            <option value="{{ $value }}" @if($admin->status == $value) selected @endif>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            @endauth
            <button type="submit">Save</button>
        </form>
    </div>
</x-layout>
