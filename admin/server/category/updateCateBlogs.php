<?php
$useAjax = 1;
include_once "../../controller/adminCateBlogsController.php";
$category = new cateBlogsController();
if (isset($_POST['cate_id']) && !empty($_POST['cate_id'])) {
    $id = $_POST['cate_id'];
    $cateDetail = $category->getOneCategory_c($id);
?>
    <form action="" method="POST">
            <div class="modal-body">
                <div class="col-12" style="padding: 20px 12px;">
                    <div class="form-group">
                        <label for="nameCate">Mã số danh mục</label>
                        <input type="text" class="form-control" id="nameCate" name="id" value="<?= $cateDetail['id']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nameCate">Tên danh mục</label>
                        <input type="text" class="form-control" id="nameCate" name="nameCate" value="<?= $cateDetail['name_cate']; ?>" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái danh mục</label>
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
                <a href="index.php?page=categoryBlogs&method=viewCateBlogs" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                <button type="submit" name="updateCategory" class="btn btn-primary">Cập nhật</button>
            </div>
    </form>
<?php
}

?>