@extends('layout.layout-client.gio-hang')
@section('content-titel', 'Giỏ hàng')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/gio-hang.css') }}" type="text/css">
    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            @if (Session::has('thongbao'))
                <div class="alert alert-success thongbao">
                    {{ Session::get('thongbao') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá tiền</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($giohang as $item)
                                    <input type="hidden" name="" id=""
                                        value="{{ $total = $item->so_luong * $item->gia }}">
                                    <input type="hidden" name="" id="" value="{{ $totalall += $total }}">

                                    <tr>
                                        <td class="cart__product__item">
                                            <img src="{{ asset($item->avatar_product) }}" alt=""
                                                style="height: 200px; width: 250px;">
                                            <div class="cart__product__item__title">
                                                <h6>{{ $item->product_name }}</h6>
                                            </div>
                                        </td>
                                        <td class="cart__price">{{ number_format($item->gia, 0, ',', '.') }}đ</td>
                                        <td class="cart__quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{ $item->so_luong }}">
                                            </div>
                                        </td>
                                        <td class="cart__total">${{ number_format($total, 0, ',', '.') }}đ</td>

                                        <td><a href="{{ route('giohang_delete', $item->id) }}"><button
                                                    class="btn btn-danger">Delete</button></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{ route('index') }}">Tiếp tục mua sắm</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="#"><span class="icon_loading"></span>Cập nhật giỏ hàng</a>
                    </div>
                </div>
            </div>
            <form action="{{ route('check_order') }}" method="post">
                @csrf
                <div class="">
                    <div class="cart__total__procced">
                        <h6>TỔNG GIỎ HÀNG</h6>
                        <ul>
                            <li>Tổng tất cả <span>{{ number_format($totalall, 0, ',', '.') }}đ</span></li>
                        </ul>
                        <button class="btn btn-warning">tiếp tục</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
