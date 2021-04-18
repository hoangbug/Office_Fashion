<?php
function substr_word($str, $limit)
{
    if (stripos($str, " ")) {
        $ex_str = explode(" ", $str);
        $str_s = "";
        if (count($ex_str) > $limit) {
            for ($i = 0; $i < $limit; $i++) {
                $str_s .= $ex_str[$i] . " ";
            }
            return $str_s ." ...";
        } else {
            return $str;
        }
    } else {
        return $str;
    }
}
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
<div class="row" style="margin: 50px 0;">
    <div class="col-12">
        <a href="index.php?page=product&method=addProduct" class="btn btn-info">Thêm sản phẩm</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title mb-4"><b>Categorys Products</b></h4>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="databaseTable">
                        <tr>
                            <th>STT</th>
                            <th>Avatar</th>
                            <th>ID - Tên User</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Trạng thái</th>
                            <th>Chi tết</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($selectViewAll as $value) {
                        ?>
                            <tr class="contentDatabase">
                                <td><?= $count++; ?></td>
                                <td><img src="assets/images/users/<?= $value['avatar']; ?>" style="width: 100px;" alt=""></td>
                                <td><?= $value['name']; ?></td>
                                <td><?=$value['email'];?></td>
                                <td><?=$value['phone']; ?></td>
                                <td><?php if (($value['status']) == 0) {
                                        echo "<i class='ion ion-md-close-circle' style='color: red;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Chờ xử lý";
                                    } elseif (($value['status']) == 1) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đang hoạt động";
                                    } ?></td>
                                <td><button type="button" user_id="<?= $value['id']; ?>" class="btn btn-warning viewAdminUser" data-toggle="modal" data-target="#viewAdminUser" style="font-size: 23px;"><i class="ion-md-eye"></i></button></td>

                                <td><a href="index.php?page=product&method=product_set_delete&id_proOne=<?= $value['id']; ?>&img=<?=$value['main_image']?>" onclick="return confirm('Bạn có thực sự muốn xóa sản phẩm này không? ');" class="btn btn-danger" style="font-size: 23px;"><i class="ion ion-md-close-circle-outline"></i></a></td>
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


<!-- Modal -->
<!-- view detail product -->
<div class="modal fade bs-example-modal-center" id="viewAdminUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>