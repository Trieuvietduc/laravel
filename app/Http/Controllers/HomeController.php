<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use App\Models\Donhang;
use App\Models\Giohang;
use App\Models\Kichthuoc;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    public function index()
    {
        $donhang = Donhang::all();
        $true = Donhang::where('id_status', 3)->count();
        $fale = Donhang::where('id_status', 4)->count();
        $handle = Donhang::where('id_status', 1)->count();
        $delivering = Donhang::where('id_status', 2)->count();
        $tatol = Donhang::select('price_order')->where('id_status', 3)->get();
        $all = Donhang::Orderby('created_at', 'DESC')->select('*')->with('status')->get();
        $tong = 0;
        foreach ($tatol as $value) {
            $tong += $value->price_order;
        }
        return view('admin.index', [
            'donhang' => $donhang,
            'true' => $true,
            'tong' => $tong,
            'fale' => $fale,
            'handle' => $handle,
            'all' => $all,
            'delivering' => $delivering,
        ]);
    }
    public function allorder()
    {
        return Donhang::select('*')->with('status')->get();
    }
    public function complete(Request $request)
    {
        if ($request->id == 1) {
            $donhang = Donhang::where('id_status', 3)->with('status')->get();
            return response()->json($donhang);
        } elseif ($request->id == 2) {
            $donhang = Donhang::where('id_status', 4)->with('status')->get();
            return response()->json($donhang);
        } elseif ($request->id == 3) {
            $donhang = Donhang::where('id_status', 1)->with('status')->get();
            return response()->json($donhang);
        } elseif ($request->id == 5) {
            $donhang = Donhang::where('id_status', 2)->with('status')->get();
            return response()->json($donhang);
        } elseif ($request->id == 4) {
            $donhang =  Donhang::select('*')->with('status')->get();
            return response()->json($donhang);
        }
    }
    public function search(Request $request)
    {
        $danhmuc = Danhmuc::all();
        $kichthuoc = Kichthuoc::all();
        if (empty($request->result)) {
            return redirect()->route('sanpham');
        } else {
            $product = Product::select('*')->where('name', 'like', '%' . $request->result . '%')->paginate(10);
            if (empty($product->all())) {
                return redirect()->route('error');
            } else {
                if (Auth::user()) {
                    $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
                    return view('clinet.san-pham', [
                        'product' => $product,
                        'danhmuc' => $danhmuc,
                        'kichthuoc' => $kichthuoc,
                        'count_giohang' => $count_giohang,
                    ]);
                } else {
                    return view('clinet.san-pham', [
                        'product' => $product,
                        'danhmuc' => $danhmuc,
                        'kichthuoc' => $kichthuoc,

                    ]);
                }
            }
        }
    }
    public function getlogin()
    {
        return Socialite::driver('google')->redirect();
    }
    public function logincallback()
    {
        $google = Socialite::driver('google')->user();
        if ($google) {
            $user = User::where('email', $google->email)->first();
            if ($user) {
                if ($user->status == 1 && $user->role_id == 2) {
                    Auth::login($user);
                    return redirect()->route('dashboard');
                }
                Auth::login($user);
                return redirect()->route('index');
            }
            $newuser = new User();
            $newuser->status = 1;
            $newuser->remember_token = $google->token;
            $newuser->name = $google->name;
            $newuser->email = $google->email;
            $newuser->password = '';
            $newuser->sex = 'nam';
            $newuser->role_id = 1;
            $newuser->save();
            return redirect()->route('index');
        }
        return redirect()->route('login');
    }
}
