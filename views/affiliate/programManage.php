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
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin: 50px auto;">
<div class="row">
    <div class="col-md-12">
    <h1>Các chương trình bạn đăng kí</h1>
    </div>
</div>
    <?php
    foreach ($selectProgramAffiliate as $value) {
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
                            <?php if($value['status'] == 0){ ?>
                                <button type="button" class="btn btn-info btn-lg" <?php echo "disabled";?>><?php echo "Đang phê duyệt" ?></button>
                            <?php }else{ ?>
                                <button type="button" class="viewsLink btn btn-info btn-lg" program_id="<?=$value['program_id'];?>" data-toggle="modal" data-target="#myModal1"><?php echo "Get link" ?></button>
                            <?php } ?>
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
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
     
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>