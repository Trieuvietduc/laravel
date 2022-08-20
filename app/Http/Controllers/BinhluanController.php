<?php

namespace App\Http\Controllers;

use App\Models\Binhluan;
use App\Models\Commentsintermediate;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BinhluanController extends Controller
{
    public function create(Request $request)
    {
        $bl = new Binhluan();
        $bl->fill([
            'noidung' => $request->noidung,
            'id_user' => $request->id_user,
            'id_product' => $request->product,
            'likes' => 0,
            'dislike' => 0,
        ])->save();
        $binhluan = Binhluan::join('users', 'users.id', '=', 'binhluan.id_user')
            ->select('binhluan.*', 'users.name as name_user')
            ->where('binhluan.id_user', $request->id)
            ->orwhere('id_product', $request->product)
            ->get();
        $output = array();
        foreach ($binhluan as $item) {
            $output[] =
                '
            <div class="media">
    
                    <div class="media-body">
                        <h6 class="media-heading id_user">' . $item->name_user . '</h6>
                        <p class="noidung1">' . $item->noidung . '</p>
                        <div class="row" style="margin-left: 20px">
                            <div class="col-1.6" style="margin-right: 10px">
                                <div class="date"><i
                                        class="fa fa-calendar"style="margin-right: 5px"></i>' . date_format($item->created_at, "Y/m/d") . '</div>
                            </div>
                            <div class="abc">
                            <a href="http://noithatvietduc.com/product/binhluan/delete/' . $item->id . '" style="color: #457"><i class="fas fa-trash-alt"></i></a>
                            <a href="http://noithatvietduc.com/product/binhluan/like/' . $item->id . '" style="color: #457 "><i class="fas fa-thumbs-up" style="color: #457 ;margin-right: 5px"></i>' . $item->likes . '</a>
                            <a href="http://noithatvietduc.com/product/binhluan/dislike/' . $item->id . '" style="color: #457"><i class="fas fa-thumbs-down" style="margin-right: 5px"></i>' . $item->dislike . '</a>
                            </div>
                            </div>
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
        foreach (Commentsintermediate::all() as $value) {
            $value->delete();
        }
        Binhluan::destroy($request->id);
        return back();
    }
    public function likes(Binhluan $binhluan)
    {
        $Commentsintermediate = Commentsintermediate::where('id_user', Auth::user()->id)
            ->where('id_product', $binhluan->id_product)->first();

        if ($Commentsintermediate == null) {
            $binhluan->likes += 1;
            $binhluan->save();
            $comment = new Commentsintermediate();
            $comment->fill([
                'id_user' => Auth::user()->id,
                'id_product' => $binhluan->id_product,
            ])->save();
            return back();
        } else {
            if (Auth::user()->id == $Commentsintermediate->id_user && $binhluan->id_product == $Commentsintermediate->id_product) {
                $binhluan->likes -= 1;
                $binhluan->save();
                Commentsintermediate::destroy($Commentsintermediate->id);
                return back();
            }
        }
    }
    public function dislike(Binhluan $binhluan)
    {
        $binhluan->dislike += 1;
        $binhluan->save();
        return back();
    }
}
