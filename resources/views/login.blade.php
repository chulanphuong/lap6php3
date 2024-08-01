@extends('layouts.master')

@section('title')
    Login
@endsection


@section('content')
    <div class="container">
        <h1>Login</h1>
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        @if (session('errLogin'))
            <div class="alert alert-danger">
                {{ session('errLogin') }}
            </div>
        @endif
        @if (session('errLogin1'))
            <div class="alert alert-danger">
                {{ session('errLogin1') }}
            </div>
        @endif

        @if (session('logout'))
            <div class="alert alert-info">
                {{ session('logout') }}
            </div>
        @endif
        <form action="{{ route('postLogin') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
            <a href="{{ route('register') }}" class="float-right">Register</a> <!-- Register Link -->
        </form>
    </div>
@endsection
