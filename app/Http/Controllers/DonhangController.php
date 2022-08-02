<?php

namespace App\Http\Controllers;

use App\Models\Detaiorder;
use App\Models\Donhang;
use App\Models\Giohang;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonhangController extends Controller
{
    public function list()
    {
        $donhang = Donhang::select('*')->with('status')->get();
        $status = Status::select('*')->with('order')->get();
        return view('admin.order.list', [
            'donhang' => $donhang,
            'status' => $status
        ]);
    }
    public function detaiorder(Request $request)
    {
        $detai = Detaiorder::where('id_user', $request->id)->get();
        return view('admin.order.detai-order', [
            'detai' => $detai
        ]);
    }
    public function detaiorderusser(Request $request)
    {
        $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
        $detai = Detaiorder::where('id_user', $request->id)->get();
        return view('clinet.detai-order-user', [
            'count_giohang' => $count_giohang,
            'detai' => $detai
        ]);
    }
    // public function statusorder(Request $request, Donhang $donhang)
    // {
    //     dd($request->status);
    //     $donhang = Donhang::select('id_status')->where('id', $request->id_status)->first();

    //     $donhang->fill(
    //         [
    //             'name' => $donhang->name,
    //             'email' => $donhang->email,
    //             'sdt' => $donhang->sdt,
    //             'address' => $donhang->address,
    //             'price_order' => $donhang->note,
    //             'id_status' => $request->id_status,
    //             'id_user' => $donhang->id_user,
    //         ]
    //     )->save();
    //     return back();
    // }
    public function detaiorderstatus(Request $request)
    {
        $donhang = Donhang::where('id', $request->id)->first();
        if ($donhang->id_status == 4) {
            return back()->with('error', 'đơn hàng này đã hủy rồi');
        }
        if ($donhang->id_status == 2) {
            return back()->with('error', 'đơn hàng đang giao và không thể hủy được');
        }
        if ($donhang->id_status == 3) {
            return back()->with('error', 'đơn hàng đã thành công và không thể hủy được');
        }
        $donhang->id_status = 4;
        $donhang->save();
        return back()->with('thongbao', 'hủy thành công đơn hàng');
    }
    public function detaiorderstatustrue(Request $request)
    {
        $donhang = Donhang::where('id', $request->id)->first();
        if ($donhang->id_status == 4) {
            return back()->with('error', 'đơn hàng này đã hủy và không thể xác nhận thành công');
        }
        if ($donhang->id_status == 1) {
            return back()->with('error', 'đơn hàng này chưa vận chuyển nên bạn không thể bấm thành công');
        }
        
        if ($donhang->id_status == 3) {
            return back()->with('thongbao', 'đơn hàng này đã thành công rồi');
        }
        $donhang->id_status = 3;
        $donhang->save();
        return back()->with('thongbao', 'cảm ơn bạn đã mua hàng bên tôi');
    }
}
