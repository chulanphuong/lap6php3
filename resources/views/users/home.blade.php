@extends('layouts.master')

@section('title')
    Hello
@endsection

@section('content')
    @auth
        <a href="{{ route('users.show', Auth::id()) }}">Xem thông tin người dùng</a>
    @endauth
@endsection
