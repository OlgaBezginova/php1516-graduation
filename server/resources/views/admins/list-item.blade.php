<div>
    <a href="{{ route('admins.admin', ['id' => $admin->id]) }}">
        <span>
            {{ $admin->name }}
        </span>
    </a>
    <span>{{ $admin->status }}</span>
    <a href="{{ route('admins.update', ['id' => $admin->id]) }}">Edit</a>
    <form action="{{ route('admins.delete', ['id' => $admin->id]) }}" method="post"></form>
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</div>
