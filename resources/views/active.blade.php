@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Active Users</div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <th>User</th>
                            <th>Last Active</th>
                            <th>Action(s)</th>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->last_active_at }}</td>
                                <td>
                                    <form action="{{ route('admin.users.kick', $user) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-danger">Kick Out</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
