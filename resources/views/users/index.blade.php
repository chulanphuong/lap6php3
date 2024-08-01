@extends('layouts.master')

@section('title')
    List Users
@endsection

@section('content')
    <h1 class="text-center">List User</h1>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Avatar</th>
                <th scope="col">Is Active</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <th scope="row">{{ $user->fullname }}</th>
                    <th scope="row">{{ $user->email }}</th>
                    <th scope="row">
                        <img src="{{ asset('/storage/' . $user->avatar) }}" width="50px">
                    </th>
                    <td>{!! $user->is_active
                        ? '<span class="badge bg-success">Đang hoạt động</span>'
                        : '<span class="badge bg-danger">Ngừng hoạt động</span>' !!}</td>
                    <th scope="row">{{ $user->role }}</th>
                    @if ($user->role == 'member')
                        <th scope="row">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Thay đổi thông tin</a>
                        </th>
                    @endif

                    <th scope="row">

                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning">Xem thông tin</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
