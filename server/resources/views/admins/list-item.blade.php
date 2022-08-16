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
        <td><span>{{ $admin->status }}</span></td>
        <td><a href="{{ route('admins.update', ['id' => $admin->id]) }}">Edit</a></td>
        <td><form action="{{ route('admins.delete', ['id' => $admin->id]) }}" method="post"></form>
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </td>
    </tr>
</div>
