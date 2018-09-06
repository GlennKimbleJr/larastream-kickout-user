<table>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>
                <form action="{{ route('admin.users.kick', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-sm btn-danger">Kick Out</button>
                </form>
            </td>
    @endforeach
</table>
