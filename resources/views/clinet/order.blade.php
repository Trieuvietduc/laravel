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
        span{
            color: red
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
                            <div class="card border-0">
                                <div class="card-header pb-0">
                                    <h2 class="card-title space ">Checkout</h2>
                                    <hr class="my-0">
                                </div>
                                <form action="{{ route('detail_order') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row justify-content-between">
                                            <div class="col-auto mt-0">
                                                <p><b>Họ và tên: <br> {{ Auth::user()->name }}</b></p>
                                            </div>
                                            <div class="col-auto">
                                                <p><b>Email: <br> {{ Auth::user()->email }}</b> </p>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <p class="text-muted mb-2">Điền thông tin vận chuyển</p>
                                                <hr class="mt-0">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NAME" class="small text-muted mb-1">ĐỊA CHỈ</label>
                                            <input type="text" class="form-control form-control-sm" name="address"
                                                id="address" aria-describedby="helpId" placeholder="">
                                            <span id="error_address"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="NAME" class="small text-muted mb-1">SỐ ĐIỆN THOẠI</label>
                                            <input type="text" class="form-control form-control-sm" name="sdt"
                                                id="sdt" aria-describedby="helpId" placeholder="">
                                            <span id="error_phone"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="NAME" class="small text-muted mb-1">GHI CHÚ</label>
                                            <input type="text" class="form-control form-control-sm" name="note"
                                                id="note" aria-describedby="helpId" placeholder="">
                                            <span id="error_note"></span>
                                        </div>

                                        <div class="row mb-5 mt-4 ">
                                            <div class="col-md-7 col-lg-6 mx-auto">
                                                <button type="submit" class="btn btn-block btn-outline-primary btn-lg">ĐẶT HÀNG</button>
                                            </div>
                                        </div>

                                    </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card border-0 ">
                                <div class="card-header card-2">

                                    <hr class="my-2">
                                </div>
                                @foreach ($cart as $item)
                                    <div class="card-body pt-0">
                                        <div class="row  justify-content-between">
                                            <input type="hidden" name="total" id=""
                                                value="{{ $total = $item->so_luong * $item->gia }}">
                                            <input type="hidden" name="price_order" id=""
                                                value="{{ $totalall += $total }}">
                                            <input type="hidden" name="" id="" value="{{ $ship = 50000 }}">
                                            <div class="col-auto col-md-7">
                                                <div class="media flex-column flex-sm-row">
                                                    <img src="{{ asset($item->avatar_product) }}" width="100px"
                                                        height="100px">
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <div class="media-body  my-auto">
                                                        <p style="margin-left: 15px"><b>{{ $item->product_name }}</b>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" pl-0 flex-sm-col col-auto  my-auto">
                                                <p class="boxed-1">{{ $item->so_luong }}</p>
                                            </div>
                                            <div class=" pl-0 flex-sm-col col-auto  my-auto ">
                                                <p><b>{{ number_format($total, 0, ',', '.') }}đ</b>
                                                </p>
                                                <hr class="my-2">
                                            </div>
                                @endforeach
                            </div>
                            <hr class="my-2">
                            <div class="col">
                                <div class="row justify-content-between">
                                    <div class="col">
                                        <p class="mb-1"><b>Tiền ship</b></p>
                                    </div>
                                    <div class="flex-sm-col col-auto">
                                        <p class="mb-1"><b>50.000đ</b></p>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-4">
                                        <p><b>Tổng tiền</b></p>
                                    </div>
                                    <div class="flex-sm-col col-auto">
                                        <p class="mb-1">
                                            <b>{{ number_format($totalall + $ship, 0, ',', '.') }}đ</b>
                                        </p>
                                    </div>
                                </div>
                                <hr class="my-0">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    {{-- <script>
        function add() {
            var note = document.getElementById("note");
            var phone = document.getElementById("phone");
            var address = document.getElementById("address");
            if (address.value == '') {
                document.getElementById("error_address").innerHTML = "địa chỉ không được để trống";
                address.style.border = "1px solid red";
            } else {
                document.getElementById("error_address").innerHTML = "";
                address.style.border = "1px solid green";
            }
            if (phone.value == '') {
                document.getElementById("error_phone").innerHTML = "số điện thoại không được để trống";
                phone.style.border = "1px solid red";
            } else {
                document.getElementById("error_phone").innerHTML = "";
                phone.style.border = "1px solid green";
                document.forms['form'].submit();
            }
        }
    </script> --}}
@endsection
