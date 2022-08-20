<x-layout>
    <x-slot name="title">
        {{ $admin->name }}
    </x-slot>
    <x-slot name="h1">
        {{ $admin->name }}
    </x-slot>
    <x-slot name="sidebar">
        <ul>
            <li><a href="{{ route('admins.list') }}">< All admins</a></li>
            <li><a href="{{ route('admins.edit', ['id' => $admin->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></li>
        </ul>
    </x-slot>
    <div class="col-sm-6">
        <div>
            <hr>
            <strong>Email: </strong><span>{{ $admin->email }}</span>
            <hr>
            <strong>Verified at: </strong><span>{{ $admin->email_verified }}</span>
            <hr>
            <strong>Status: </strong><span>{{ \App\Components\Auth\AdminStatus::all()[$admin->status] }}</span>
            <hr>
        </div>
    </div>
</x-layout>

