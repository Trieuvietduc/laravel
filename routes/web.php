<?php

use App\Http\Controllers\BinhluanController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\DonhangController;
use App\Http\Controllers\GiohangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KichthuocController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAccountLogin;
use App\Http\Middleware\CheckAdmin;
use App\Models\Giohang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// client
// index
Route::get('/', [ProductController::class, 'index'])->name('index');
// error
Route::get('error', function () {
    if (Auth::user()) {
        $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
        return view('clinet.error', [
            'count_giohang' => $count_giohang
        ]);
    } else {
        return view('clinet.error');
    }
})->name('error');
// search index
Route::get('search', [HomeController::class, 'search'])->name('search_home');
// login
Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('check-login', [LoginController::class, 'checklogin'])->name('checklogin')->middleware('guest');
Route::get('check-pasword', [LoginController::class, 'checkpassword'])->name('check_pasword')->middleware('guest');
Route::post('check-pasword', [LoginController::class, 'checkpasswordreset'])->name('check_pasword_reset')->middleware('guest');

// register
Route::get('register', [LoginController::class, 'register'])->name('register')->middleware('guest');
Route::post('check-register', [LoginController::class, 'checkregister'])->name('check_register')->middleware('guest');

// logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


// liên hệ
Route::get('lien-he', function () {
    if (Auth::user()) {
        $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
        return view('clinet.lien-he', [
            'count_giohang' => $count_giohang
        ]);
    } else {
        return view('clinet.lien-he');
    }
});

Route::prefix('san-pham')->group(function () {
    // lọc theo kích thước
    Route::get('/kich-thuoc/{id}', [ProductController::class, 'kichthuoc'])->name('kichthuoc');
    // sản phẩm
    Route::get('/', [ProductController::class, 'sanpham'])->name('sanpham');
    // chi tiết sản phẩm
    Route::get('/detail/{id}', [ProductController::class, 'detai'])->name('sanpham_detail');
});

//danh mục
Route::get('one_danhmuc/{id}', [DanhmucController::class, 'one_danhmuc'])->name('danhmuc');
Route::get('all_danhmuc', [DanhmucController::class, 'all_danhmuc'])->name('all_danhmuc');
Route::get('danh-muc/{id}', [DanhmucController::class, 'fill_danhmuc'])->name('fill_danhmuc');
// bình luận
Route::middleware([CheckAccountLogin::class])->prefix('product')->group(function () {
    Route::post('/binhluan', [BinhluanController::class, 'create'])->name('binhluon_create');
    Route::get('/binhluan/delete/{id}', [BinhluanController::class, 'delete'])->name('binhluan_delete');
});

// giỏ hàng
Route::middleware([CheckAccountLogin::class])->prefix('gio-hang')->group(function () {
    Route::get('/', [GiohangController::class, 'list'])->name('cart');
    Route::post('/add/{product}', [GiohangController::class, 'create'])->name('giohang_create');
    Route::get('/delete/{id}', [GiohangController::class, 'delete'])->name('giohang_delete');
    Route::post('/check-order', [GiohangController::class, 'check'])->name('check_order');
    Route::post('/detail-order', [GiohangController::class, 'detail'])->name('detail_order');
    Route::get('/detail-order', [GiohangController::class, 'viewdetai'])->name('view_detai');
    Route::get('/detail-order/{id}', [DonhangController::class, 'detaiorderusser'])->name('view_detai_user');
    Route::get('/detail-order-status/{id}', [DonhangController::class, 'detaiorderstatus'])->name('detai_status');
    Route::get('/detail-order-status-true/{id}', [DonhangController::class, 'detaiorderstatustrue'])->name('detai_status_true');
});











// dashboard
Route::middleware([CheckAccountLogin::class])->middleware([CheckAdmin::class])->prefix('dashboard')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    //account
    // user
    Route::get('/user/list', [UserController::class, 'index'])->name('user_list');
    //admin
    Route::get('/admin/list', [UserController::class, 'adminindex'])->name('admin_list');
    Route::get('/admin/create', [UserController::class, 'admincreate'])->name('admin_create');
    Route::post('/admin/store', [UserController::class, 'adminstore'])->name('admin_store');
    Route::get('/admin/edit/{id}', [UserController::class, 'adminedit'])->name('admin_edit');
    Route::get('/admin/delete/{id}', [UserController::class, 'admindelete'])->name('admin_delete');
    Route::post('/admin/admin_update/{id}', [UserController::class, 'adminupdate'])->name('admin_update');
    Route::get('/user/status/{user}', [UserController::class, 'status'])->name('user_status');
    // product
    Route::get('/product/list', [ProductController::class, 'list'])->name('product_list');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product_delete');
    Route::post('/product/deleteall', [ProductController::class, 'deleteall'])->name('product_deleteall');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product_create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product_store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product_edit');
    Route::post('/product/update/{product}', [ProductController::class, 'update'])->name('product_update');
    // search
    Route::get('/product/search', [ProductController::class, 'search'])->name('search');
    // category
    Route::get('/danhmuc/list', [DanhmucController::class, 'list'])->name('danhmuc_list');
    Route::get('/danhmuc/create', [DanhmucController::class, 'create'])->name('danhmuc_create');
    Route::post('/danhmuc/store', [DanhmucController::class, 'store'])->name('danhmuc_store');
    Route::get('/danhmuc/edit/{id}', [DanhmucController::class, 'edit'])->name('danhmuc_edit');
    Route::post('/danhmuc/update/{id}', [DanhmucController::class, 'update'])->name('danhmuc_update');
    Route::get('/danhmuc/delete/{id}', [DanhmucController::class, 'delete'])->name('danhmuc_delete');
    // size
    Route::get('/kichthuoc/list', [KichthuocController::class, 'list'])->name('kichthuoc_list');
    Route::get('/kichthuoc/create', [KichthuocController::class, 'create'])->name('kichthuoc_create');
    Route::post('/kichthuoc/store', [KichthuocController::class, 'store'])->name('kichthuoc_store');
    Route::get('/kichthuoc/edit/{id}', [KichthuocController::class, 'edit'])->name('kichthuoc_edit');
    Route::post('/kichthuoc/update/{id}', [KichthuocController::class, 'update'])->name('kichthuoc_update');
    Route::get('/kichthuoc/delete/{id}', [KichthuocController::class, 'delete'])->name('kichthuoc_delete');
    // đơn hàng
    Route::get('/don-hang/list', [DonhangController::class, 'list'])->name('donhang_list');
    Route::get('/don-hang/detai/{id}', [DonhangController::class, 'detaiorder'])->name('detai_order_user');
    Route::get('/don-hang/status/{donhang}', [DonhangController::class, 'statusorder'])->name('status_order');
    // thống kê
    Route::get('thongke/order', [HomeController::class, 'allorder'])->name('orderall');
    Route::get('thongke/order/complete', [HomeController::class, 'complete'])->name('complete');
});
