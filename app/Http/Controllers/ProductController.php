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
use App\Models\Favourite;

class ProductController extends Controller
{
    public function index()
    {

        $danhmuc = Danhmuc::select('id', 'name')->get();
        $product =  Product::all();

        if (Auth::user()) {
            $true = Favourite::where('id_user', Auth::user()->id)->get();
            $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
            return view('index', [
                'danhmuc' => $danhmuc,
                'product' => $product,
                'count_giohang' => $count_giohang,
                'true' => $true,

            ]);
        } else {
            return view('index', [
                'danhmuc' => $danhmuc,
                'product' => $product,
            ]);
        }
    }
    public function sanpham()
    {
        $danhmuc = Danhmuc::select('id', 'name')->get();
        $product =  Product::paginate(10);
        $kichthuoc = Kichthuoc::all();
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
    public function kichthuoc(Request $request)
    {
        $kichthuoc = Kichthuoc::all();
        $danhmuc = Danhmuc::select('id', 'name')->get();
        $fill_kichthuoc = Product::where('kich_thuoc', $request->id)->with('danhmuc')->paginate(10);
        if (Auth::user()) {
            $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
            return view('clinet.san-pham', [
                'danhmuc' => $danhmuc,
                'product' => $fill_kichthuoc,
                'kichthuoc' => $kichthuoc,
                'count_giohang' => $count_giohang
            ]);
        } else {
            return view('clinet.san-pham', [
                'danhmuc' => $danhmuc,
                'product' => $fill_kichthuoc,
                'kichthuoc' => $kichthuoc,
            ]);
        }
    }
    public function detai(Request $request)
    {
        $sanpham = Product::where('id', $request->id)->first();
        $kichthuoc = Product::join('kichthuoc', 'kichthuoc.id', 'product.kich_thuoc')
            ->select('kichthuoc.name as name_kichthuoc')
            ->where('product.kich_thuoc', $sanpham->kich_thuoc)
            ->first();
        // $kichthuoc = Product::with('sizes')->first();
        // dd($kichthuoc);
        if (Auth::user()) {
            $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
            $user = Auth::user()->id;
            $binhluan = Binhluan::with('users')->get();
            return view('clinet.san-pham-detail', [
                'sanpham' => $sanpham,
                'kichthuoc' => $kichthuoc,
                'binhluan' => $binhluan,
                'user' => $user,
                'count_giohang' => $count_giohang,
            ]);
        } else {
            $binhluan = Binhluan::where('id_product', $request->id)->get();
            return view('clinet.san-pham-detail', [
                'sanpham' => $sanpham,
                'kichthuoc' => $kichthuoc,
                'binhluan' => $binhluan,
            ]);
        }
    }
    public function sort(Request $request)
    {
        $danhmuc = Danhmuc::select('id', 'name')->get();
        $kichthuoc = Kichthuoc::all();
        if ($request->select == 0) {
            return back();
        }
        if ($request->select == 1) {
            $product = Product::Orderby('created_at', 'DESC')->select('*')->paginate(10);
        } elseif ($request->select == 2) {
            $product = Product::Orderby('don_gia', 'DESC')->select('*')->paginate(10);
        } elseif ($request->select == 3) {
            $product = Product::Orderby('don_gia', 'ASC')->select('*')->paginate(10);
        }
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
    // sản phẩm yêu thích
    public function favorite(Product $product,$id)
    {
        dd($id);
        $model = new Favourite();
        $model->fill([
            'id_user' => Auth::user()->id,
            'id_product' => $product->id,
            'name' => $product->name,
            'don_gia' => $product->don_gia,
            'so_luong' => $product->so_luong,
            'avatar_product' => $product->avatar_product,
            'mo_ta' => $product->mo_ta,
            'khuyen_mai' => $product->khuyen_mai,
            'id_danhmuc' => $product->id_danhmuc,
            'kich_thuoc' => $product->kich_thuoc
        ])->save();
        return back();
    }






    //admin

    public function list()
    {
        $product = Product::Orderby('created_at', 'DESC')->select('*')
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
            $product->avatar_product = $avatar->storeAs('images/product', $avatarName);
        }
        //4. Lưu
        $product->save();
        return redirect()->route('product_list')->with('thongbao', 'Thêm sản phẩm thành công');
    }
    public function delete(Request $request)
    {
        Product::destroy($request->id);
        return redirect()->route('product_list')->with('thongbao', 'xóa sản phẩm thành công');
    }
    public function deleteall(Request $request)
    {
        if ($request->all == null) {
            return  redirect()->route('product_list')->with('error', 'bạn cần chọn sản phẩm muốn xóa');
        }
        $product = $request->all;
        foreach ($product as $value) {
            Product::destroy($value);
        };
        return redirect()->route('product_list')->with('thongbao', 'xóa sản phẩm thành công');
    }
    public function edit(Request $request)
    {
        $danhmuc = Danhmuc::select('*')->get();
        $kichthuoc = Kichthuoc::select('*')->get();
        $product = Product::where('id', $request->id)->first();
        return view('admin.product.edit', [
            'danhmuc' => $danhmuc,
            'kichthuoc' => $kichthuoc,
            'product' => $product
        ]);
    }
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->fill($request->all());
        if ($request->hasFile('avatar_product')) {
            $avatar = $request->avatar_product;
            $avatarName = $avatar->hashName();
            $avatarName = $product->name . '_' . $avatarName;
            $product->avatar_product = $avatar->storeAs('images/products', $avatarName);
        }
        $product->save();
        $giohang = Giohang::where('id_product', $product->id)->first();
        if ($product->khuyen_mai == null) {
            $giohang->fill([
                'id_user' => $giohang->id_user,
                'id_product' => $giohang->id_product,
                'product_name' => $product->name,
                'avatar_product' => $product->avatar_product,
                'so_luong' => $giohang->so_luong,
                'gia' => $product->don_gia,
            ])->save();
        } else {
            $giohang->fill([
                'id_user' => $giohang->id_user,
                'id_product' => $giohang->id_product,
                'product_name' => $product->name,
                'avatar_product' => $product->avatar_product,
                'so_luong' => $giohang->so_luong,
                'gia' => $product->khuyen_mai,
            ])->save();
        }

        return redirect()->route('product_list')->with('thongbao', 'Sửa sản phẩm thành công');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        if (empty($search)) {
            $product =  Product::Orderby('name', 'DESC')->select('*')
                ->paginate(10);
        } else {
            $product = Product::Orderby('name', 'DESC')->select('*')
                ->where('name', 'like', '%' . $search . '%')
                ->paginate(10);
        }
        return view('admin.product.list', [
            'product' => $product
        ]);
    }
}
