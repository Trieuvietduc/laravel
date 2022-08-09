
function add() {
    var name = document.getElementById('name').value
    var email = document.getElementById('email').value
    var password = document.getElementById('password')
    var sex = document.getElementById('sex').value
    var format = /^[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9 ]*$/;
    var format1 = /^[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*$/;
    var check_mail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var a = true
    // name
    if (name == '') {
        document.getElementById('kq').innerHTML = 'Tên không được để trống'
        document.getElementById('name').style.border = "1px solid red"
        return a = false
    } else {
        document.getElementById('kq').innerHTML = ''
        document.getElementById('name').style.border = "1px solid Green"
        // return a = true
    }
    if (name.match(format)) {
        document.getElementById('kq').innerHTML = 'Tên không được có kí tự đặc biệt'
        document.getElementById('name').style.border = "1px solid red"
        return a = false
    } else {
        document.getElementById('kq').innerHTML = ''
        document.getElementById('name').style.border = "1px solid Green"
    }
    if (name.length <= 7 && name.length <= 20) {
        document.getElementById('kq').innerHTML = 'Tên từ 7 đến 20 kí tự'
        document.getElementById('name').style.border = "1px solid red"
        return a = false
    } else {
        document.getElementById('kq').innerHTML = ''
        document.getElementById('name').style.border = "1px solid Green"
    }
    // email
    if (email == '') {
        document.getElementById('kq_email').innerHTML = 'Email không được để trống'
        document.getElementById('email').style.border = "1px solid red"
        return a = false
    } else {
        document.getElementById('kq_email').innerHTML = ''
        document.getElementById('email').style.border = "1px solid Green"
    }
    if (!check_mail.test(email)) {
        document.getElementById('kq_email').innerHTML = 'Email phải có dạng là @gmail.com'
        document.getElementById('email').style.border = "1px solid red"
        return a = false
    } else {
        document.getElementById('kq_email').innerHTML = ''
        document.getElementById('email').style.border = "1px solid Green"
    }
    // pass
    if (password.value == '') {
        console.log(1);
        document.getElementById('kq_pass').innerHTML = 'pass không được để trống'
        document.getElementById('password').style.border = "1px solid red"
        return a = false
    } else {
        document.getElementById('kq_pass').innerHTML = ''
        document.getElementById('password').style.border = "1px solid Green"
    }
    if (password.value.length < 7 && password.value.length < 10) {
        document.getElementById('kq_pass').innerHTML = 'pass từ 7 đến 10 kí tự '
        document.getElementById('password').style.border = "1px solid red"
        return a = false
    } else {
        document.getElementById('kq_pass').innerHTML = ''
        document.getElementById('password').style.border = "1px solid Green"
    }
    if (password.value.match(format1)) {
        console.log(1);
        document.getElementById('kq_pass').innerHTML = 'pass không được có kí tự đặc biệt'
        document.getElementById('password').style.border = "1px solid red"
        return a = false
    } else {
        document.getElementById('kq_pass').innerHTML = ''
        document.getElementById('password').style.border = "1px solid Green"
    }
    if (sex == 0) {
        document.getElementById('kq_sex').innerHTML = 'Hãy chọn giới tính'
        document.getElementById('sex').style.border = "1px solid red"
        return a = false
    } else {
        document.forms['form'].submit()
    }
}