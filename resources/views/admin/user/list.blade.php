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
            {{-- <span class="kq"></span> --}}

            <table class="table custom-table">

                <thead>

                    <tr>
                        <th>Tên</th>
                        <th>email</th>
                        <th>Trạng thái</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody class="ketqua">
                    @foreach ($user_list as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->status == 1)
                                    <a href="{{ route('user_status', $user) }}"><button class="btn btn-primary"
                                            onclick="return confirm('bạn có chắc chắn muốn thay đổi không')">Đang hoạt
                                            dộng</button></a>
                                @else
                                    <a href="{{ route('user_status', $user) }}"><button class="btn btn-danger"
                                            onclick="return confirm('bạn có chắc chắn muốn thay đổi không')">Đã
                                            khóa</button></a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin_delete', $user->id) }}"
                                    onclick="return confirm('bạn có chắc muốn xóa')">
                                    <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </form>
        </div>
    </div>
@endsection
