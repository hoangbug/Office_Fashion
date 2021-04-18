<?php
$useAjax = 1;
include_once "../../controller/adminProductController.php";
$product = new productController();
if (isset($_POST['product_set']) && !empty($_POST['product_set'])) {
    $id = $_POST['product_set'];
    $productDetail = $product->getProductSetDetail_c($id);
?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="col-12" style="padding: 20px 12px;">
            <?php
            foreach ($productDetail as $value) {
            ?>
                <div class="form-group" style="display: none;">
                    <label for="">ID</label>
                    <input type="text" class="form-control" id="" name="id" value="<?= $value['id']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tên thương hiệu</label>
                    <input type="text" class="form-control" id="" name="" value="<?= $value['name_brand']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Mã bộ đồ</label>
                    <input type="text" class="form-control" id="" name="" value="<?= $value['id']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tên bộ đồ</label>
                    <input type="text" class="form-control" id="" name="product_name_sets" value="<?= $value['product_name_sets']; ?>">
                </div>
                <!-- <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="" name="product_name" value="<?= $value['name']; ?>">
                </div> -->
                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    <input type="text" value="<?= $value['image_sets'] ?>" name="img_old" style="display: none;" readonly>
                    <input type="file" class="form-control" name="fileUpload" accept="image/*">
                </div>
                <img src="../assets/images/products/<?= $value['image_sets'] ?>" alt="" style="width: 200px; height: 200px;">
        </div>
        <div class="form-group">
            <label for="">Giá bán</label>
            <input type="text" class="form-control" id="" name="price" value="<?= $value['price']; ?>">
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <textarea class="form-control" id="editor" name="description"><?= $value['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Sale</label>
            <input type="text" class="form-control" id="" name="sale" value="<?= $value['sale']; ?>">
        </div>
        <div class="form-group">
            <label for="">Lượt xem</label>
            <input type="text" class="form-control" id="" name="" value="<?= $value['views']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="">Trạng thái</label>
            <select name="status" class="form-control">
                <option value="0" <?php if ($value['status'] == 0) {
                                        echo "selected";
                                    } ?>>Out of stock</option>
                <option value="1" <?php if ($value['status'] == 1) {
                                        echo "selected";
                                    } ?>>On sales</option>
                <option value="2" <?php if ($value['status'] == 2) {
                                        echo "selected";
                                    } ?>>New Arrivals</option>
                <option value="3" <?php if ($value['status'] == 3) {
                                        echo "selected";
                                    } ?>>Best Sellers</option>
                <option value="4" <?php if ($value['status'] == 4) {
                                        echo "selected";
                                    } ?>>Hot Sales</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Được tạo lúc</label>
            <input type="text" class="form-control" id="" name="" value="<?= $value['created_at']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="">Cập nhật lúc</label>
            <input type="text" class="form-control" id="" name="" value="<?= $value['updated_at']; ?>" readonly>
        </div>
    <?php
            }
    ?>
    <button type="submit" name="updateProductSet" class="btn btn-info">Cập nhật</button>
    </div>
    </form>
<?php
}
?>
<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
</script>