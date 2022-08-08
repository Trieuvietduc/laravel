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
                        <th>Tên</th>

                        <th>Số điện thoại</th>
                        <th>địa chỉ</th>
                        <th>ghi chú</th>
                        <th>Tổng tiền</th>
                        <th>trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donhang as $item)
                        <tr>
                            <td>{{ $item->name }}</td>

                            <td>{{ $item->sdt }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->note }}</td>
                            <td>{{ $item->price_order }}</td>
                            <td>
                                <form action="{{ route('status_order', $item) }}" method="get">
                                    <select name="status">
                                        @foreach ($status as $value)
                                            <option value="{{ $value->id }}"
                                                {{ $value->id == $item->id_status ? 'selected' : '' }}>{{ $value->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button class="btn-btn-warning">update</button>
                                </form>

                            </td>
                            <td><a href="{{ route('detai_order_user', $item->id) }}">chi tiết đơn hàng</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </form>
        </div>
        <div style="margin-left: 1000px">
            {{ $donhang->links() }}
        </div>
    </div>
@endsection
