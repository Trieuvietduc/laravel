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



        span {
            font-size: 20px;
            text-align: right
        }

        .textall {
            padding: 20px
        }

        .frame {
            padding: 20px;
            border: 1px solid #cccccc;
            background: #fff;

        }

        .tonken {
            text-align: center;
            font-size: 25px;
            padding: 10px
        }

        .wraper {
            width: 80%;
        }

        .thongbao {
            margin-top: 20px
        }
    </style>
    <div class=" container-fluid my-5">
        <div class="row justify-content-center ">

            <div class="wraper">
                @if (Session::has('thongbao'))
                    <div class="alert alert-success thongbao" style="text-align: center">
                        {{ Session::get('thongbao') }}
                    </div>
                @endif
                <h2 class="textall" style="text-align: center">Đơn hàng của tôi</h2>
                <hr class="my-0">

                <div class="row">
                    @foreach ($donhang as $item)
                        <div class="col frame">
                            <div class="tonken">
                                #{{ $item->id }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span class="text-muted mb-2">Họ và Tên: <br> {{ Auth::user()->name }}</span><br><br>
                                    <span class="text-muted mb-2">Địa chỉ : <br>{{ $item->address }}</span><br><br>
                                    <span class="text-muted mb-2">Số điện thoại: <br>{{ $item->sdt }}</span><br><br>
                                    <span style="font-size: 17px">Trạng thái: <br> <b>{{ $item->status->name }}</b></span>

                                </div>
                                <div class="col">
                                    <span class="text-muted mb-2">Tổng giá hàng: <br> {{ $item->price_order }}</span><br><br>
                                    <span class="text-muted mb-2">Ngày tạo: {{ $item->created_at }}</span><br><br>
                                    <span class="text-muted mb-2">Ghi chú: <br>{{ $item->note }}</span><br><br>
                                    <a href="{{ route('view_detai_user', $item->id) }}">
                                        <p class="text-muted mb-2"><span><b style="font-size: 17px">Chi tiết đơn
                                                    hàng</b></span></p>
                                    </a>
                                </div>
                            </div>
                            <div class="row thongbao">
                                @if ($item->status->name === 'đang xử lý')
                                    <div class="col"><a href="{{ route('detai_status', $item->id) }}"><button
                                                class="btn btn-danger">Huy đơn
                                                hàng</button></a></div>
                                @elseif($item->status->name === 'đang giao')
                                    <div class="col"><a href="{{ route('detai_status_true', $item->id) }}"><button
                                                class="btn btn-primary">Đã
                                                nhận được hàng</button></a></div>
                                @endif


                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div><br><br>
        <div class="col-sm-4"><a href="{{ route('index') }}"><button class="btn btn-warning">Về trang
                    chủ</button></a></div>
    @endsection
