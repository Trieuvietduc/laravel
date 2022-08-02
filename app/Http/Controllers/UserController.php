<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProductUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role_id', 1)->get();
        return view('admin.user.list', [
            'user_list' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function status(User $user)
    {
        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }
        $user->save();
        return back();
    }
    public function adminindex()
    {
        $admin = User::where('role_id', 2)->get();
        return view('admin.admin.list', [
            'admin' => $admin
        ]);
    }
    public function admincreate()
    {
        return view('admin.admin.create');
    }
    public function adminstore(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->sex = $request->sex;
        $user->role_id = 2;
        $user->remember_token = $request->_token;
        $user->status = $request->status;
        $this->validate($request, [
            'email' => 'unique:users',
        ]);
        $user->save();
        return redirect()->route('admin_list')->with('thongbao', 'Đăng ký thành công');
    }

    public function adminedit(Request $request)
    {

        $account = User::where('id', $request->id)->first();
        return view('admin.admin.edit', [
            'account' => $account
        ]);
    }
    public function adminupdate(Request $request, User $user)
    {
        $user->fill($request->all(), [
            'role_id' => 2,
            'status' => 1
        ])->save();
        return view('admin.admin.list')->with('thongbao', 'Thêm tài khoản thành công');
    }
    public function admindelete(Request $request){
        User::destroy($request->id);
        return back()->with('thongbao', 'Xóa tài khoản thành công');
    }
}
