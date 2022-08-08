function add() {
    var name = document.getElementById('name');
    var price = document.getElementById('don_gia');
    var soluong = document.getElementById('so_luong');
    var danhmuc = document.getElementById('danhmuc');
    var kichthuoc = document.getElementById('kichthuoc');
    var anh = document.getElementById('avatar_product');
    var mota = document.getElementById('mo_ta');
    var format = /^[!@#$%^&*()_+\=\[\]{};':"\\|,.<>\/? ]*$/;
    var a = true
    if (name.value == '') {
        document.getElementById('error_name').innerHTML = 'Tên không được để trống';
        document.getElementById('name').style.border = "1px solid red ";
        return a = false
    } else {
        document.getElementById('error_name').innerHTML = '';
        document.getElementById('name').style.border = "1px solid green ";
    }
    if (name.value.match(format)) {
        document.getElementById('error_name').innerHTML = 'Tên không được có kí tự đặc biệt'
        document.getElementById('name').style.border = "1px solid red"
        return a = false
    } else {
        document.getElementById('error_name').innerHTML = ''
        document.getElementById('name').style.border = "1px solid Green"
    }
    if (price.value == '') {

        document.getElementById('error_price').innerHTML = 'giá không được để trống';
        document.getElementById('don_gia').style.border = "1px solid red ";
        return a = false
    } else {
        document.getElementById('error_price').innerHTML = '';
        document.getElementById('don_gia').style.border = "1px solid green ";
    }
    if (price.value == 0) {
        document.getElementById('error_price').innerHTML = 'giá tiền phải lớn hơn 0';
        document.getElementById('don_gia').style.border = "1px solid red ";
        return a = false
    } else {
        document.getElementById('error_price').innerHTML = '';
        document.getElementById('don_gia').style.border = "1px solid green";
    }
    if (soluong.value == '') {
        document.getElementById('error_soluong').innerHTML = 'Số lượng không được để trống';
        document.getElementById('don_gia').style.border = "1px solid red ";
        return a = false
    } else {
        document.getElementById('error_soluong').innerHTML = '';
        document.getElementById('don_gia').style.border = "1px solid green";
    }
    if (danhmuc.value == 0) {
        document.getElementById('error_danhmuc').innerHTML = 'hãy chọn danh mục cho sản phẩm';
        document.getElementById('danhmuc').style.border = "1px solid red";
        return a = false
    } else {
        document.getElementById('error_danhmuc').innerHTML = '';
        document.getElementById('danhmuc').style.border = "1px solid green ";
    }
    if (kichthuoc.value == 0) {
        document.getElementById('error_kichthuoc').innerHTML = 'hãy chọn kích thước cho sản phẩm';
        document.getElementById('kichthuoc').style.border = "1px solid red ";
        return a = false
    } else {
        document.getElementById('error_kichthuoc').innerHTML = '';
        document.getElementById('kichthuoc').style.border = "1px solid green ";
    }
    if (anh.value == '') {
        document.getElementById('error_avatar').innerHTML = 'ảnh không được để trống';
        document.getElementById('avatar_product').style.border = "1px solid red ";
        return a = false
    } else {
        document.getElementById('error_avatar').innerHTML = '';
        document.getElementById('avatar_product').style.border = "1px solid green ";
    }
    if (mota.value == '') {
        document.getElementById('error_mota').innerHTML = 'mô tả không được để trống';
        document.getElementById('mo_ta').style.border = "1px solid red ";
        return a = false
    } else {
        document.getElementById('error_mota').innerHTML = '';
        document.getElementById('mo_ta').style.border = "1px solid green ";
    }
    if (mota.length < 100) {
        document.getElementById('error_mota').innerHTML = 'mô tả phải từ 100 đến 255 ký tự';
        document.getElementById('mo_ta').style.border = "1px solid red ";
        return a = false
    } else {
        document.getElementById('error_mota').innerHTML = '';
        document.getElementById('mo_ta').style.border = "1px solid green ";
    }

    if (mota.length > 255) {
        document.getElementById('error_mota').innerHTML = 'mô tả phải từ 100 đến 255 ký tự';
        document.getElementById('mo_ta').style.border = "1px solid red ";
        return a = false
    } else {
        document.getElementById('error_mota').innerHTML = '';
        document.getElementById('mo_ta').style.border = "1px solid green ";
        document.forms['form'].submit()
    }

}