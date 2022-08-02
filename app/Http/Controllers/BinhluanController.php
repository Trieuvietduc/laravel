<?php

namespace App\Http\Controllers;

use App\Models\Binhluan;
use Illuminate\Http\Request;

class BinhluanController extends Controller
{
    public function create(Request $request)
    {
        $bl = new Binhluan();
        $bl->fill([
            'noidung' => $request->noidung,
            'id_user' => $request->id_user,
            'id_product' => $request->product
        ])->save();
        $binhluan = Binhluan::join('users', 'users.id', '=', 'binhluan.id_user')
        ->select('binhluan.*', 'users.name as name_user')
        ->where('binhluan.id_user', $request->id)
        ->orwhere('id_product',$request->product)
        ->get();
        $output = array();
        foreach ($binhluan as $item) {
            $output[] =
                '
            <div class="media">
    
                    <div class="media-body">
                        <h4 class="media-heading id_user">' . $item->name_user. '</h4>
                        <p class="noidung1">' . $item->noidung . '</p>
                        <div class="row" style="margin-left: 20px">
                            <div class="col-1.6" style="margin-right: 10px">
                                <div class="date"><i
                                        class="fa fa-calendar"style="margin-right: 5px"></i>' . $item->created_at . '</div>
                            </div>
                            <div class="abc"><a href="http://127.0.0.1:8000/product/binhluan/delete/' . $item->id . '" onclick="abc(' . $item->id . ')" style="color: #457">Xóa</a></div>
                        </div>
                    </div>
                </div>
                <br>
            ';
        }

        return $output;
    }
    public function delete(Request $request)
    {
        Binhluan::destroy($request->id);
        return back();
    }
}
