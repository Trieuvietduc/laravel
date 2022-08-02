@extends('layout.layout-admin.layout-admin')
@section('title', 'Thêm sản phẩm')
@section('content')
    <style>
        span {
            color: red;
            margin-left: 10px
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">
                    <h5 class="text-center mb-4">Thêm sản phẩm</h5>
                    @if ($errors->any)
                        <ul class="text-danger">
                            @foreach ($errors->all() as $key)
                                {{ $key }}
                            @endforeach
                        </ul>
                    @endif
                    <form class="form-card" action="{{ route('admin_update',$account->id) }}" method="POST" name="form">
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Họ
                                    và tên<span class="text-danger"> *</span></label> <input type="text" id="name"
                                    name="name" placeholder="Enter your  name" value="{{ $account->name }}">
                                <span id="error_name"></span>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Email<span class="text-danger"> *</span></label> <input
                                    type="text" id="email" name="email" placeholder="Enter your Email"
                                    value="{{ $account->email }}">
                                <span id="error_email"></span>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">password<span class="text-danger">
                                    </span></label> <input type="password" id="password" name="password"
                                    placeholder="Enter your password" value="{{ $account->password }}">
                                <span id="error_password"></span>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"><label class="form-control-label px-3">giới
                                    tính<span class="text-danger"> *</span></label>
                                <select name="sex" id="sex" class="form-select"
                                    aria-label="Default select example">
                                    <option value="0">chọn giới tính</option>
                                    <option value="nam" {{ $account->sex == 'nam' ? 'selected' : '' }}>nam</option>
                                    <option value="nữ" {{ $account->sex == 'nữ' ? 'selected' : '' }}>nữ</option>
                                </select>
                                <span id="error_sex"></span>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"><label class="form-control-label px-3">Trạng thái <span class="text-danger"> *</span></label>
                                <select name="sex" id="sex" class="form-select"
                                    aria-label="Default select example">
                                    <option value="0">chọn giới tính</option>
                                    <option value="nam" {{ $account->status == '1' ? 'selected' : '' }}>đang hoạt động</option>
                                    <option value="nữ" {{ $account->status == '0' ? 'selected' : '' }}>đã khóa</option>
                                </select>
                                <span id="error_sex"></span>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6"> <button type="button" class="btn-block btn-primary"
                                    onclick="add()">Update Tài khoản</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                document.getElementById('error_name').innerHTML = 'Tên không được để trống'
                document.getElementById('name').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('error_name').innerHTML = ''
                document.getElementById('name').style.border = "1px solid Green"
                // return a = true
            }
            if (name.match(format)) {
                document.getElementById('error_name').innerHTML = 'Tên không được có kí tự đặc biệt'
                document.getElementById('name').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('error_name').innerHTML = ''
                document.getElementById('name').style.border = "1px solid Green"
            }
            if (name.length <= 7 && name.length <= 20) {
                document.getElementById('error_name').innerHTML = 'Tên từ 7 đến 20 kí tự'
                document.getElementById('name').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('error_name').innerHTML = ''
                document.getElementById('name').style.border = "1px solid Green"
            }
            // email
            if (email == '') {
                document.getElementById('error_email').innerHTML = 'Email không được để trống'
                document.getElementById('email').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('error_email').innerHTML = ''
                document.getElementById('email').style.border = "1px solid Green"
            }
            if (!check_mail.test(email)) {
                document.getElementById('error_email').innerHTML = 'Email phải có dạng là @gmail.com'
                document.getElementById('email').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('error_email').innerHTML = ''
                document.getElementById('email').style.border = "1px solid Green"
            }
            // pass
            if (password.value == '') {
                console.log(1);
                document.getElementById('error_password').innerHTML = 'pass không được để trống'
                document.getElementById('password').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('error_password').innerHTML = ''
                document.getElementById('password').style.border = "1px solid Green"
            }
            if (password.value.length < 7 && password.value.length < 10) {
                document.getElementById('error_password').innerHTML = 'pass từ 7 đến 10 kí tự '
                document.getElementById('password').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('error_password').innerHTML = ''
                document.getElementById('password').style.border = "1px solid Green"
            }
            if (password.value.match(format1)) {
                console.log(1);
                document.getElementById('error_password').innerHTML = 'pass không được có kí tự đặc biệt'
                document.getElementById('password').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('error_password').innerHTML = ''
                document.getElementById('password').style.border = "1px solid Green"
            }
            if (sex == 0) {
                document.getElementById('error_sex').innerHTML = 'Hãy chọn giới tính'
                document.getElementById('sex').style.border = "1px solid red"
                return a = false
            } else {
                document.forms['form'].submit()
            }
        }
    </script>

@endsection
