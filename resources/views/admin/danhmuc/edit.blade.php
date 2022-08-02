@extends('layout.layout-admin.layout-admin')
@section('title', 'Sửa danh mục')
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
                    <h5 class="text-center mb-4">Sửa danh mục</h5>

                    <form class="form-card" action="{{ route('danhmuc_update', $danhmuc->id) }}" method="POST" name="form">
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tên
                                    Danh mục<span class="text-danger"> *</span></label> <input type="text" id="name"
                                    name="name" placeholder="Enter your first danh muc" value="{{ $danhmuc->name }}">
                                    <span id="error_danhmuc"></span>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6"> <button type="button" class="btn-block btn-primary" onclick="add()">Sửa Danh
                                    mục</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function add() {
            var format = /^[!@#$%^&*()_+\=\[\]{};':"\\|,.<>\/? ]*$/;
            var name = document.getElementById('name').value;
            if (name == '') {
                document.getElementById('error_danhmuc').innerHTML = 'Tên không được để trống';
                document.getElementById('name').style.border = "1px solid red ";
                return a = false
            } else {
                document.getElementById('error_danhmuc').innerHTML = '';
                document.getElementById('name').style.border = "1px solid green ";
            }
            if (name.match(format)) {
                document.getElementById('error_danhmuc').innerHTML = 'Tên không được có kí tự đặc biệt'
                document.getElementById('name').style.border = "1px solid red"
                return a = false
            } else {
                document.getElementById('error_danhmuc').innerHTML = ''
                document.getElementById('name').style.border = "1px solid Green"
                document.forms['form'].submit()
            }
        }
    </script>


@endsection
