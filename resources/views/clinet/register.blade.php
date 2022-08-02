<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        span {
            color: red
        }
    </style>

</head>

<body class="img js-fullheight" style="background-image: url(https://noithatnamgia.com/uploads/bnc.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Đăng ký</h3>
                        @if (Session::has('thongbao'))
                            <div class="alert alert-success thongbao">
                                {{ Session::get('thongbao') }}
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('check_register') }}" class="signin-form" method="post" name="form">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="name">
                                <span id="kq" style="margin-left: 10px"></span>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="email">
                                <span id="kq_email" style="margin-left: 10px"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Password">
                                <span id="kq_pass" style="margin-left: 10px"></span>
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
                                <button type="button" class="form-control btn btn-primary submit px-3"
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
    <script>
        function add() {
            var name = document.getElementById('name').value
            var email = document.getElementById('email').value
            var password = document.getElementById('password')
            var sex = document.getElementById('sex').value
            var format = /^[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9 ]*$/;
            var format1 = /^[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*$/;
            var check_mail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var a = true
            // name
            if (name == '') {
                document.getElementById('kq').innerHTML = 'Tên không được để trống'
                document.getElementById('name').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('kq').innerHTML = ''
                document.getElementById('name').style.border = "1px solid Green"
                // return a = true
            }
            if (name.match(format)) {
                document.getElementById('kq').innerHTML = 'Tên không được có kí tự đặc biệt'
                document.getElementById('name').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('kq').innerHTML = ''
                document.getElementById('name').style.border = "1px solid Green"
            }
            if (name.length <= 7 && name.length <= 20) {
                document.getElementById('kq').innerHTML = 'Tên từ 7 đến 20 kí tự'
                document.getElementById('name').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('kq').innerHTML = ''
                document.getElementById('name').style.border = "1px solid Green"
            }
            // email
            if (email == '') {
                document.getElementById('kq_email').innerHTML = 'Email không được để trống'
                document.getElementById('email').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('kq_email').innerHTML = ''
                document.getElementById('email').style.border = "1px solid Green"
            }
            if (!check_mail.test(email)) {
                document.getElementById('kq_email').innerHTML = 'Email phải có dạng là @gmail.com'
                document.getElementById('email').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('kq_email').innerHTML = ''
                document.getElementById('email').style.border = "1px solid Green"
            }
            // pass
            if (password.value == '') {
                console.log(1);
                document.getElementById('kq_pass').innerHTML = 'pass không được để trống'
                document.getElementById('password').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('kq_pass').innerHTML = ''
                document.getElementById('password').style.border = "1px solid Green"
            }
            if (password.value.length < 7 && password.value.length < 10) {
                document.getElementById('kq_pass').innerHTML = 'pass từ 7 đến 10 kí tự '
                document.getElementById('password').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('kq_pass').innerHTML = ''
                document.getElementById('password').style.border = "1px solid Green"
            }
            if (password.value.match(format1)) {
                console.log(1);
                document.getElementById('kq_pass').innerHTML = 'pass không được có kí tự đặc biệt'
                document.getElementById('password').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('kq_pass').innerHTML = ''
                document.getElementById('password').style.border = "1px solid Green"
            }
            if (sex == 0) {
                document.getElementById('kq_sex').innerHTML = 'Hãy chọn giới tính'
                document.getElementById('sex').style.border = "1px solid red"
                return a = false
            } else {
                document.forms['form'].submit()
            }
        }
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
