<?php

namespace App\Http\Controllers;

use App\Models\Donhang;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $donhang = Donhang::all();
        $true = Donhang::where('id_status', 3)->count();
        $fale = Donhang::where('id_status', 4)->count();
        $handle = Donhang::where('id_status', 1)->count();
        $tatol = Donhang::select('price_order')->where('id_status', 3)->get();
        $all = Donhang::select('*')->with('status')->get();
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
        ]);
    }
    public function allorder()
    {
        return Donhang::select('*')->with('status')->get();
    }
    public function complete(Request $request)
    {
        if ($request->id == 1) {
            return Donhang::where('id_status', 3)->with('status')->get();
        } elseif ($request->id == 2) {
            return Donhang::where('id_status', 4)->with('status')->get();
        } elseif ($request->id == 3) {
            return Donhang::where('id_status', 1)->with('status')->get();
        } elseif ($request->id == 4) {
            return Donhang::select('*')->with('status')->get();
        }
    }
}
