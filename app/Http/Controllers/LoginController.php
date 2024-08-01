<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    const PATH_UPLOAD = 'avatar';
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        $data = $request->except('avatar');


        if ($request->hasFile('avatar')) {
            $data['avatar'] = Storage::put(self::PATH_UPLOAD, $request->file('avatar'));
        }
        User::query()->create($data);
        return redirect()->route('login')->with('msg', 'Successfully! Create a new user.');
    }

    public function postLogin(Request $request)
    {
        $data = $request->only('email', 'password');
        // check account
        if (Auth::attempt($data) && Auth::user()->is_active == '1') {
            return redirect()->route('users.home')->with('msg', 'Đăng nhập thành công!');
        } else if (Auth::attempt($data) && Auth::user()->is_active == '0') {
            Auth::logout();  // logout if login fail
            return redirect()->back()->with('errLogin', 'Tài khoản đã bị khóa');
        } else {
            return redirect()->back()->with('errLogin1', 'Thông tin không hợp lệ');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('logout', 'Logout success!');
    }
}