<!doctype html>
<html lang="en">

<head>
    <title>Đăng ký</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        span {
            color: red
        }
        .error{
            text-align: center
        }
    </style>

</head>

<body class="img js-fullheight" style="background-image: url(https://file.vfo.vn/hinh/2015/12/hinh-nen-noi-that-dep-nhat-cho-may-tinh-27.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Đăng ký</h3>
                        <div class="error">
                            @if (Session::has('thongbao'))
                            <div class="alert alert-success thongbao">
                                {{ Session::get('thongbao') }}
                            </div>
                        @endif
                        </div>
                        
                        <form action="{{ route('check_register') }}" class="signin-form" method="post" name="form">
                            @csrf
                            <input type="hidden" name="register" id="" value="1">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="name" value="{{old('name')}}">
                                <span id="kq" style="margin-left: 10px"></span>
                                <span>{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="email" value="{{old('email')}}">
                                <span id="kq_email" style="margin-left: 10px"></span>
                                <span>{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Password" value="{{old('password')}}">
                                <span id="kq_pass" style="margin-left: 10px"></span>
                                <span>{{ $errors->first('password') }}</span>
                            </div>
                            <div class="form-group">
                                <select name="sex" id="sex" placeholder="Giới tính" class="form-control">
                                    <option value="0" selected>chọn giới tính</option>
                                    <option value="nam">nam</option>
                                    <option value="nữ">nữ</option>
                                </select>
                                <span id="kq_sex" style="margin-left: 10px"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3"
                                    onclick="add()">Register</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">lưu mật khẩu
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="login" style="color: #fff">Bạn đã có tài khoản</a>
                                </div>
                            </div>
                        </form>
                        <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                        <div class="social d-flex text-center">
                            <a href="#" class="px-2 py-2 mr-md-1 rounded"><span
                                    class="ion-logo-facebook mr-2"></span> Facebook</a>
                            <a href="#" class="px-2 py-2 ml-md-1 rounded"><span
                                    class="ion-logo-twitter mr-2"></span> Twitter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/register.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
