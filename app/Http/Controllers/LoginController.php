<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('clinet.login');
    }
    public function checklogin(Request $request)
    {
        $remeber = $request->checkbox;
        if ($remeber == 'on') {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remeber)) {
                if (Auth::check() == true && Auth::user()->role_id == 1) {
                    if (Auth::user()->status == 1) {
                        return redirect()->route('index');
                    } else {
                        return redirect()->route('login')->with('error', 'tài khoản  đã bị khóa');
                    }
                } else {
                    if (Auth::user()->status == 1) {
                        return redirect()->route('dashboard');
                    } else {
                        return redirect()->route('login')->with('error', 'tài khoản  đã bị khóa');
                    }
                }
            } else {
                return redirect()->route('login')->with('error', 'tài khoản hoặc mật khẩu không đúng');
            }
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::check() == true && Auth::user()->role_id == 1) {
                    if (Auth::user()->status == 1) {
                        return redirect()->route('index');
                    } else {
                        return redirect()->route('login')->with('error', 'tài khoản  đã bị khóa');
                    }
                } else {
                    if (Auth::user()->status == 1) {
                        return redirect()->route('dashboard');
                    } else {
                        return redirect()->route('login')->with('error', 'tài khoản  đã bị khóa');
                    }
                }
            } else {
                return redirect()->route('login')->with('error', 'tài khoản hoặc mật khẩu không đúng');
            }
        }
    }
    public function register()
    {
        return view('clinet.register');
    }
    public function checkregister(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->sex = $request->sex;
        $user->role_id = 1;
        $user->remember_token = $request->_token;
        $user->status = 1;
        $this->validate($request, [
            'email' => 'unique:users',
        ]);
        $user->save();
        return redirect()->route('login')->with('thongbao', 'Đăng ký thành công');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
