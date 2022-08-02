@extends('layout.layout-admin.layout-admin')
@section('title', 'Tài khoản')
@yield('name-trang', 'Thêm tài khoản')
@section('content')
    <style>
        .green {
            background: green;
        }
    </style>
<div class="container">
        @if (Session::has('thongbao'))
            <div class="alert alert-success thongbao">
                {{ Session::get('thongbao') }}
            </div>
        @endif
        <link rel="stylesheet" href="{{ asset('/dist/css/style.css') }}">

    </div>
</div>
@endsection
