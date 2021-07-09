<div class="container-fluid">
    <div class="row" style="display: flex; justify-content: center; align-items: center; height: 180px; background-color: rgb(1, 127, 255);">
        <div class="col-md-4" style="display: flex; justify-content: flex-end;">
            <div class="clock">
                <div class="hour">
                    <div class="hr" id="hr"></div>
                </div>
                <div class="min">
                    <div class="mn" id="mn"></div>
                </div>
                <div class="sec">
                    <div class="sc" id="sc"></div>
                </div>
            </div>
        </div>  
        <div class="col-md-4"></div>
        <div class="col-md-4" style="display: flex; justify-content: flex-start; align-items: center;">
            <div class="dropdown-account">
                <button class="dropbtn-account"><i class="fa fa-user-o" aria-hidden="true"></i></button>
                <div class="dropaccount-content">
                    <a href="index.php?page=affiliate&method=programAffiliate">Home</a>
                    <a href="#">Thông tin tài khoản</a>
                    <a href="index.php?page=affiliate&method=programManage">Quản lý chương trình</a>
                    <a href="index.php?page=affiliate&method=turnOverAffiliate">Quản lý doanh thu</a>
                    <a href="index.php?page=affiliate&method=changeCode">Đổi mã</a>
                    <a href="index.php?page=affiliate&method=logoutAffiliate">Thoát tài khoản</a>
                </div>
                <div style="color: #fff;">16.000.000VND</div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin: 50px auto;">
    <div class="row">
        <div class="col-md-12" style="height: 400px; display: flex; align-items: center;">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <div class="item active">
                        <img src="assets/images/slide-img1.jpg" alt="Los Angeles" style="width:100%; height: 330px;">
                        <div class="carousel-caption">
                            <h3>Los Angeles</h3>
                            <p>LA is always so much fun!</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="assets/images/slide-img2.jpg" alt="Chicago" style="width:100%; height: 330px;">
                        <div class="carousel-caption">
                            <h3>Chicago</h3>
                            <p>Thank you, Chicago!</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="assets/images/slide-img1.jpg" alt="New York" style="width:100%; height: 330px;">
                        <div class="carousel-caption">
                            <h3>New York</h3>
                            <p>We love the Big Apple!</p>
                        </div>
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="background: none;">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next" style="background: none;">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <?php
    foreach ($selectAllProgram as $value) {
    ?>
        <div class="row" style="height: 400px;">
            <div class="col-md-12" style="height: 400px; float: inherit; display: flex; align-items: center;">
                <div class="card-affiliate" class="row">
                    <form action="" method="POST">
                        <div class="col-md-4 col-sm-4 col-xs-4 left-cotent-img">
                            <a href="#">
                                <img src="assets/images/affiliate/img-content/<?= $value['image'] ?>" class="img-card" alt="">
                            </a>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8 right-content-text" style="width: 65%; height: 330px;">
                            <div class="card-text-content" style="width: 60%; color: rgb(117, 117, 117);">
                                <input type="hidden" class="program_id" value="<?= $value['id']; ?>">
                                <input type="hidden" class="affiliate_id" value="<?php if(isset($_SESSION['affiliate_id']) && !empty($_SESSION['affiliate_id'])){echo $_SESSION['affiliate_id'];} ?>">
                                <h3 style="font-size: 3rem; color: rgb(33, 33, 33); height: 50px;">Hoa hồng <?= $value['rose_old']; ?>% - <?=$value['rose_new'];?>%</h3>
                                <h5 style="font-size: 1.75rem; letter-spacing: 1.5px; line-height: 1.25;"><?= $value['title']; ?></h5>
                                <span style="font-size: 1.5em;">Có hiệu lực từ <?= $value['created_at']; ?></span>
                            </div>
                            <button type="button" class="program btn btn-info btn-lg" sessionUser="<?php if(isset($_SESSION['affiliate_id']) && !empty($_SESSION['affiliate_id'])){echo $_SESSION['affiliate_id'];} ?>" program_id="<?= $value['id']; ?>">Đăng kí ngay</button>
                            <button type="button" program_id="<?= $value['id']; ?>" class="btn btn-danger btn-lg viewsProgram" data-toggle="modal" data-target="#myModal">Chi tiết</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>