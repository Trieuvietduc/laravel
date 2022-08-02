<?php

namespace App\Http\Controllers;

use App\Models\Binhluan;
use App\Models\Danhmuc;
use App\Models\Giohang;
use App\Models\Kichthuoc;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
            $danhmuc = Danhmuc::select('id', 'name')->get();

            $product =  Product::all();
            return view('index', [
                'danhmuc' => $danhmuc,
                'product' => $product,
                'count_giohang' => $count_giohang,

            ]);
        } else {
            $danhmuc = Danhmuc::select('id', 'name')->get();
            $product =  Product::all();
            return view('index', [
                'danhmuc' => $danhmuc,
                'product' => $product,


            ]);
        }
    }
    public function sanpham()
    {
        $danhmuc = Danhmuc::select('id', 'name')->get();
        $product =  Product::all();
        $kichthuoc = Kichthuoc::all();
        $id = null;
        $j = null;
        if (Auth::user()) {
            $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
            return view('clinet.san-pham', [
                'product' => $product,
                'danhmuc' => $danhmuc,
                'id' => $id,
                'kichthuoc' => $kichthuoc,
                'j' => $j,
                'count_giohang' => $count_giohang,
            ]);
        } else {
            return view('clinet.san-pham', [
                'product' => $product,
                'danhmuc' => $danhmuc,
                'id' => $id,
                'kichthuoc' => $kichthuoc,
                'j' => $j,
            ]);
        }
    }
    public function kichthuoc(Request $request)
    {
        $id = 1;
        $j = 1;
        $kichthuoc = Kichthuoc::all();
        $danhmuc = Danhmuc::select('id', 'name')->get();
        $fill_kichthuoc = Product::where('kich_thuoc', $request->id)->with('danhmuc')->get();
        if (Auth::user()) {
            $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
            return view('clinet.san-pham', [
                'danhmuc' => $danhmuc,
                'fill_kichthuoc' => $fill_kichthuoc,
                'kichthuoc' => $kichthuoc,
                'j' => $j,
                'id' => $id,
                'count_giohang' => $count_giohang
            ]);
        } else {
            return view('clinet.san-pham', [
                'danhmuc' => $danhmuc,
                'fill_kichthuoc' => $fill_kichthuoc,
                'kichthuoc' => $kichthuoc,
                'j' => $j,
                'id' => $id
            ]);
        }
    }
    public function detai(Request $request)
    {
        if (Auth::user()) {
            $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
            $user = Auth::user()->id;
            $sanpham = Product::where('id', $request->id)->first();
            $kichthuoc = Product::join('kichthuoc', 'kichthuoc.id', 'product.kich_thuoc')
                ->select('kichthuoc.name as name_kichthuoc')
                ->where('product.kich_thuoc', $sanpham->kich_thuoc)
                ->first();
            $binhluan = Binhluan::join('users', 'users.id', '=', 'binhluan.id_user')->select('binhluan.*', 'users.name as name_user')->where('id_product', $request->id)->get();
            return view('clinet.san-pham-detail', [
                'sanpham' => $sanpham,
                'kichthuoc' => $kichthuoc,
                'binhluan' => $binhluan,
                'user' => $user,
                'count_giohang' => $count_giohang,
            ]);
        } else {
            $sanpham = Product::where('id', $request->id)->first();
            $kichthuoc = Product::join('kichthuoc', 'kichthuoc.id', 'product.kich_thuoc')
                ->select('kichthuoc.name as name_kichthuoc')
                ->where('product.kich_thuoc', $sanpham->kich_thuoc)
                ->first();

            $binhluan = Binhluan::where('id_product', $request->id)->get();
            return view('clinet.san-pham-detail', [
                'sanpham' => $sanpham,
                'kichthuoc' => $kichthuoc,
                'binhluan' => $binhluan,
            ]);
        }
    }









    //admin

    public function list()
    {
        $product = Product::select('id', 'name', 'don_gia', 'khuyen_mai', 'so_luong', 'avatar_product', 'id_danhmuc')
            ->with('danhmuc')
            ->paginate(6);
        return view('admin.product.list', [
            'product' => $product
        ]);
    }
    public function create()
    {

        $danhmuc = Danhmuc::select('id', 'name')->get();
        $kichthuoc = Kichthuoc::select('id', 'name')->get();
        return view('admin.product.create', [
            'danhmuc' => $danhmuc,
            'kichthuoc' => $kichthuoc
        ]);
    }
    public function store(ProductUpdateRequest $request)
    {
        $product = new Product();
        $product->fill($request->all());
        if ($request->hasFile('avatar_product')) {
            $avatar = $request->avatar_product;
            $avatarName = $avatar->hashName();
            $avatarName = $request->name . '_' . $avatarName;
            $product->avatar_product = $avatar->storeAs('images/users', $avatarName);
        }
        //4. Lưu
        $product->save();
        return redirect()->route('product_list');
    }
    public function delete(Request $request)
    {
        Product::destroy($request->id);
        return redirect()->route('product_list')->with('thongbao', 'xóa sản phẩm thành công');
    }
    public function deleteall(Request $request)
    {
        $product = $request->all;
        foreach ($product as $value) {
            Product::destroy($value);
        };
        return redirect()->route('product_list')->with('thongbao', 'xóa sản phẩm thành công');
    }
    public function edit(Request $request)
    {
        $danhmuc = Danhmuc::all();
        $kichthuoc = Kichthuoc::all();
        $product = Product::where('id', $request->id)->first();
        return view('admin.product.edit', [
            'danhmuc' => $danhmuc,
            'kichthuoc' => $kichthuoc,
            'product' => $product
        ]);
    }
    public function update(Request $request, Product $product)
    {
        $product->fill($request->all());
        if ($request->hasFile('avatar_product')) {
            $avatar = $request->avatar_product;
            $avatarName = $avatar->hashName();
            $avatarName = $product->name . '_' . $avatarName;
            $product->avatar_product = $avatar->storeAs('images/product', $avatarName);
        }
        $product->save();
        return redirect()->route('product_list')->with('thongbao', 'Sửa sản phẩm thành công');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        if (empty($search)) {
            $product =  Product::select(
                'id',
                'name',
                'don_gia',
                'khuyen_mai',
                'so_luong',
                'avatar_product',
                'id_danhmuc'
            )
                ->paginate(6);
        } else {
            $product = Product::select(
                'id',
                'name',
                'don_gia',
                'khuyen_mai',
                'so_luong',
                'avatar_product',
                'id_danhmuc'
            )
                ->where('name', 'like', '%' . $search . '%')
                ->paginate(6);
        }
        return view('admin.product.list', [
            'product' => $product
        ]);
    }
}
