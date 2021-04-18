<?php
$useAjax = 1;
include_once "../../controller/adminCateProductController.php";
$category = new cateProductController();
if (isset($_POST['cate_id']) && !empty($_POST['cate_id'])) {
    $id = $_POST['cate_id'];
    $cateDetail = $category->getOneCategory_c($id);
?>
    <form action="" method="POST">
            <div class="modal-body">
                <div class="col-12" style="padding: 20px 12px;">
                    <div class="form-group" style="display: none;">
                        <label for="nameCate">Mã số danh mục</label>
                        <input type="text" class="form-control" id="nameCate" name="id" value="<?= $cateDetail['id']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nameCate">Tên danh mục</label>
                        <select class="form-control" name="gender_pro">
                            <option value="1" <?php if(($cateDetail['gender_product']) == 1){echo "selected";}?>>Nữ</option>
                            <option value="2" <?php if(($cateDetail['gender_product']) == 2){echo "selected";}?>>Nam</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nameCate">Tên danh mục</label>
                        <input type="text" class="form-control" id="nameCate" name="nameCate" value="<?= $cateDetail['name_cate']; ?>" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="nameCate">Trạng thái danh mục</label>
                        <select name="status" class="form-control">
                            <option value="0" <?php if ($cateDetail['status'] == 0) {
                                                    echo "selected";
                                                }?>>Dừng hoạt động</option>
                            <option value="1" <?php if ($cateDetail['status'] == 1) {
                                                    echo "selected";
                                                } ?>>Đang hoạt động</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="index.php?page=category&method=categoryProduct" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                <button type="submit" name="updateCategory" class="btn btn-primary">Cập nhật</button>
            </div>
    </form>
<?php
}

?>