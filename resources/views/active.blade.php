<table>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td><a href="{{ route('admin.users.kick', $user) }}">Kick Out</a></td>
    @endforeach
</table>
