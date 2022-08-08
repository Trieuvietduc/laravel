<?php

namespace App\Http\Controllers;

use App\Models\Detaiorder;
use App\Models\Donhang;
use App\Models\Giohang;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiohangController extends Controller
{

    public function list()
    {
        $total = 0;
        $totalall = 0;
        if (Auth::user()) {
            $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
        }
        $giohang = Giohang::where('id_user', Auth::user()->id)->get();
        // dd($giohang);
        return view('clinet.cart', [
            'giohang' => $giohang,
            'count_giohang' => $count_giohang,
            'total' => $total,
            'totalall' => $totalall
        ]);
    }
    public function create(Product $product, Request $request, Giohang $cart)
    {

        if (Auth::user()) {
            $user = Auth::user();
            if ($request->so_luong > $product->so_luong) {
                return redirect()->back()->with('thongbao', 'số lượng sản phẩm của cửa hàng không đủ');
            }
            if ($product->khuyen_mai != null) {
                foreach ($cart->all() as $value) {
                    if ($user->id == $value->id_user && $product->id == $value->id_product) {
                        $value->fill([
                            'id_user' => $user->id,
                            'id_product' => $product->id,
                            'avatar_product' => $product->avatar_product,
                            'so_luong' => $value->so_luong + $request->so_luong,
                            'gia' => $product->khuyen_mai,
                            'product_name' => $product->name,
                        ]);
                        $value->save();
                        return back();
                    }
                }
                $request->so_luong = $request->so_luong;
                $onecart = new Giohang();
                $onecart->fill([
                    'id_user' => $user->id,
                    'id_product' => $product->id,
                    'avatar_product' => $product->avatar_product,
                    'so_luong' => $request->so_luong,
                    'gia' => $product->khuyen_mai,
                    'product_name' => $product->name,
                ]);
                $onecart->save();
                return back();
            } else {
                foreach ($cart->all() as $value) {
                    if ($user->id == $value->id_user && $product->id == $value->id_product) {
                        $value->fill([
                            'id_user' => $user->id,
                            'id_product' => $product->id,
                            'avatar_product' => $product->avatar_product,
                            'so_luong' => $value->so_luong + $request->so_luong,
                            'gia' => $product->don_gia,
                            'product_name' => $product->name,
                        ]);
                        $value->save();
                        return back();
                    }
                }
                $request->so_luong = $request->so_luong;
                $onecart = new Giohang();
                $onecart->fill([
                    'id_user' => $user->id,
                    'id_product' => $product->id,
                    'avatar_product' => $product->avatar_product,
                    'so_luong' => $request->so_luong,
                    'gia' => $product->don_gia,
                    'product_name' => $product->name,
                ]);
                $onecart->save();
                return redirect()->back();
            }
        } else {
            return redirect()->route('login')->with('thongbao', 'bạn cần đăng nhập để mua hàng');
        }
    }
    public function delete(Request $request)
    {
        Giohang::destroy($request->id);
        return back();
    }
    public function check(Giohang $giohang)
    {
        if (count(Giohang::all()) == null) {
            return back()->with('error', 'giỏ hàng của bạn chưa có sản phẩm nào');
        }
        $total = 0;
        $totalall = 0;
        $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
        $giohang = Giohang::where('id_user', Auth::user()->id)->get();
        return view('clinet.order', [
            'count_giohang' => $count_giohang,
            'cart' => $giohang,
            'total' => $total,
            'totalall' => $totalall 
        ]);
    }
    public function detail(Request $request)
    {
        // dd($request->all());
        $giohang = Giohang::where('id_user', Auth::user()->id)->get();
        $order = new Donhang();
        $order->fill([
            'price_order' => $request->price_order,
            'id_user' => Auth::user()->id,
            'id_status' => 1,
            'name' => $request->name,
            'email' => $request->email,
            'sdt' => $request->sdt,
            'address' => $request->address,
            'note' => $request->note,

        ])->save();
        foreach ($giohang as $value) {
            $detai = new Detaiorder();
            $detai->fill([
                'id_product' => $value->id_product,
                'so_luong_product' => $value->so_luong,
                'name_product' => $value->product_name,
                'price_order' => $request->total,
                'id_user' => Auth::user()->id,
                'id_order_detai' => $order->id
            ]);
            $detai->save();
            $product = Product::where('id', $value->id_product)->get();
            foreach ($product as $item) {
                $item->so_luong -= $value->so_luong;
                $item->save();
            }
        }
        foreach ($giohang as $item) {
            Giohang::destroy($item->id);
        }
        return redirect()->route('view_detai');
    }
    public function viewdetai()
    {
        $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
        $donhang = Donhang::Orderby('created_at','DESC')->where('id_user', Auth::user()->id)->get();
        return view('clinet.detai-order', [
            'count_giohang' => $count_giohang,
            'donhang' => $donhang,
        ]);
    }
}
