@extends('layout.layout-admin.layout-admin')
@section('title', 'Thêm sản phẩm')
@section('content')
    <style>
        span {
            color: red;

        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">
                    <h5 class="text-center mb-4">Thêm sản phẩm</h5>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-card" action="{{ route('product_update', $product) }}" method="POST"
                        enctype="multipart/form-data" name="form">
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tên
                                    sản phẩm<span class="text-danger"> *</span></label> <input type="text" id="name"
                                    name="name" placeholder="Enter your first name" value="{{ $product->name }}">
                                <span id="error_name"></span>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Giá
                                    sản phẩm<span class="text-danger"> *</span></label> <input type="text" id="don_gia"
                                    name="don_gia" placeholder="Enter your last name" value="{{ $product->don_gia }}">
                                <span id="error_price"></span>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Khuyễn mại<span class="text-danger">
                                        *</span></label> <input type="text" id="khuyen_mai" name="khuyen_mai"
                                    placeholder="" value="{{ $product->khuyen_mai }}">
                                <span id="error_khuyenmai"></span>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"><label class="form-control-label px-3">số
                                    lượng<span class="text-danger"> *</span></label>
                                <input type="text" id="so_luong" name="so_luong" placeholder=""
                                    value="{{ $product->so_luong }}">
                                <span id="error_soluong"></span>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Danh
                                    mục<span class="text-danger">
                                        *</span></label>
                                <select name="id_danhmuc" id="danhmuc" class="form-select"
                                    aria-label="Default select example">
                                    @foreach ($danhmuc as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $product->id_danhmuc == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span id="error_danhmuc"></span>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"><label class="form-control-label px-3">Kích
                                    thước<span class="text-danger"> *</span></label>
                                <select name="kich_thuoc" id="kichthuoc" class="form-select"
                                    aria-label="Default select example">
                                    @foreach ($kichthuoc as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $product->kich_thuoc == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span id="error_kichthuoc"></span>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Ảnh
                                    sản phẩm<span class="text-danger"> *</span></label> <input type="file"
                                    id="avatar_product" name="avatar_product" placeholder="">
                                <img src="{{ asset($product->avatar_product) }}" alt="" width="100px">
                                <span id="error_avatar"></span>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Mô
                                    tả<span class="text-danger"> *</span></label> <input type="text" id="mo_ta"
                                    name="mo_ta" placeholder="" value="{{ $product->mo_ta }}">
                                <span id="error_mota"></span>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6">
                                 <button type="submit" class="btn-block btn-primary">Thêm sản Phẩm</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="{{ asset('js/create.js') }}"></script> --}}


@endsection
