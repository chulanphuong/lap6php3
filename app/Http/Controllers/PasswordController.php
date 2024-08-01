<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    //
    public function update(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);


        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password,  Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng']);
        }

        // Cập nhật mật khẩu mới
        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);


        return redirect()->route('password.change')->with('status', 'Mật khẩu đã được thay đổi thành công');
    }
}