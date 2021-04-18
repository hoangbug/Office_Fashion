<?php
$useAjax = 1;
include_once "../../controller/adminBrandController.php";
$adminBrand = new adminBrandController();
if (isset($_POST['brand_id']) && !empty($_POST['brand_id'])) {
    $id = $_POST['brand_id'];
    $brandDetail = $adminBrand->getOneBrand($id);
?>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id">Mã số</label>
            <input type="text" class="form-control" id="id" name="id" readonly value="<?= $brandDetail['id'];
                                                                                        ?>" aria-describedby="name_brand">
        </div>
        <div class="form-group">
            <label for="name_brand">Tên thương hiệu</label>
            <input type="text" class="form-control" id="name_brand" name="name_brand" value="<?= $brandDetail['name_brand'];
                                                                                                ?>" aria-describedby="name_brand">
        </div>
        <div class="form-group">
            <input type="text" name="avatarCurent" style="display:none;" value="<?= $brandDetail['avatar'];?>">
            <label for="avatar">Ảnh thương hiệu</label>
            <input type="file" onchange="viewImage(event)" accept="image/*" class="form-control" id="avatar" name="avatar">
            <img width="100" height="100%" style="box-shadow: 0px 1px 6px 0px grey; margin:10px;" id="output" />
        </div>
        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select name="status" class="form-control" id="">
                <option value="1" <?php if ($brandDetail['status'] == 1) echo "selected" ?>>Đang hợp tác</option>
                <option value="0" <?php if ($brandDetail['status'] == 0) echo "selected" ?>>Dừng hợp tác</option>
            </select>
        </div>
        <button type="submit" name="updateBrand" class="btn btn-primary">Cập nhật</button>
    </form>
<?php
}

?>