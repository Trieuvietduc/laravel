@extends('layout.layout-client.gio-hang')
@section('content-titel', 'Giỏ hàng')
@section('content')
    <style>
        body {
            background: linear-gradient(110deg, #BBDEFB 60%, #42A5F5 60%);
        }

        .shop {
            font-size: 10px;
        }

        .space {
            letter-spacing: 0.8px !important;
        }

        .second a:hover {
            color: rgb(92, 92, 92);
        }

        .active-2 {
            color: rgb(92, 92, 92)
        }


        .breadcrumb>li+li:before {
            content: "" !important
        }

        .breadcrumb {
            padding: 0px;
            font-size: 10px;
            color: #aaa !important;
        }

        .first {
            background-color: white;
        }

        a {
            text-decoration: none !important;
            color: #aaa;
        }

        .btn-lg,
        .form-control-sm:focus,
        .form-control-sm:active,
        a:focus,
        a:active {
            outline: none !important;
            box-shadow: none !important
        }

        .form-control-sm:focus {
            border: 1.5px solid #4bb8a9;
        }

        .btn-group-lg>.btn,
        .btn-lg {
            padding: .5rem 0.1rem;
            font-size: 1rem;
            border-radius: 0;
            color: white !important;
            background-color: #4bb8a9;
            height: 2.8rem !important;
            border-radius: 0.2rem !important;
        }

        .btn-group-lg>.btn:hover,
        .btn-lg:hover {
            background-color: #26A69A;
        }

        .btn-outline-primary {
            background-color: #fff !important;
            color: #4bb8a9 !important;
            border-radius: 0.2rem !important;
            border: 1px solid #4bb8a9;
        }

        .btn-outline-primary:hover {
            background-color: #4bb8a9 !important;
            color: #fff !important;
            border: 1px solid #4bb8a9;
        }

        .card-2 {
            margin-top: 40px !important;
        }

        .card-header {
            background-color: #fff;
            border-bottom: 0px solid #aaaa !important;
        }

        p {
            font-size: 13px;
        }

        .small {
            font-size: 9px !important;
        }

        .form-control-sm {
            height: calc(2.2em + .5rem + 2px);
            font-size: .875rem;
            line-height: 1.5;
            border-radius: 0;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .boxed {
            padding: 0px 8px 0 8px;
            background-color: #4bb8a9;
            color: white;
        }

        .boxed-1 {
            padding: 0px 8px 0 8px;
            color: black !important;
            border: 1px solid #aaaa;
        }

        .bell {
            opacity: 0.5;
            cursor: pointer;
        }

        @media (max-width: 767px) {
            .breadcrumb-item+.breadcrumb-item {
                padding-left: 0
            }
        }
    </style>
    <div class=" container-fluid my-5 ">
        <div class="row justify-content-center ">
            <div class="col-xl-10">
                <div class="card shadow-lg ">
                    <div class="row  mx-auto justify-content-center text-center">
                        <div class="col-12 mt-3 ">
                        </div>
                    </div>

                    <div class="row justify-content-around">
                        <div class="col-md-5">
                            @if (Session::has('thongbao'))
                                <div class="alert alert-success thongbao" style="text-align: center">
                                    {{ Session::get('thongbao') }}
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger" style="text-align: center">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <div class="card border-0">
                                <div class="card-header pb-0">
                                    <h2 class="card-title space " style="text-align: center">Đơn hàng của tôi</h2>
                                    <hr class="my-0">
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div class="col-auto mt-0">
                                            <p><b>Họ và tên: <br> {{ Auth::user()->name }}</b></p>
                                        </div>
                                        <div class="col-auto">
                                            <p><b>Email: <br> {{ Auth::user()->email }}</b> </p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted mb-2">thông tin đơn hàng</p>
                                        <b>tổng đơn hàng {{ count($donhang) }}</b>
                                        <hr class="mt-0">
                                    </div>
                                    <div class="row mt-4">

                                        @foreach ($donhang as $item)
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="text-muted mb-2">giá sản phẩm : {{ $item->price_order }} </p>
                                                    <p class="text-muted mb-2">ngày tạo đơn {{ $item->created_at }}</p>
                                                    <p class="text-muted mb-2">Trạng thái
                                                        <b>{{ $item->status->name }}</b>
                                                    </p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="text-muted mb-2">số điện thoại : {{ $item->sdt }}</p>
                                                    <p class="text-muted mb-2">địa chỉ: {{ $item->address }}</p>
                                                    <p class="text-muted mb-2">ghi chú : {{ $item->note }}</p>
                                                    <a href="{{ route('view_detai_user', $item->id) }}">
                                                        <p class="text-muted mb-2"><b>Xem chi tiết đơn hàng</b></p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col"><a
                                                        href="{{ route('detai_status', $item->id) }}"><button
                                                            class="btn btn-danger">Huy đơn
                                                            hàng</button></a></div>
                                                <div class="col"><a href="{{ route('detai_status_true', $item->id) }}"><button class="btn btn-primary">Đã
                                                            nhận được hàng</button></a></div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-sm-4"><a href="{{ route('index') }}"><button class="btn btn-warning">Về trang
                            chủ</button></a></div>
            </div>
        </div>
    @endsection
