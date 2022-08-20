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

<body class="img js-fullheight" style="background-image: url(https://file.vfo.vn/hinh/2015/12/hinh-nen-noi-that-dep-nhat-cho-may-tinh-27.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Nhập email của bạn</h3>
                        @if (Session::has('error'))
                            <div class="alert alert-danger thongbao">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <form action="{{route('check_pasword_reset')}}" class="signin-form" method="post" name="form">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control email" id="email" name="email"
                                    placeholder="email">
                                <span id="kq_email"></span>
                            </div>
                            <div class="form-group">
                                <button type="button" class="form-control btn btn-primary submit px-3"
                                    onclick="add()">Gửi</button>
                            </div>
                        </form>
                        <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                        <div class="social d-flex">
                            <a href="#" class="px-2 py-2 mr-md-1 rounded"><span
                                    class="ion-logo-facebook mr-2"></span> Facebook</a>
                            <a href="#" class="px-2 py-2 ml-md-1 rounded"><span
                                    class="ion-logo-twitter mr-2"></span> Twitter</a>
                            <a href="{{ route('register') }}" class="px-2 py-2 ml-md-1 rounded"><span
                                    class="ion-logo-twitter mr-2">Đăng ký</span></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function add() {
            var email = document.getElementById('email');
            var check_mail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var a = true
            // email
            if (email.value == '') {
                document.getElementById('kq_email').innerHTML = 'Email không được để trống'
                document.getElementById('email').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('kq_email').innerHTML = ''
                document.getElementById('email').style.border = "1px solid Green"
            }
            if (!check_mail.test(email.value)) {
                document.getElementById('kq_email').innerHTML = 'Email phải có dạng là @gmail.com'
                document.getElementById('email').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('kq_email').innerHTML = ''
                document.getElementById('email').style.border = "1px solid Green"
                document.forms['form'].submit();
            }
            
        }
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
