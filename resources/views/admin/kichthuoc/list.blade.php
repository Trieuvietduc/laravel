@extends('layout.layout-admin.layout-admin')
@section('title', 'Tài khoản')
@yield('name-trang', 'Danh sách Kích thước')
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
        <div class="table-responsive">
            {{-- <span class="kq"></span> --}}
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Tên kích thước</th>
                        <th colspan="2"><a href="{{route('kichthuoc_create')}}"><button class="btn btn-primary">Thêm</button></a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kichthuoc as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td><a href="{{route('kichthuoc_edit',$item->id)}}"><i class="far fa-edit"></i></a>|
                                <a href="{{route('kichthuoc_delete',$item->id)}}" onclick="return confirm('bạn có chắc muốn xóa')">
                                    <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
