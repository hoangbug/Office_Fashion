<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <?php
        if (isset($_SESSION['checkUserExist']) && $_SESSION['checkUserExist'] == 1) {
        ?>
            <div class='animate__animated animate__zoomInUp' style='animation-duration: 0.5s;color:red;font-weight:bold;box-shadow: 0px 1px 6px 0px #F5F5ED; border-radius: 10px; padding:20px;'>
                <p style='color:red; font-size:17px;'>Email hoặc số điện thoại đã được sử dụng! </p>
            </div>
        <?php
            unset($_SESSION['checkUserExist']);
        }
        ?>
        <div class="card mt-4">
            <div class="card-header text-center p-4 bg-primary">
                <h4 class="text-white mb-0 mt-0">Đăng ký</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" onsubmit="return ValidateFormRegister();">
                    <div class="form-group mb-3">
                        <label for="name">Họ tên : <span style="color: red;" id="errorName">(*)</span> </label>
                        <input class="form-control" required="" type="text" id="name" name="name" placeholder="Nguyễn Văn A">
                    </div>

                    <div class="form-group mb-3">
                        <label for="avatar">Ảnh đại diện :<span style="color: red;" id="errorAvatar">(*)</span></label>
                        <input class="form-control" type="file" accept = "image/*" required=""  onchange="viewImage(event)" id="avatar" name="avatar">
                        <img width="100" height="100%" style="box-shadow: 0px 1px 6px 0px grey; margin:10px;" id="output" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email :<span style="color: red;" id="errorEmail">(*)</span></label>
                        <input class="form-control" type="email" required=""  id="email" name="email"  placeholder="john@deo.com">
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Số điện thoại : <span style="color: red;" id="errorPhone">(*)</span></label>
                        <input class="form-control" type="number" required=""  id="phone" name="phone"  placeholder="Nhập số điện thoại ...">
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Địa chỉ :<span style="color: red;" id="errorAddress">(*)</span></label>
                        <input class="form-control" type="text" required=""  id="address" name="address" placeholder="Nhập địa chỉ ...">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Mật khẩu :<span style="color: red;" id="errorPass">(*)</span></label>
                        <input class="form-control" type="password" required=""  id="password" name="password" placeholder="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Repassword">Nhập lại mật khẩu :<span style="color: red;" id="errorRePass">(*)</span></label>
                        <input class="form-control" type="password" required=""  id="Repassword" name="Repassword" placeholder="">
                    </div>

                    <div class="form-group mb-4">
                        <span style="color: red;" id="errorTerms"></span><br>
                        <input id="Terms" name="Terms" value="1" required="" type="checkbox">
                        <label for="remember">
                            Đồng ý với <strong><a href="#"> điều khoản của chúng tôi</a></strong>
                        </label>
                    </div>

                    <div class="form-group text-right mt-4 mb-4">
                        <div class="col-12">
                            <button class="btn btn-md btn-primary waves-effect waves-light" name="registerAccount" type="submit">Đăng ký</button>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-sm-12 text-center">
                            <a href="index.php?page=account&method=login">Already have account?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>