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
<div class="row" style="margin: 30px 0;">
    <div class="col-12">
        <!-- <a href="index.php?page=category&method=addCategory" class="btn btn-info">Thêm danh mục mới</a> -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Thêm mới tỉ lệ hoa hồng
        </button>
    </div>
</div>


<!-- Modal insert category -->

<div class="modal fade fade bs-example-modal-center" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới tỉ lệ hoa hồng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name-title">Danh mục</label>
                            <select name="cate_pro_id" id="" class="form-control">
                            <?php
                            foreach($selectAllCate as $value){
                            ?>
                                <option value="<?=$value['id']?>"><?=$value['name_cate'];?></option>
                                <?php
                            }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="rose">Khách hàng cũ</label>
                            <input type="text" class="form-control" id="rose_old" name="rose_old" placeholder="Phần trăm hoa hồng từ 1% đến tối đa 15%">
                        </div>
                        <div class="form-group">
                            <label for="rose">Khách hàng mới</label>
                            <input type="text" class="form-control" id="rose_new" name="rose_new" placeholder="Phần trăm hoa hồng từ 1% đến tối đa 15%">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="index.php?page=affiliate&method=viewAffiliate" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                    <button type="submit" name="insertRoseAffiliate" class="btn btn-primary">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card" id="databaseTable">
            <div class="card-body table-responsive" id="contentDatabase">
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách chương trình</b></h4>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Danh mục</th>
                            <th>Khách hàng cũ</th>
                            <th>Khách hàng mới</th>
                            <th>Trạng thái</th>
                            <th>Thời gian</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($selectAllRose as $value) {
                        ?>
                            <tr>
                                <td><?= $count++; ?></td>
                                <td><?= $value['name_cate'] ?></td>
                                <td><?= $value['rose_old'] ?> %</td>
                                <td><?= $value['rose_new'] ?> %</td>
                                <td><?php if ($value['status'] == 0) {
                                        echo "<i class='ion ion-md-close-circle' style='color: red;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Dừng hoạt động";
                                    } else {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đang hoạt động";
                                    } ?></td>
                                <td style="line-height: 3;">Thời gian tạo: <?= $value['created_at']; ?><br> Cập nhật lúc: <?= $value['updated_at']; ?></td>
                                <td><button type="button" class="btn btn-warning updateRoseAffiliate" data-toggle="modal" data-target="#updateRoseAffiliate" rose_id="<?= $value['id']; ?>"><i class="ion ion-ios-brush" style="font-size: 23px;"></i></button></td>

                                <td><a href="index.php?page=affiliate&method=deleteRose&id=<?= $value['id']; ?>" onclick="return confirm('Bạn có thực sự muốn xóa chương trình này không? ');" class="btn btn-danger"><i class="ion ion-md-close-circle-outline" style="font-size: 23px;"></i></a></td>
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


<div class="modal fade bs-example-modal-center" id="updateRoseAffiliate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhật tỉ lệ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="body-update">

            </div>
        </div>
    </div>
</div>