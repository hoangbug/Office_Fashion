// xem trước ảnh trước khi hiển thị
var viewImage = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
};

//validation form register admin
function ValidateFormRegister(){
    
    var name = document.getElementById('name').value ;
    var errorName = document.getElementById('errorName');
    var regexName = /^[^\d+]*[\d+]{0}[^\d+]*$/;

    var address = document.getElementById('address').value;
    var errorAddress = document.getElementById('errorAddress');
    var regexAddress = /^[^\d+]*[\d+]{0}[^\d+]*$/;

    var phone = document.getElementById('phone').value;
    var errorPhone = document.getElementById('errorPhone');
    var regexPhone = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4}$/im;

    var email = document.getElementById('email').value;
    var errorEmail = document.getElementById('errorEmail');
    var regexEmail = /[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/igm;

    var avatar = document.getElementById('avatar').value;
    var errorAvatar = document.getElementById('errorAvatar');
    var regexAvatar = /\.(gif|jpe?g|tiff?|png|webp|bmp|ipg)$/i;

    var password = document.getElementById('password').value;
    
    var regexPassword = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

    var Repassword = document.getElementById('Repassword').value;
    var errorRePass = document.getElementById('errorRePass');

    function checkTerms(){
        var Terms = document.getElementById('Terms');
        if(Terms.checked == true){
            return 1;
        }else{
            return 0;
        }
    }
    
    function nameAvatar(avatar)
    {
    temp = avatar.split('\\');
    avatar = temp[temp.length-1];
    return avatar;
    }

    if(name == '' || name == null){
        errorName.innerHTML ="(Không được để trống họ tên)"; 
    }else if(!regexName.test(name)){
        errorName.innerHTML ="(Họ tên không hợp lệ)";
    }else{
        errorName.innerHTML = "";
        var checkName = 1;
    }

    if(address == '' || address == null){
        errorAddress.innerHTML ="(Không được để trống địa chỉ)"; 
    }else if(!regexAddress.test(address)){
        errorAddress.innerHTML ="(Địa chỉ không hợp lệ)";
    }else{
        errorAddress.innerHTML = "";
        var checkAddress = 1;
    }

    if(phone == '' || phone == null){
        errorPhone.innerHTML ="(Không được để trống số điện thoại)"; 
    }else if(!regexPhone.test(phone)){
        errorPhone.innerHTML ="(Số điện thoại không hợp lệ)";
    }else{
        errorPhone.innerHTML = "";
        var checkPhone = 1;
    }

    if(email == '' || email == null){
        errorEmail.innerHTML ="(Không được để trống email)"; 
    }else if(!regexEmail.test(email)){
        errorEmail.innerHTML ="(Email không hợp lệ)";
    }else{
        errorEmail.innerHTML = "";
        var checkEmail = 1;
    }

    if(avatar == '' || avatar == null){
        errorAvatar.innerHTML ="(Không được để trống ảnh)"; 
    }else if(!regexAvatar.test(nameAvatar(avatar))){
        errorAvatar.innerHTML ="(Ảnh không hợp lệ)";
    }else{
        errorAvatar.innerHTML = "";
        var checkAvatar = 1;
    }

    if(password == '' || password == null){
        errorPass.innerHTML ="(Không được để trống mật khẩu)"; 
    }else if(!regexPassword.test(password)){
        errorPass.innerHTML ="(gồm chữ thường, chữ hoa, số, ký tự đặc biệt)";
    }else{
        errorPass.innerHTML = "";
        var checkPass = 1;
    }

    if(Repassword == '' || Repassword == null){
        errorRePass.innerHTML ="(Không được để trống mật khẩu)"; 
    }else if(password != Repassword){
        errorRePass.innerHTML ="(Xác nhận mật khẩu không trùng khớp)";
    }else{
        errorRePass.innerHTML = "";
        var checkRePass = 1 ;
    }

    if(checkTerms() == 0 || checkTerms() == null){
        errorTerms.innerHTML ="(Bạn cần chấp nhận điều khoản)"; 
    }else if(checkTerms() == 1){
        errorTerms.innerHTML = "";
        var checkTermss = 1;
    }

    if(checkName && checkAddress && checkPhone && checkEmail && checkAvatar && checkPass && checkRePass && checkTermss){
        return true;
    }else{
        return false;
    }
}


// check loginUser
function checkLoginUser()
{
    var emailOrPhone = document.getElementById('emailOrPhone').value ;
    var errorEmail = document.getElementById('errorEmail');
    var password = document.getElementById('password').value ;
    var errorPass = document.getElementById('errorPass');

    if(password == '' || password == null){
        errorPass.innerHTML ="(Không được để trống mật khẩu)"; 
    }else{
        errorPass.innerHTML = "";
        var checkPass = 1;
    }

    if(emailOrPhone == '' || emailOrPhone == null){
        errorEmail.innerHTML ="(Không được để trống tài khoản)"; 
    }else{
        errorEmail.innerHTML = "";
        var checkUser = 1;
    }
    if( checkPass && checkUser) {
        return true;
    }
    return false;
}
