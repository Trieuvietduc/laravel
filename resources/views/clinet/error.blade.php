@extends('layout.layout-client.gio-hang')
@section('content-titel', 'Không có rồi')
@section('content')
   <link rel="stylesheet" href="{{asset('css/error.css')}}">
    <div class="container">
        <section class="page_404">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="col-sm-10 col-sm-offset-1  text-center">
                            <div class="four_zero_four_bg">
                                <h1 class="text-center ">no</h1>
                            </div>

                            <div class="contant_box_404">
                                <h3 class="h2">
                                    Sản phẩm bạn tìm hiện tại không có
                                </h3>

                                <p>mới quý khác tìm sản phẩm khác hoạt bấm sang trang sản phẩm để tìm món đồ mà mình ưng
                                    nhất
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
