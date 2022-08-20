<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    public function login()
    {
        return view('clinet.login');
    }
    public function checklogin(RegisterRequest $request)
    {
        $remeber = $request->checkbox;
        if ($remeber == 'on') {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remeber)) {
                if (Auth::user()->role_id == 1) {
                    if (Auth::user()->status == 1) {
                        return redirect()->route('index');
                    } else {
                        Auth::logout();
                        return redirect()->route('login')->with('error', 'tài khoản  đã bị khóa');
                    }
                } else {
                    if (Auth::user()->status == 1) {
                        return redirect()->route('dashboard');
                    } else {
                        Auth::logout();
                        return redirect()->route('login')->with('error', 'tài khoản  đã bị khóa');
                    }
                }
            } else {
                return redirect()->route('login')->with('error', 'tài khoản hoặc mật khẩu không đúng');
            }
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::user()->role_id == 1) {
                    if (Auth::user()->status == 1) {
                        return redirect()->route('index');
                    } else {
                        Auth::logout();
                        return redirect()->route('login')->with('error', 'tài khoản  đã bị khóa');
                    }
                } else {
                    if (Auth::user()->status == 1) {
                        return redirect()->route('dashboard');
                    } else {
                        Auth::logout();
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
    public function checkregister(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->sex = $request->sex;
        $user->role_id = 1;
        $user->remember_token = $request->_token;
        $user->status = 1;
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
    public function checkpassword()
    {
        return view('clinet/check-password');
    }
    public function checkpasswordreset(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
