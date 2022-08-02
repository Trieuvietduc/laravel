@extends('layout.layout-client.layout-client')
@section('content-titel', 'Chi tiết sản phẩm')
@section('content')
    <style>
        span {
            color: red;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <div class='container1'>
        <div class='background-element' id='background-element'>
        </div>

        <div class='highlight-window' id='product-img'>
            <img src="{{ asset($sanpham->avatar_product) }}" alt="" style="height: 550px ;">
            <div class='highlight-overlay' id='highlight-overlay'></div>
        </div>
        <div class='window'>
            <form action="{{ route('giohang_create', $sanpham) }}" method="post" name="form">
                @csrf
                <div class='main-content'>
                    <h2>{{ $sanpham->name }}</h2>
                    <div class='description' id='description'>
                        {{ $sanpham->mo_ta }}</div>
                    <div class='highlight-window  mobile' id='product-img'>
                        <div class='highlight-overlay' id='highlight-overlay-mobile'></div>
                    </div>
                    <div class='options'>
                        <div class='color-options'>
                            Kích thước
                            <div class='color-picker'>
                                <input type="button" class="btn" value="{{ $kichthuoc->name_kichthuoc }}">
                            </div>

                        </div>
                        <div class='color-options'>
                            Số lượng
                            <div class='color-picker'>
                                <input type="button" class="btn" name="so_luong" value="{{ $sanpham->so_luong }}">
                            </div>

                        </div>
                    </div>
                    <div>
                        <br>
                        <input type="number" name="so_luong" id="soluong" class="form-control"
                            placeholder="nhập số lượng">
                        <span id="error_soluong"></span>
                        @if (Session::has('thongbao'))
                            <span> {{ Session::get('thongbao') }}</span>
                        @endif
                    </div>
                    <div class='purchase-info'>
                        <p>
                            Giá:
                            {{ number_format($sanpham->don_gia, 0, ',', '.') }}đ <br>
                            Giá khuyến mại:
                            {{ number_format($sanpham->khuyen_mai, 0, ',', '.') }}đ
                        </p>
                        <button type="button" onclick="add()">Thêm vào giỏ hàng</button>


            </form>
        </div>

    </div>

    </div>
    </div>
    <hr>
    <div class="container">
        <h4>Bình luận</h4>
    </div>
    <div class="container ketqua" id="ketqua">
        @foreach ($binhluan as $item)
            <div class="media">
                <div class="media-body">
                    <h4 class="media-heading id_user">{{ $item->name_user }}</h4>
                    <p class="noidung1">{{ $item->noidung }}</p>
                    <div class="row" style="margin-left: 20px">
                        <div class="col-1.6" style="margin-right: 10px">
                            <div class="date"><i
                                    class="fa fa-calendar"style="margin-right: 5px"></i>{{ $item->created_at }}</div>
                        </div>
                        <div class="col-1.5 xoa">
                            @if (Auth::user())
                                @if ($item->id_user == Auth::user()->id && Auth::user() != null)
                                    <div class=""><a href="{{ route('binhluan_delete', $item->id) }}"
                                            onclick="return confirm('bạn có chắc chắn muốn xóa k')"
                                            style="color: #457">Xóa</a></div>
                                @else
                                    <div class=""><a href=""style="color: #457">like</a></div>
                                @endif
                            @else
                                <div class=""><a href=""style="color: #457">like</a></div>
                            @endif
                            <br>
                        </div>
                        
                    </div>
                </div>
            </div>
        @endforeach
        <hr>
        <br>
    </div>
    <div class="container">
        <form class="fff">
            <fieldset>
                <div class="form-group">
                    <input type="hidden" class="user" value="{{ isset($user) ? $user: '' }}">
                    <input type="hidden" class="product" value="{{ $sanpham->id }}">
                    <textarea class="form-control noidung" id="message" placeholder="Your message" name="noidung"></textarea>
                </div>
            </fieldset>
            <button type="reset" class="btn btn-normal button">Submit</button>
        </form>
    </div>
    <hr>
    <script>
        $(document).ready(function() {
            var user = $('.user').val();
            var product = $('.product').val();
            var id = $('.abc').val();
            var token = $("meta[name='csrf-token']").attr("content");
            var a = true
            $('.button').click(function(e) {
                e.preventDefault();
                var text = $('.noidung').val();
                if (text == '') {
                    alert('dữ liệu không được để trống')
                    return a = false
                }
                if (text.length > 250) {
                    alert('không được bình luận quá 250 từ')
                    return a = false
                }
                if (user == false) {
                    alert('bạn cần đăng nhập để bình luận')
                    return a = false
                }
                $.ajax({
                    url: "{{ route('binhluon_create') }}",
                    type: 'post',
                    data: {
                        _token: token,
                        noidung: text,
                        id_user: user,
                        product: product
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('.ketqua').html(data);
                        console.log(data);
                        $('.fff')[0].reset();

                    },
                    error: function(data) {
                        console.log(data);
                    }

                })
            })
        })

        function add() {
            var sl = document.getElementById("soluong").value;
            var format = /^[!@#$%^&*()_+\=\[\]{};':"\\|,.<>\/? ]*$/;
            var a = true
            if (sl == '') {
                document.getElementById('error_soluong').innerHTML = 'số lượng không được để trống '
                document.getElementById('soluong').style.border = '1px solid red'
                return a = false
            } else {
                document.getElementById('error_soluong').innerHTML = ''
                document.getElementById('soluong').style.border = '1px solid green'
            }
            if (sl == 0) {
                document.getElementById('error_soluong').innerHTML = 'số lượng phải lớn hơn không '
                document.getElementById('soluong').style.border = '1px solid red'
                return a = false
            } else {
                document.getElementById('error_soluong').innerHTML = ''
                document.getElementById('soluong').style.border = '1px solid green'
            }
            if (sl.match(format)) {
                document.getElementById('error_soluong').innerHTML = 'Số lượng không được có ký tự đặc biệt'
                document.getElementById('soluong').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('error_soluong').innerHTML = ''
                document.getElementById('soluong').style.border = "1px solid Green"
                document.forms['form'].submit()
            }
        }
    </script>
@endsection
