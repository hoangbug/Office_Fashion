<?php
$useAjax = 1;
include_once "../../controller/adminAffiliateController.php";
$affiliate = new affiliateController();
if (isset($_POST['rose_id']) && !empty($_POST['rose_id'])) {
    $id = $_POST['rose_id'];
    $roseDetail = $affiliate->getRoseDetail($id);
?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="col-12" style="padding: 20px 12px;">
            <?php
            foreach ($roseDetail as $value) {
            ?>
                <div class="form-group" style="display: none;">
                    <label for="">ID</label>
                    <input type="text" class="form-control" id="" name="rose_id" value="<?= $value['id']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tên danh mục</label>
                    <input type="text" class="form-control" id="" value="<?= $value['name_cate']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Ảnh chương trình</label>
                    <input type="file" class="form-control" name="fileUpload" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input type="text" class="form-control" id="" name="title" placeholder="Nhập tiêu đề">
                </div>
                <div class="form-group">
                    <label for="">Khách hàng cũ</label>
                    <input type="text" class="form-control" id="" name="" value="<?= $value['rose_old']; ?> %" readonly>
                </div>
                <div class="form-group">
                    <label for="">Khách hàng mới</label>
                    <input type="text" class="form-control" id="" name="" value="<?= $value['rose_new']; ?> %" readonly>
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea name="description" id="editor"></textarea>
                </div>
            <?php
            }
            ?>
            <button type="submit" name="addRoseProgram" class="btn btn-info">Thêm mới</button>
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