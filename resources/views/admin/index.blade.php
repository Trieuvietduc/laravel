@extends('layout.layout-admin.layout-admin-list')
@section('title', 'Dashboard')
@section('content')
    <link rel="stylesheet" href="{{ asset('/dist/css/style.css') }}">
    <style>
        .green {
            background: green;
        }
    </style>
    <div class="container">
        <h1 style="text-align: center">Đơn hàng</h1>
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
                <tbody class="all">
                    @foreach ($all as $item)
                        <tr>
                            <td>{{ $item->name }}</td>

                            <td>{{ $item->sdt }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->note }}</td>
                            <td>{{ $item->price_order }}</td>
                            <td>{{ $item->status->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/thongke.js') }}"></script>
@endsection
