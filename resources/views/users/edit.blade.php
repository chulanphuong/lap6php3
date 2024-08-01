@extends('layouts.master')

@section('title')
    Sửa Thông Tin Tài Khoản : {{ $model->fullname }}
@endsection

@section('content')
    <form action="{{ route('users.update', $model->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">

                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Họ và Tên:</label>
                    <input type="text" class="form-control" value="{{ $model->fullname }}" id="fullname"
                        placeholder="Enter name" name="fullname">
                </div>
                <div class="mb-3 mt-3">
                    <label for="cover" class="form-label">Avatar:</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                    <img src="{{ asset('/storage/' . $model->avatar) }}" width="50px">
                </div>

            </div>
            @if (Auth::user()->role == 'admin')
                <div class="col-md-6">
                    <div class="form-check mb-3">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="1"
                                @if ($model->is_active) checked @endif checked name="is_active"> Is Active
                        </label>
                    </div>
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @if (Auth::user()->role == 'admin')
        <form action="{{ route('users.destroy', $model->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Are you sure')" style="margin-top: 50px" type="submit"
                class="btn btn-danger">Xóa
                Tài
                Khoản</button>
        </form>
    @endif
@endsection
