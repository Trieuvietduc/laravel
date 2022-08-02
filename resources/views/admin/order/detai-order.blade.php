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
        <input type="text" class="form-control share" placeholder="Tìm Kiếm....">
        <!-- Style -->
        <link rel="stylesheet" href="{{ asset('/dist/css/style.css') }}">
        <div class="table-responsive">
            <table class="table custom-table" style="text-align: center">
                <thead>
                    <tr>
                        <th>stt</th>
                        <th>Tên sản phẩm</th>
                        <th>số lượng sản phẩm</th>
                        <th>ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detai as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name_product }}</td>
                            <td>{{ $item->so_luong_product }}</td>
                            <td>{{ $item->created_at }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            </form>
        </div>
    </div>
@endsection
