<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    const PATH_UPLOAD = 'avatar';

    public function home()
    {
        return view('users.home');
    }
    public function index()
    {
        $users = User::query()->get();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $model = User::findOrFail($id);
        return view('users.show', compact('model'));
    }

    public function edit(string $id)
    {
        $model = User::query()->findOrFail($id);
        return view('users.edit', compact('model'));
    }
    public function update(Request $request, string $id)
    {

        $model = User::query()->findOrFail($id);
        $data = $request->except('avatar');
        $data['is_active'] ??= 0;

        if ($request->hasFile('avatar')) {
            $data['avatar'] = Storage::put(self::PATH_UPLOAD, $request->file('avatar'));
        }

        $oldCover = $model->avatar;

        $model->update($data);
        // Xóa ảnh cũ
        if ($request->hasFile('avatar') && $oldCover && Storage::exists($oldCover)) {
            Storage::delete($oldCover);
        }

        return redirect()->route('users.show',  $id);
    }

    public function destroy($id)
    {
        $model = User::query()->findOrFail($id);
        $model->delete();
        if ($model->avatar && Storage::exists($model->avatar)) {
            Storage::delete($model->avatar);
        }
        return back();
    }
}
