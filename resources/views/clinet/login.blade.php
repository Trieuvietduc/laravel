<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        span {
            margin-left: 20px;
            color: red;
        }
    </style>
</head>

<body class="img js-fullheight" style="background-image: url(https://file.vfo.vn/hinh/2015/12/hinh-nen-noi-that-dep-nhat-cho-may-tinh-27.jpg)">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Đăng Nhập</h3>
                        @if (Session::has('thongbao'))
                            <div class="alert alert-success thongbao">
                                {{ Session::get('thongbao') }}
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger thongbao">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <form action="{{ route('checklogin') }}" class="signin-form" method="post" name="form">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control email" id="email" name="email"
                                    placeholder="email" value="{{old('email')}}">
                                <span id="kq_email"></span>
                                <span>{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" name="password" class="form-control password"
                                    placeholder="Password" value="{{old('password')}}">
                                <span id="kq_pass"></span>
                                <span>{{ $errors->first('password') }}</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3"
                                    onclick="add()">Sign In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Nhớ tôi
                                        <input type="checkbox" name="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="{{route('check_pasword')}}" style="color: #fff">Quên mật khẩu</a>
                                </div>
                            </div>
                        </form>
                        <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                        <div class="social d-flex">
                            <a href="#" class="px-2 py-2 mr-md-1 rounded"><span
                                    class="ion-logo-facebook mr-2"></span> Facebook</a>
                            <a href="{{route('getlogin')}}" class="px-2 py-2 ml-md-1 rounded"><span
                                    class="ion-logo-twitter mr-2"></span> Google</a>
                            <a href="{{ route('register') }}" class="px-2 py-2 ml-md-1 rounded"><span
                                    class="ion-logo-twitter mr-2">Đăng ký</span></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/login.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
