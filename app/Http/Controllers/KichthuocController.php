<?php

namespace App\Http\Controllers;

use App\Models\Kichthuoc;
use Illuminate\Http\Request;

class KichthuocController extends Controller
{
    public function list(){
        $kichthuoc = Kichthuoc::all();
        return view('admin.kichthuoc.list',[
            'kichthuoc'=>$kichthuoc
        ]);
    }
    public function create(){
        return view('admin.kichthuoc.create');
    }
    public function store(Request $request){
        $kichthuoc = new Kichthuoc();
        $kichthuoc->fill($request->all())->save();
        return redirect()->route('kichthuoc_list')->with('thongbao','Thêm kích thước thành công');
    }
    public function edit(Request $request){
        $kichthuoc = Kichthuoc::where('id',$request->id)->first();
        return view('admin.kichthuoc.edit',[
            'kichthuoc'=>$kichthuoc
        ]);
    }
    public function update(Request $request){
        Kichthuoc::find($request->id)->update($request->all());
       return redirect()->route('kichthuoc_list')->with('thongbao','Sửa kích thước thành công');
   }
   public function delete(Request $request){
       Kichthuoc::destroy($request->id);
       return redirect()->route('kichthuoc_list')->with('thongbao','Xóa  kích thước thành công');
   }
}
