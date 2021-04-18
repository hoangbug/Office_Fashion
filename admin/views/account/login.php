<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <?php
        if (isset($_SESSION['checkError']) && !empty($_SESSION['checkError'])) {
        ?>
            <div class='animate__animated animate__zoomInUp' style='animation-duration: 0.5s;color:red;font-weight:bold;box-shadow: 0px 1px 6px 0px #F5F5ED; border-radius: 10px; padding:20px;'>
                <p style='color:red; font-size:17px;'><?=$_SESSION['checkError'];?> </p>
            </div>
        <?php
            unset($_SESSION['checkError']);
        }
        ?>
        <div class="card mt-4">
            <div class="card-header p-4 bg-primary">
                <h4 class="text-white text-center mb-0 mt-0">Đăng nhập</h4>
            </div>
            <div class="card-body">
                <form action="" method="POST" class="p-2" onsubmit="return checkLoginUser();">
                    <div class="form-group mb-3">
                        <label for="emailOrPhone">Email hoặc Số điện thoại :<span style="color: red;" id="errorEmail">(*)</span></label>
                        <input class="form-control" type="text" value="<?php if(isset($_COOKIE['accountUser']) && !empty($_COOKIE['accountUser']) && isset($_COOKIE['remember']) && $_COOKIE['remember'] == 1 ){echo $_COOKIE['accountUser'];} ?>" name="emailOrPhone" id="emailOrPhone" >
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Mật khẩu :<span style="color: red;" id="errorPass">(*)</span></label>
                        <input class="form-control" type="password" value="<?php if(isset($_COOKIE['passwordUser']) && !empty($_COOKIE['passwordUser']) && isset($_COOKIE['remember']) && $_COOKIE['remember'] == 1){echo $_COOKIE['passwordUser'];} ?>" name="password" id="password" >
                    </div>
                    <div class="form-group mb-4">
                        <div class="checkbox checkbox-success">
                            <input id="remember" type="checkbox" name="remember" <?php if(isset($_COOKIE['remember']) && $_COOKIE['remember'] == 1){ echo "checked"; } ?> value="1">
                            <label for="remember">
                                Lưu mật khẩu
                            </label>
                            <a href="#" class="text-muted float-right">Quên mật khẩu?</a>
                        </div>
                    </div>
                    <div class="form-group row text-center mt-4 mb-4">
                        <div class="col-12">
                            <button class="btn btn-md btn-block btn-primary waves-effect waves-light" name="loginUser" type="submit">Đăng nhập</button>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted mb-0">Bạn có muốn đăng ký quản trị không? <a href="index.php?page=account&method=register" class="text-dark m-l-5"><b>Đăng ký</b></a></p>
                        </div>
                    </div>
                </form>

            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->

        <!-- end row -->

    </div>
    <!-- end col -->
</div>