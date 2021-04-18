<?php
$useAjax = 1;
include_once "../../controller/adminProductController.php";
$product = new productController();
if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
    $id = $_POST['product_id'];
    $productDetail = $product->getProductOneDetail_c($id);
    $productDetailQuantity = $product->getSizeProduct_c($id);
    $productDetailImage = $product->getDetailImageProduct_c($id);
    $imageDetail = $product->getDetailImageProduct_c($id);
?>
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;">Hình ảnh sản phẩm</h5>
                </div>
                <img class="img-fluid" src="..\assets\images\products\<?= $productDetail[0]['main_image'] ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;"> <?= $productDetail[0]['name'] ?></h5>
                    <p><i class="ion-md-eye"></i> <?= $productDetail[0]['views'] ?></p>
                    <p class="card-text"><?= $productDetail[0]['description'] ?></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;"> Chi tiết sản phẩm</h5>
                    <h6>Tên sản phẩm : <?= $productDetail[0]['name'] ?></h6>
                    <h6>Thương hiệu : <?= $productDetail[0]['name_brand'] ?></h6>
                    <h6>Danh mục : <?= $productDetail[0]['name_cate'] ?></h6>
                    <h6>Đơn giá : <?= number_format($productDetail[0]['price'], 0, ',', '.'); ?> VNĐ</h6>
                    <h6>Giảm giá: <?= $productDetail[0]['sale'] ?></h6>
                    <h6>Trạng thái : <?php if (($productDetail[0]['status']) == 0) {
                                            echo "<i class='ion ion-md-close-circle' style='color: red;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Stop selling";
                                        } elseif (($productDetail[0]['status']) == 1) {
                                            echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>On sales";
                                        } elseif (($productDetail[0]['status']) == 2) {
                                            echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>New Arrivals";
                                        } elseif (($productDetail[0]['status']) == 3) {
                                            echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Best Sellers";
                                        } else {
                                            echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Hot Sales";
                                        } ?></h6>
                    <h6>Ngày tạo : <?= $productDetail[0]['created_at'] ?></h6>
                    <h6>Cập nhật : <?= $productDetail[0]['updated_at'] ?></h6>
                    <h6>Ảnh phụ</h6>
                    <?php
                    if (!empty($imageDetail)) {
                        $countImage = count($imageDetail);
                    ?>
                        <div class="form-group">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <?php
                                                for ($i = 0; $i < $countImage; $i++) {
                                                ?>
                                                    <th>Ảnh <?= $i + 1; ?></th>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                for ($i = 0; $i < $countImage; $i++) {
                                                ?>
                                                    <td><img src="../assets/images/detail_image_products/<?= $imageDetail[$i]['sub_images'] ?>" width="100" height="auto" alt="">
                                                        <input type="text" name="subImageCurrent[]" style="display: none;" value="<?= $imageDetail[$i]['sub_images'] ?>">
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>