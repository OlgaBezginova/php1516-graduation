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
        <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
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
