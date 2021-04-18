<?php
// echo $_SESSION['email'];
// if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
//     header('Location: index.php?page=affiliate&method=programAffiliate');
// }
?>
<div class="image-container set-full-height" style="background-image: url('assets/images/img/car-5383371_1920.jpg')">
    <!--   Creative Tim Branding   -->
    <a href="https://www.facebook.com/hoangbug20/">
        <div class="logo-container">
            <div class="logo" style="padding: 0;">
                <img src="assets/images/img/new_logo.png">
            </div>
            <div class="brand">
                Hoang Bug
            </div>
        </div>
    </a>

    <!--  Made With Material Kit  -->
    <a href="https://www.facebook.com/hoangbug20/" class="made-with-mk">
        <div class="brand">HB</div>
        <div class="made-with">Made with <strong>Hoang Bug</strong></div>
    </a>

    <!--   Big container   -->
    <div class="container" style="padding-top: 100px;">
        <div class="row">
            <div class="col-sm-12">
            <?php if(isset($_SESSION['successAffiliate'])){ ?>
                <div class="alert alert-warning alert-dismissible fade in" style="background-color: #ffc107; font-size: 20px; color: #000; min-height: 70px; line-height: 2; border: none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="font-size: 42px;">&times;</a>
                    <strong>Success!</strong> <?php echo $_SESSION['successAffiliate']; unset($_SESSION['successAffiliate']); ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="green" id="wizardProfile">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="wizard-header" style="padding-bottom: 0;">
                                <h3 class="wizard-title">
                                    Đăng nhập Shop Affiliate
                                </h3>
                            </div>
                            <div class="wizard-navigation" style="display: none;">
                                <ul style="width: 100%;">
                                    <li><a href="#address" data-toggle="tab">Bước 1</a></li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="address">
                                    <div class="row">
                                        <div class="col-sm-12" style="background: #eee; padding-top: 22px; text-align: center;">
                                            <h4 class="info-text"> Chào mừng bạn đến với Affiliate </h4>
                                            <span class="error"><?php if(isset($_SESSION['error1'])){echo $_SESSION['error1'];} unset($_SESSION['error1']); ?></span>
                                        </div>
                                        <div class="col-sm-8 col-sm-offset-2" style="padding: 15px;">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email</label>
                                                    <input name="email" type="text" class="form-control" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>" style="font-size: 20px;">
                                                    <span class="error"><?php if(isset($_SESSION['errorM'])){echo $_SESSION['errorM'];} unset($_SESSION['errorM']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">vpn_key</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Mật khẩu</label>
                                                    <input name="password" type="password" class="form-control" value="<?php if(isset($_SESSION['pass'])){echo $_SESSION['pass'];} unset($_SESSION['pass']); ?>" style="font-size: 20px;">
                                                    <span class="error"><?php if(isset($_SESSION['errorP'])){echo $_SESSION['errorP'];} unset($_SESSION['errorP']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <input type="submit" class='btn btn-finish btn-fill btn-success btn-wd' name="login" value="Đăng nhập" />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div><!-- end row -->
    </div> <!--  big container -->


    <div class="footer">
        <div class="container text-center">
            Made with <i class="fa fa-heart heart"></i> by <a href="https://www.facebook.com/hoangbug20/">Hoang Bug</a>
        </div>
    </div>
</div>