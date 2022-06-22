<?php

namespace App\Http\Controllers;

use App\User;
use Hash;
use Auth;
use Session;
use Validator;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index()
    {
        return view('BE.login_register.login');
    }

    public function checkout(Request $request)
    {

        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ], [
            'email.require' => 'bạn cần nhập email',
            'min.password' => 'mật khẩu cần tối thiểu 6 ký tự'
        ]);
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        $remember = $request->has('remember_token') ? true : false;
        $checkLogin = Auth::attempt($data, $remember);
        if ($checkLogin) {

            return redirect()->route('admin.user.index')->with('success', 'Đăng nhập thành công');
        }
        session()->flash('error', 'Sai tài khoản hoặc mật khẩu.');
        return redirect()->back();
    }

    public function AdminRegister()
    {
        return view('BE.login_register.register');

    }

    public function PostRegister(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:users',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20|same:password',
                'image' => 'mimes:jpg,bmp,png'
            ],
            [
                'name.required' => 'vui lòng nhập tên',
                'name.unique' => 'Tên đã có người sử dụng',
                'email.required' => 'vui lòng nhập email',
                'email.email' => 'không đúng dạng email',
                'email.unique' => 'emai đã có người dùng',
                'password.required' => 'password chưa nhập',
                'password.same' => 'mật khẩu không giống nhau',
                'image.required' => 'Vui lòng nhập ảnh của bạn',
                'image.mimes' => 'Ảnh chưa đúng định dạng'
            ]);

        $path_avatar = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file
            $filename = '-' . time() . '.' . $fileExtension;
            $path_upload = 'uploads/user/';
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload . $filename;
        }
        $users = new User();
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));
        $users->image = $path_avatar;
        $users->save();
        session()->flash('success', 'Tạo thành công.');
        return redirect()->route('admin.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.index');
    }
}
