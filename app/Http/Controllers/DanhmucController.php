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
        $id = 2;
        $danhmuc = Danhmuc::all();
        $kichthuoc = Kichthuoc::all();
        $j = 2;
        $fill_danhmuc = Product::where('id_danhmuc', $request->id)->with('danhmuc')->get();
        if(Auth::user()){
            $count_giohang = Giohang::where('id_user',Auth::user()->id)->get();
            return view('clinet.san-pham', [
                'danhmuc' => $danhmuc,
                'fill_danhmuc' => $fill_danhmuc,
                'kichthuoc' => $kichthuoc,
                'id' => $id,
                'j' => $j,
                'count_giohang' => $count_giohang,
            ]);
        }else{
            return view('clinet.san-pham', [
                'danhmuc' => $danhmuc,
                'fill_danhmuc' => $fill_danhmuc,
                'kichthuoc' => $kichthuoc,
                'id' => $id,
                'j' => $j
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
            'name'=> $request->name
        ])->save();
        return redirect()->route('danhmuc_list')->with('thongbao','Thêm danh mục thành công');
    }
    public function edit(Request $request){
        $danhmuc = Danhmuc::where('id',$request->id)->first();
        return view('admin.danhmuc.edit',[
            'danhmuc'=>$danhmuc
        ]);
    }
    public function update(Request $request){
         Danhmuc::find($request->id)->update($request->all());
        return redirect()->route('danhmuc_list')->with('thongbao','Sửa danh mục thành công');
    }
    public function delete(Request $request){
        Danhmuc::destroy($request->id);
        return redirect()->route('danhmuc_list')->with('thongbao','Xóa  danh mục thành công');
    }
}
