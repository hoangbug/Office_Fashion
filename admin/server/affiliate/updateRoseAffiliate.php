<?php
$useAjax = 1;
include_once "../../controller/adminAffiliateController.php";
$affiliate = new affiliateController();
if (isset($_POST['rose_id']) && !empty($_POST['rose_id'])) {
    $id = $_POST['rose_id'];
    $roseDetail = $affiliate->getRoseDetail($id);
?>
    <form action="" method="POST">
        <div class="col-12" style="padding: 20px 12px;">
            <?php
            foreach ($roseDetail as $value) {
            ?>
                <div class="form-group" style="display: none;">
                    <label for="">ID</label>
                    <input type="text" class="form-control" id="" name="id" value="<?= $value['id']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tên danh mục</label>
                    <input type="text" class="form-control" value="<?= $value['name_cate']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Khách hàng cũ</label>
                    <input type="text" class="form-control" name="rose_old" value="<?= $value['rose_old']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Khách hàng mới</label>
                    <input type="text" class="form-control" name="rose_new" value="<?= $value['rose_new']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="0" <?php if ($value['status'] == 0) {
                                                echo "selected";
                                            } ?>>Dừng hoạt động</option>
                        <option value="1" <?php if ($value['status'] == 1) {
                                                echo "selected";
                                            } ?>>Đang hoạt động</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Được tạo lúc</label>
                    <input type="text" class="form-control" value="<?= $value['created_at']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Cập nhật lúc</label>
                    <input type="text" class="form-control" value="<?= $value['updated_at']; ?>" readonly>
                </div>
            <?php
            }
            ?>
            <button type="submit" name="updateRose" class="btn btn-info">Cập nhật</button>
        </div>
        </div>
    </form>
<?php
}
?>