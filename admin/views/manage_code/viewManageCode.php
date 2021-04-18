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

<div class="row" style="margin: 30px 0;">
    <div class="col-12">
        <!-- <a href="index.php?page=category&method=addCategory" class="btn btn-info">Thêm danh mục mới</a> -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Thêm mã code
        </button>
    </div>
</div>


<!-- Modal insert category -->

<div class="modal fade fade bs-example-modal-center" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Danh mục</label>
                            <select name="cate_pro" id="" class="form-control">
                                <option value="" disabled selected></option>
                                <?php foreach($selectCate as $value){ ?>
                                    <option value="<?=$value['id']?>"><?=$value['name_cate'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input id="title" class="form-control" type="text" name="title">
                        </div>
                        <div class="form-group">
                            <label for="type-code">Type code</label>
                            <select name="type_code" id="type-code" class="form-control">
                                <option value="1">FreeShip</option>
                                <option value="2">Giảm tiền</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="monney">Giá tiền</label>
                            <input type="text" name="monney" id="monney" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="index.php?page=category&method=categoryProduct" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                    <button type="submit" name="insertChangeCode" class="btn btn-primary">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card" id="databaseTable">
            <div class="card-body table-responsive" id="contentDatabase">
                <h4 class="m-t-0 header-title mb-4"><b>Categorys Products</b></h4>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Danh mục</th>
                            <th>Tiêu đề</th>
                            <th>Type code</th>
                            <th>Giá tiền</th>
                            <th>Trạng thái</th>
                            <th>Chi tết</th>
                            <th>Phê duyệt</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($selectChangeCode as $value) {
                        ?>
                            <tr>
                                <td><?= $count++; ?></td>
                                <td><?= $value['name_cate']; ?></td>
                                <td><?= $value['title']; ?></td>
                                <td><?=$value['type_code'];?></td>
                                <td><?=$value['money_xu']; ?></td>
                                <td><?php if (($value['status']) == 0) {
                                        echo "<i class='ion ion-md-close-circle' style='color: red;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Chờ xử lý";
                                    } elseif (($value['status']) == 1) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đang hoạt động";
                                    } ?></td>
                                <td><button type="button" user_id="<?= $value['id']; ?>" class="btn btn-warning viewAdminUser" data-toggle="modal" data-target="#viewAdminUser" style="font-size: 23px;"><i class="ion-md-eye"></i></button></td>

                                <td><button type="button" user_id="<?= $value['id']; ?>" class="btn btn-info updateUsers" data-toggle="modal" data-target="#updateUsers" style="font-size: 23px;"><i class="fas fa-user-times"></i></button></td>

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
<div class="modal fade bs-example-modal-center" id="updateUsers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
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