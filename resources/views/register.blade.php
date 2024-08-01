@extends('layouts.master')

@section('title')
    Register
@endsection


@section('content')
    <div class="container">
        <h1>Register</h1>
        <form action="{{ route('postRegister') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Fullname</label>
                <input type="text" name="fullname" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="username" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Avatar</label>
                <input type="file" name="avatar" id="avatar" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <div class="mb-3">
                <a href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </div>
@endsection
