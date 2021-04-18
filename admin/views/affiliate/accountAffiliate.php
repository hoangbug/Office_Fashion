<?php
if (isset($_SESSION['success'])) {
?>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="alert alert-success" role="alert" style="margin-top: 30px; font-size: 20px;">
                <?php echo $_SESSION['success']; ?>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
<?php
    unset($_SESSION['success']);
}
?>
<?php
if (isset($_SESSION['error'])) {
?>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="alert alert-danger" role="alert" style="margin-top: 30px; font-size: 20px;">
                <?php echo $_SESSION['error']; ?>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
<?php
    unset($_SESSION['error']);
}
?>

<div class="row">
    <div class="col-12">
        <div class="card" id="databaseTable" style="margin-top: 100px;">
            <div class="card-body table-responsive" id="contentDatabase">
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách tài khoản Affiliate</b></h4>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ảnh</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Mật khẩu</th>
                            <th>Trạng thái</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($selectAll as $value) {
                        ?>
                            <tr>
                                <td><?= $count++; ?></td>
                                <td><img src="../assets/images/affiliate/account/<?= $value['avatar'] ?>" alt="" width="100px"></td>
                                <td><?= $value['firstname'] ?> <?=$value['lastname'];?></td>
                                <td><?= $value['email'] ?></td>
                                <td><?= $value['phone'] ?></td>
                                <td><?= $value['password'] ?></td>
                                <td><?php if ($value['status'] == 0) {
                                        echo "<i class='ion ion-md-close-circle' style='color: red;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Dừng hoạt động";
                                    } else {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đang hoạt động";
                                    } ?></td>
                                <!-- <td style="line-height: 3;">Thời gian tạo: <?= $value['created_at']; ?><br> Cập nhật lúc: <?=$value['updated_at'];?></td> -->
                                <td><button type="button" class="btn btn-warning updateAccountAff" data-toggle="modal" data-target="#updateAccountAff" account_id="<?= $value['id']; ?>"><i class="ion ion-ios-brush" style="font-size: 23px;"></i></button></td>

                                <td><a href="index.php?page=affiliate&method=deleteAccount&id=<?= $value['id']; ?>&img=<?=$value['avatar']?>" onclick="return confirm('Bạn có thực sự muốn xóa tài khoản này không? ');" class="btn btn-danger"><i class="ion ion-md-close-circle-outline" style="font-size: 23px;"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-example-modal-center" id="updateAccountAff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhật tài khoản</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="body-update">

            </div>
        </div>
    </div>
</div>