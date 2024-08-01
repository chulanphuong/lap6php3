@extends('layouts.master')

@section('title')
    Thông Tin Tài Khoản : {{ $model->fullname }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <ul>
                <li><img src="{{ asset('/storage/' . $model->avatar) }}" width="100" style="border-radius: 10px "
                        alt="">
                </li>
                <li>Họ Tên : {{ $model->fullname }} </li>
                <li>Email : {{ $model->email }} </li>
                {{-- <li>Trạng thái hoạt động : {!! $model->is_active ? '<span class="badge bg-primary">YES</span>' : '<span class="badge bg-danger">NO</span>' !!} </li> --}}
            </ul>
        </div>
    </div>

    <a href="{{ route('users.home') }}" class="btn btn-success">Back</a>
    @if (Auth::user()->role == 'admin')
        <a href="{{ route('users.index') }}" class="btn btn-success">Back List User</a>
    @endif
    @if (Auth::user()->role == 'member')
        <a href="{{ route('users.edit', Auth::id()) }}" class="btn btn-warning">Sửa Thông Tin</a>
    @endif
@endsection
