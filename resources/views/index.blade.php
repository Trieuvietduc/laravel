@extends('layout.layout-client.layout-client')
@section('content-titel', 'Trang chủ')
@section('content')
    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>Danh mục<colgroup></colgroup>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col text-center">
                    <div class="new_arrivals_sorting">
                        <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked"
                                onclick="check_all(event)">
                                Tất cả sản phẩm
                                @foreach ($danhmuc as $item)
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked"
                                onclick="check(event,{{ $item->id }})">
                                {{ $item->name }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" id="all">
                <div class="col">
                    <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                        @foreach ($product as $item)
                            <div class="product-item men">
                                <input type="hidden" name="so_luong" value="1">
                                <div class="product discount product_filter">

                                    <div class="product_image">
                                        <img src="{{ $item->avatar_product }}" alt="" style="height: 240px">
                                    </div>
                                    <div class="favorite favorite_left"></div>
                                    <div class="product_info">

                                        <h6 class="product_name"><a
                                                href="{{ route('sanpham_detail', $item->id) }}">{{ $item->name }}</a>
                                        </h6>
                                        <div class="product_price">
                                            @if (!$item->khuyen_mai == null)
                                                {{ number_format($item->don_gia, 0, ',', '.') }}đ<span>{{ number_format($item->khuyen_mai, 0, ',', '.') }}đ
                                                @else
                                                    {{ number_format($item->don_gia, 0, ',', '.') }}đ<span>
                                            @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="red_button add_to_cart_button"><a
                                        href="{{ route('sanpham_detail', $item->id) }}">Xem chi tiết</a></div>
                            </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deal of the week -->

    <div class="deal_ofthe_week">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="deal_ofthe_week_img">
                        <img src="https://datacare.vn/wp-content/uploads/2020/12/Banner-Noi-That-TR1112202002.jpg"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-6 text-right deal_ofthe_week_col">
                    <div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
                        <div class="section_title">
                            <h2>Deal Of The Week</h2>
                        </div>
                        <ul class="timer">
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="day" class="timer_num">03</div>
                                <div class="timer_unit">Day</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="hour" class="timer_num">15</div>
                                <div class="timer_unit">Hours</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="minute" class="timer_num">45</div>
                                <div class="timer_unit">Mins</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="second" class="timer_num">23</div>
                                <div class="timer_unit">Sec</div>
                            </li>
                        </ul>
                        <div class="red_button deal_ofthe_week_button"><a href="#">shop now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Sellers -->

    <div class="best_sellers">
        <div class="container">
            {{-- slide product --}}
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>Best Sellers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product_slider_container">
                        <div class="owl-carousel owl-theme product_slider">
                            @foreach ($product as $item)
                                @if ($item->khuyen_mai)
                                    <form action="{{ route('giohang_create', $item) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="so_luong" value="1">
                                        <div class="owl-item product_slider_item">
                                            <div class="product-item">
                                                <div class="product discount">
                                                    <div class="product_image">
                                                        <img src="{{ $item->avatar_product }}" alt=""
                                                            style="height: 200px">
                                                    </div>
                                                    <div class="favorite favorite_left"></div>
                                                    <div
                                                        class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                                        <span>sale</span>
                                                    </div>
                                                    <div class="product_info">
                                                        <h6 class="product_name"><a
                                                                href="{{ route('sanpham_detail', $item->id) }}">{{ $item->name }}</a>
                                                        </h6>
                                                        <div class="product_price">
                                                            {{ number_format($item->don_gia, 0, ',', '.') }}đ<span>{{ number_format($item->khuyen_mai, 0, ',', '.') }}đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="red_button add_to_cart_button"><button
                                                            class="red_button add_to_cart_button"
                                                            style="border:1px solid red">Thêm vào giỏ hàng</button></div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            @endforeach
                        </div>
                        <!-- Slider Navigation -->
                        <div
                            class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </div>
                        <div
                            class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Benefit -->
    <div class="benefit">
        <div class="container">
            <div class="row benefit_row">
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>
                                MIỄN PHÍ VẬN CHUYỂN</h6>
                            <p>Bị thay đổi trong một số hình thức</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>Cách giao hang</h6>
                            <p>
                                Internet có xu hướng lặp lại</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>45 ngày trở lại</h6>
                            <p>Làm cho nó trông giống như có thể đọc được</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>
                                Mở cả tuần</h6>
                            <p>8AM - 09PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div
                        class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                        <h4>
                            Bản tin</h4>
                        <p>Đăng ký nhận bản tin của chúng tôi và được giảm giá 20% khi mua hàng đầu tiên của bạn</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="post">
                        <div
                            class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                            <input id="newsletter_email" type="email" placeholder="Your email" required="required"
                                data-error="Valid email is required.">
                            <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300"
                                value="Submit">subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    </div>
    <script>
        function check(event, id) {
            event.preventDefault();
            $.ajax({
                url: 'http://127.0.0.1:8000/one_danhmuc/' + id,
                type: 'get',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(ketqua) {
                    var html = '';
                    for (pro of ketqua) {
                        html += '<div class="product-item men baby">',
                            html += '<div class="product discount product_filter ">',
                            html += '<div class="product_image">',
                            html += '<img src=" ' + pro.avatar_product + ' " alt=""  style="height: 225px">',
                            html += '</div>',
                            html += '<div class="favorite favorite_left"></div>',
                            html +=
                            '<div class="product_bubble product_bubble_right  d-flex flex-column align-items-center">',

                            html += '</div>',
                            html += '<div class="product_info">',
                            html += '<h6 class="product_name"><a href="http://127.0.0.1:8000/san-pham/detail/' +
                            pro.id + '">' + pro.name + '</a> </h6>',
                            html += '<div class="product_price">$' + new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            }).format(pro.don_gia) + '<span>$ ' + new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            }).format(pro.khuyen_mai) +
                            '</span></div>',
                            html += '</div>',
                            html += '</div>',
                            html +=
                            '<div class="red_button add_to_cart_button"><a href="http://127.0.0.1:8000/san-pham/detail/' +
                            pro.id + '">Xem chit tiết</a></div>',
                            html += '</div>'
                    }
                    document.getElementById("all").innerHTML = html;
                    console.log(html);
                },
            });
        }

        function check_all(event) {
            event.preventDefault()
            var id = event.value
            $.ajax({
                url: 'http://127.0.0.1:8000/all_danhmuc/',
                type: 'get',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(ketqua) {
                    var html = '';
                    for (pro of ketqua) {
                        html += '<div class="product-item men baby">',
                            html += '<div class="product discount product_filter ">',
                            html += '<div class="product_image">',
                            html += '<img src=" ' + pro.avatar_product + ' " alt="" style="height: 225px">',
                            html += '</div>',
                            html += '<div class="favorite favorite_left"></div>',
                            html +=
                            '<div class="product_bubble product_bubble_right align-items-center">',

                            html += '</div>',
                            html += '<div class="product_info">',
                            html += '<h6 class="product_name"><a href="http://127.0.0.1:8000/san-pham/detail/' +
                            pro.id + '">' + pro.name + '</a> </h6>',
                            html += '<div class="product_price">$' + new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            }).format(pro.don_gia) + '<span>$ ' + new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            }).format(pro.khuyen_mai) +
                            '</span></div>',
                            html += '</div>',
                            html += '</div>',
                            html +=
                            '<div class="red_button add_to_cart_button"><a href="http://127.0.0.1:8000/san-pham/detail/' +
                            pro.id + '">Xem chi tiết</a></div>',
                            html += '</div>'
                    }
                    document.getElementById("all").innerHTML = html;
                    console.log(id);
                }
            })
        }
    </script>
@endsection
