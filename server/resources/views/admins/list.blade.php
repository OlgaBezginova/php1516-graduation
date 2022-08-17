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
                @foreach($statuses as $status)
                 <option value="{{ $status }}"></option>
                @endforeach
               {{-- <option value="2">New</option>
                <option value="3">Disabled</option>--}}
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
        @each('admins.list-item', $admins, 'admin')
        </tbody>
    </table>
</x-layout>
