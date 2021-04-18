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
        <div class="card" id="databaseTable">
            <div class="card-body table-responsive" id="contentDatabase">
                <h4 class="m-t-0 header-title mb-4"><b>Categorys Products</b></h4>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Tên thương hiệu</th>
                            <th>Mã bộ đồ</th>
                            <th>Tên bộ đồ</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Giá bán</th>
                            <th>Sale</th>
                            <th>Views</th>
                            <th>Trạng thái</th>
                            <th>Chi tết</th>
                            <th>Cập nhật</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($selectProductSetOne as $value) {
                        ?>
                            <tr>
                                <td><?= $count++; ?></td>
                                <td><?= $value['name_cate']; ?></td>
                                <td><?= $value['name_brand']; ?></td>
                                <td><?=$value['product_sets'];?></td>
                                <td><?=substr_word($value['product_name_sets'], 5); ?></td>
                                <td><?= substr_word($value['name'], 5); ?></td>
                                <td><img src="../assets/images/products/<?= $value['main_image']; ?>" alt="" style="width: 100px; height: 100px;"></td>
                                <td><?php echo number_format($value['price'], 0, '', '.'); ?></td>
                                <!-- <td><?= $value['description']; ?></td> -->
                                <td><?= $value['sale']; ?></td>
                                <td><?= $value['views']; ?></td>
                                <td><?php if (($value['status']) == 0) {
                                        echo "<i class='ion ion-md-close-circle' style='color: red;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Stop selling";
                                    } elseif (($value['status']) == 1) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>On sales";
                                    } elseif (($value['status']) == 2) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>New Arrivals";
                                    } elseif (($value['status']) == 3) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Best Sellers";
                                    } else {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Hot Sales";
                                    } ?></td>
                                <!-- <td><?= $value['created_at']; ?></td>
                                <td><?= $value['updated_at']; ?></td> -->
                                <td><button type="button" product_id="<?= $value['id']; ?>" class="btn btn-warning viewProduct" data-toggle="modal" data-target="#viewDetail" style="font-size: 23px;"><i class="ion-md-eye"></i></button></td>

                                <td><button type="button" product_id="<?= $value['id']; ?>" class="btn btn-info updateProductOne" data-toggle="modal" data-target="#updateProductOne" style="font-size: 23px;"><i class="ion ion-md-brush"></i></button></td>

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
<div class="modal fade bs-example-modal-center" id="updateProductOne" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="modal fade bs-example-modal-center" id="viewDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>