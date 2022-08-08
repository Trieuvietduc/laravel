@extends('layout.layout-admin.layout-admin')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <style>
        body {
            background-image: linear-gradient(to right top, #D91B23, #124FEB);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .search {
            background-color: #fff;
            padding: 4px;
            border-radius: 5px;
        }

        .search-1 {
            position: relative;
            width: 100%
        }

        .search-1 input {
            height: 45px;
            border: none;
            width: 100%;
            padding-left: 34px;
            padding-right: 10px;
            border-right: 2px solid #eee
        }

        .search-1 input:focus {
            border-color: none;
            box-shadow: none;
            outline: none
        }

        .search-1 i {
            position: absolute;
            top: 12px;
            left: 5px;
            font-size: 24px;
            color: #eee
        }

        ::placeholder {
            color: #eee;
            opacity: 1
        }

        .search-2 {
            position: relative;
            width: 100%
        }

        .search-2 input {
            height: 45px;
            border: none;
            width: 100%;
            padding-left: 18px;
            padding-right: 100px
        }

        .search-2 input:focus {
            border-color: none;
            box-shadow: none;
            outline: none
        }

        .search-2 i {
            position: absolute;
            top: 12px;
            left: -10px;
            font-size: 24px;
            color: #eee
        }

        .search-2 button {
            position: absolute;
            right: 1px;
            top: 0px;
            border: none;
            height: 45px;
            background-color: red;
            color: #fff;
            width: 90px;
            border-radius: 4px
        }

        @media (max-width:800px) {
            .search-1 input {
                border-right: none;
                border-bottom: 1px solid #eee
            }

            .search-2 i {
                left: 4px
            }

            .search-2 input {
                padding-left: 34px
            }

            .search-2 button {
                height: 37px;
                top: 5px
            }
        }
    </style>
    <div class="container">
        @if (Session::has('thongbao'))
            <div class="alert alert-success">
                {{ Session::get('thongbao') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        {{-- search --}}
        <div class="search">
            <div>
                <div class="col">
                    <form action="{{ route('search') }}" method="get">
                        <div>
                            <div class="search-2"> <i class='bx bxs-map'></i> <input type="text" placeholder="...Tìm kiếm"
                                    name="search"> <button>Search</button> </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- Style -->
        <div class="table-responsive">
            <form action="{{ route('product_deleteall') }}" method="post">
                @csrf
                <button class="btn btn-primary button" onclick="return confirm('bạn có chắc muốn xóa')"><i
                        class="fas fa-trash"></i></button>
                <table class="table custom-table" style="text-align: center;">
                    <thead>
                        <tr>
                            <th scope="col">
                                <input type="checkbox" class="js-check-all" />
                            </th>
                            <th>Tên</th>
                            <th>Đơn Giá</th>
                            <th>Khuyến Mại</th>
                            <th>Trạng thái</th>
                            <th>Ảnh</th>
                            <th>Danh mục</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody class="ketqua" id="tvd">
                        @foreach ($product as $user)
                            <tr id="abc">
                                <td>
                                    <label class="control control--checkbox">
                                        <input type="checkbox" class="check" name="all[]" value="{{ $user->id }}" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->don_gia }}</td>
                                <td>{{ $user->khuyen_mai }}</td>
                                <td>{{ $user->so_luong==0 ? "Hết hàng": "Còn hàng" }}</td>
                                <td><img src="{{ asset($user->avatar_product) }}" alt="" width="150px"></td>
                                <td>
                                    {{ $user->danhmuc->name }}
                                </td>
                                <td><a href="{{ route('product_edit', $user->id) }}"><i class="far fa-edit"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </form>
        </div>
        <div style="margin-left: 1000px">
            {{ $product->links() }}
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.js-check-all').click(function() {
                $('input:checkbox').prop('checked', this.checked);
            });
        })
    </script>
@endsection
