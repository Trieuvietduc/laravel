@extends('layout.layout-admin.layout-admin')
@section('title', 'Thêm sản phẩm')
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
                    <h5 class="text-center mb-4">Thêm sản phẩm</h5>
                    <form class="form-card" action="{{ route('product_store') }}" method="POST" enctype="multipart/form-data"
                        name="form">
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tên
                                    sản phẩm<span class="text-danger"> *</span></label> <input type="text" id="name"
                                    name="name" placeholder="Enter your first name" value="{{ old('name') }}">
                                <span id="error_name"></span>
                                @if ($errors->has('name'))
                                    <span>{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Giá
                                    sản phẩm<span class="text-danger"> *</span></label> <input type="text" id="don_gia"
                                    name="don_gia" placeholder="Enter your last name" value="{{ old('don_gia') }}">
                                <span id="error_price"></span>
                                @if ($errors->has('don_gia'))
                                    <span>{{ $errors->first('don_gia') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Khuyễn mại<span class="text-danger">
                                    </span></label> <input type="text" id="khuyen_mai" name="khuyen_mai" placeholder=""
                                    value="{{ old('khuyen_mai') }}">
                                <span id="error_khuyenmai"></span>
                                @if ($errors->has('khuyen_mai'))
                                    <span>{{ $errors->first('khuyen_mai') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"><label class="form-control-label px-3">số
                                    lượng<span class="text-danger"> *</span></label>
                                <input type="number" id="so_luong" name="so_luong" placeholder=""
                                    value="{{ old('so_luong') }}">
                                <span id="error_soluong"></span>
                                @if ($errors->has('so_luong'))
                                    <span>{{ $errors->first('so_luong') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Danh
                                    mục<span class="text-danger">
                                        *</span></label>
                                <select name="id_danhmuc" id="danhmuc" class="form-select"
                                    aria-label="Default select example">
                                    <option value="0">chọn danh mục</option>
                                    @foreach ($danhmuc as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <span id="error_danhmuc"></span>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"><label class="form-control-label px-3">Kích
                                    thước<span class="text-danger"> *</span></label>
                                <select name="kich_thuoc" id="kichthuoc" class="form-select"
                                    aria-label="Default select example">
                                    <option value="0">chọn kích thước</option>
                                    @foreach ($kichthuoc as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <span id="error_kichthuoc"></span>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Ảnh
                                    sản phẩm<span class="text-danger"> *</span></label> <input type="file"
                                    id="avatar_product" name="avatar_product" placeholder=""
                                    value="{{ old('avatar_product') }}">
                                <span id="error_avatar"></span>
                                @if ($errors->has('avatar_product'))
                                    <span>{{ $errors->first('avatar_product') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Mô
                                    tả<span class="text-danger"> *</span></label> <input type="text" id="mo_ta"
                                    name="mo_ta" placeholder="" value="{{ old('mo_ta') }}">
                                <span id="error_mota"></span>
                                @if ($errors->has('mo_ta'))
                                    <span>{{ $errors->first('mo_ta') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6"> <button type="button" class="btn-block btn-primary"
                                    onclick="add()">Thêm sản Phẩm</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/create.js') }}"></script>


@endsection
