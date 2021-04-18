<?php
$useAjax = 1;
include_once "../../controller/adminAffiliateController.php";
$affiliate = new affiliateController();
if (isset($_POST['content_id']) && !empty($_POST['content_id'])) {
    $id = $_POST['content_id'];
    $affiliateDetail = $affiliate->getContentDetail($id);
    $selectAllRose = $affiliate->selectAllRose();
?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="col-12" style="padding: 20px 12px;">
            <?php
            foreach ($affiliateDetail as $value) {
            ?>
                <div class="form-group" style="display: block;">
                    <label for="">ID</label>
                    <input type="text" class="form-control" id="" name="id" value="<?= $value['id']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select name="rose_id" id="" class="form-control">
                        <?php
                        foreach($selectAllRose as $info){
                        ?>
                        <option value="<?=$info['id']?>" <?php if(($value['rose_id']) == ($info['id'])){echo "selected";} ?>><?=$info['name_cate'];?>: <?=$info['rose_old'];?>% - <?=$info['rose_new'];?>%</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    <input type="text" value="<?= $value['image'] ?>" name="img_old" style="display: none;" readonly>
                    <input type="file" class="form-control" name="fileUpload" accept="image/*">
                </div>
                <img src="../assets/images/affiliate/img-content/<?= $value['image'] ?>" alt="" style="width: 200px; height: 200px; margin-bottom: 20px;">
                <div class="form-group">
                    <label for="">Tiêu đề chương trình</label>
                    <input type="text" class="form-control" id="" name="title" value="<?= $value['title']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea name="description" id="editor"><?= $value['description']; ?></textarea>
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
                    <input type="text" class="form-control" id="" name="created_at" value="<?= $value['created_at']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Cập nhật lúc</label>
                    <input type="text" class="form-control" id="" name="" value="<?= $value['updated_at']; ?>" readonly>
                </div>
            <?php
            }
            ?>
            <button type="submit" name="updateProgramAffiliate" class="btn btn-info">Cập nhật</button>
        </div>
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