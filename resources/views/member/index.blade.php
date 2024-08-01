@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <a href="{{ route('member.show', ['id' => $user->id]) }}">Xem người dùng</a>
@endsection
