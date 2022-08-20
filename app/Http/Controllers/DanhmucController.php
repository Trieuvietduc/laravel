<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use App\Models\Giohang;
use App\Models\Kichthuoc;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhmucController extends Controller
{
    public function one_danhmuc(Request $request)
    {
        return  Product::where('id_danhmuc', $request->id)->get();
    }
    public function all_danhmuc(Request $request)
    {
        if ($request->all() == false) {
            return  Product::all();
        }
    }
    public function fill_danhmuc(Request $request)
    {
        $danhmuc = Danhmuc::all();
        $kichthuoc = Kichthuoc::all();
        $fill_danhmuc = Product::where('id_danhmuc', $request->id)->with('danhmuc')->paginate(10);
        if (Auth::user()) {
            $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
            return view('clinet.san-pham', [
                'danhmuc' => $danhmuc,
                'product' => $fill_danhmuc,
                'kichthuoc' => $kichthuoc,
                'count_giohang' => $count_giohang
            ]);
        } else {
            return view('clinet.san-pham', [
                'danhmuc' => $danhmuc,
                'product' => $fill_danhmuc,
                'kichthuoc' => $kichthuoc
            ]);
        }
    }
    public function list()
    {
        $danhmuc = Danhmuc::all();
        return view('admin.danhmuc.list', [
            'danhmuc' => $danhmuc
        ]);
    }
    public function create()
    {
        return view('admin.danhmuc.create');
    }
    public function store(Request $request)
    {
        $danhmuc = new Danhmuc();
        $danhmuc->fill([
            'name' => $request->name
        ])->save();
        return redirect()->route('danhmuc_list')->with('thongbao', 'Thêm danh mục thành công');
    }
    public function edit(Request $request)
    {
        $danhmuc = Danhmuc::where('id', $request->id)->first();
        return view('admin.danhmuc.edit', [
            'danhmuc' => $danhmuc
        ]);
    }
    public function update(Request $request)
    {
        Danhmuc::find($request->id)->update($request->all());
        return redirect()->route('danhmuc_list')->with('thongbao', 'Sửa danh mục thành công');
    }
    public function delete(Request $request)
    {
        if ($request->id == 7) {
            return back()->with('error', 'Danh mục này không được xóa');
        }
        $product = Product::where('id_danhmuc', $request->id)
            ->select('*')->get();
        // dd($product);
        foreach ($product as $val) {
            $val->id_danhmuc = 7;
            $val->save();
        }
        Danhmuc::destroy($request->id);

        return redirect()->route('danhmuc_list')->with('thongbao', 'Xóa  danh mục thành công');
    }
}
