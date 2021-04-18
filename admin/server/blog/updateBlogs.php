<?php
$useAjax = 1;
include_once "../../controller/adminBlogController.php";
$blog = new blogController();
if (isset($_POST['blog_id']) && !empty($_POST['blog_id'])) {
    $blog_id = $_POST['blog_id'];
    $blogsDetail = $blog->getBlogsId_c($blog_id);
    $cateDetail = $blog->getFullCateBlogs();
    foreach ($blogsDetail as $value) {
?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="col-10 offset-1">
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="cate_id" id="" class="form-control">
                            <?php foreach ($cateDetail as $info) { ?>
                                <option value="<?= $info['id'] ?>" <?php if ($value['cate_blog_id'] == $info['id']) {
                                                                        echo "selected";
                                                                    } ?>><?= $info['name_cate']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="blog_id">Tiêu đề</label>
                        <input type="hidden" class="form-control" id="blog_id" name="blog_id" value="<?= $blog_id; ?>">
                        <input type="text" class="form-control" id="title" name="title" value="<?= $value['title']; ?>" placeholder="Nhập tên tiêu đề">
                    </div>
                    <div class="form-group">
                        <label>Chọn ảnh:</label>
                        <div class="custom-file mb-3">
                            <input type="text" name="image_old" value="<?= $value['main_image'] ?>" style="display: none;">
                            <input type="file" class="custom-file-input" id="customFile" name="filename">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <img src="../assets/images/blogs/<?= $value['main_image'] ?>" alt="" style="max-width: 250px;">
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control" rows="5" id="description" name="description"><?= $value['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editor">Nội dung</label>
                        <textarea class="form-control" id="editor1" name="content_blog"><?= $value['content_blog']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="views">Lượt xem</label>
                        <input type="text" class="form-control" id="views" value="<?= $value['views']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái danh mục</label>
                        <select name="status" class="form-control">
                            <option value="1" <?php if ($value['status'] == 1) {
                                                    echo "selected";
                                                } ?>>Dừng hoạt động</option>
                            <option value="2" <?php if ($value['status'] == 2) {
                                                    echo "selected";
                                                } ?>>Đang hoạt động</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                <button type="submit" name="updateBlogs" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor1'))
                .catch(error => {
                    console.error(error);
                });

            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
                var fileUpload = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileUpload);
            });
        </script>
<?php
    }
}
?>