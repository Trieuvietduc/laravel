
function add() {
    var email = document.getElementById('email');
    var password = document.getElementById('password');
    var format = /^[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9 ]*$/;
    var format1 = /^[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*$/;
    var check_mail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var a = true
    // email
    if (email.value == '') {
        document.getElementById('kq_email').innerHTML = 'Email không được để trống'
        document.getElementById('email').style.border = "1px solid red"
        return a = false
    } else {
        document.getElementById('kq_email').innerHTML = ''
        document.getElementById('email').style.border = "1px solid Green"
    }
    if (!check_mail.test(email.value)) {
        document.getElementById('kq_email').innerHTML = 'Email phải có dạng là @gmail.com'
        document.getElementById('email').style.border = "1px solid red"
        return a = false
    } else {
        document.getElementById('kq_email').innerHTML = ''
        document.getElementById('email').style.border = "1px solid Green"
    }
    // pass
    if (password.value == '') {

        document.getElementById('kq_pass').innerHTML = 'pass không được để trống'
        document.getElementById('password').style.border = "1px solid red"
        return a = false
    } else {
        document.getElementById('kq_pass').innerHTML = ''
        document.getElementById('password').style.border = "1px solid Green"
    }
    if (password.value.length < 7 && password.value.length < 10) {
        console.log(1);
        document.getElementById('kq_pass').innerHTML = 'pass từ 7 đến 10 kí tự '
        document.getElementById('password').style.border = "1px solid red"
        return a = false
    } else {
        document.getElementById('kq_pass').innerHTML = ''
        document.getElementById('password').style.border = "1px solid Green"
    }
    if (password.value.match(format1)) {
        document.getElementById('kq_pass').innerHTML = 'pass không được có kí tự đặc biệt'
        document.getElementById('password').style.border = "1px solid red"
        return a = false
    } else {
        document.getElementById('kq_pass').innerHTML = ''
        document.getElementById('password').style.border = "1px solid Green"
        document.forms['form'].submit();
    }
}