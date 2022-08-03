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
    <script>
        function add(event, id) {
            event.preventDefault();
            var url = "";
            if (id == 1) {
                url = "http://127.0.0.1:8000/dashboard/thongke/order/complete/"
            }
            if (id == 2) {
                url = "http://127.0.0.1:8000/dashboard/thongke/order/complete/"
            }
            if (id == 3) {
                url = "http://127.0.0.1:8000/dashboard/thongke/order/complete/"
            }
            if (id == 4) {
                url = "http://127.0.0.1:8000/dashboard/thongke/order/complete/"
            }
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
                    var html = '';
                    for (var pro of data) {

                        html += '   <tr>',
                            html += '  <td>' + pro.name + '</td>',
                            html += '  <td>' + pro.sdt + '</td>',
                            html += '  <td>' + pro.address + '</td>',
                            html += '  <td>' + pro.note + '</td>',
                            html += '  <td>' + pro.price_order + '</td>',
                            html += '<td> ' + pro.status.name + '</td>',
                            html += ' </tr>'

                    }
                    $('.all').html(html);
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }
    </script>
@endsection
