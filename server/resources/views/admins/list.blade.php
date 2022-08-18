<x-layout>
    <x-slot name="title">
        Admins
    </x-slot>

    <x-slot name="h1">
        Admins
    </x-slot>

    <x-slot name="sidebar">
        <ul>
            <li><a href="{{ route('admins.add') }}"> + Add new</a></li>
        </ul>
    </x-slot>

    <x-slot name="filters">
        <form class="navbar-form navbar-right filters">
            <input type="text" name="name" class="form-control" placeholder="Name">
            <input type="text" name="email" class="form-control" placeholder="Email">
            <select name="status" class="form-control">
                <option value="">Status</option>
                @foreach($statuses as $value=>$status)
                 <option value="{{ $value }}">{{ $status }}</option>
                @endforeach
            </select>
            <button type="submit">Filter</button>
        </form>
    </x-slot>

    <table class="table table-stripped">
        <tbody>
        <tr>
            <td><b>Name</b></td>
            <td><b>Email</b></td>
            <td><b>Verified at</b></td>
            <td><b>Status</b></td>
            <td></td>
            <td></td>
        </tr>
        @foreach($admins as $admin)
            <div>
                <tr>
                    <td>
                        <a href="{{ route('admins.admin', ['id' => $admin->id]) }}">
                <span>
                    {{ $admin->name }}
                </span>
                        </a>
                    </td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->email_verified }}</td>
                    <td><span>{{ $statuses[$admin->status] }}</span></td>
                    <td><a href="{{ route('admins.update', ['id' => $admin->id]) }}">Edit</a></td>
                    <td>
                        <form action="{{ route('admins.delete', ['id' => $admin->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" @if(auth()->id() == $admin->id) disabled @endauth>Delete</button>
                        </form>
                    </td>
                </tr>
            </div>
        @endforeach
        </tbody>
    </table>
</x-layout>
