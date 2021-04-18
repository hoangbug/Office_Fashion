<?php
$useAjax = 1;
include_once "../../controller/adminBlogController.php";
$blog = new blogController();
if (isset($_POST['blog_id']) && !empty($_POST['blog_id'])) {
    $blog_id = $_POST['blog_id'];
    $blogsDetail = $blog->getBlogsId_c($blog_id);
    foreach ($blogsDetail as $value) {
?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="col-10 offset-1">
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <input type="text" name="" class="form-control" value="<?=$value['name_cate'];?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Người viết</label>
                        <input type="text" name="" class="form-control" value="<?=$value['name'];?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="blog_id">Tiêu đề</label>
                        <input type="text" class="form-control" id="title" name="" value="<?= $value['title']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Ảnh:</label>
                        <img src="../assets/images/blogs/<?= $value['main_image'] ?>" alt="" class="form-control" style="height: auto;">
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control" rows="5" id="description" name=""><?= $value['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editor1">Nội dung</label>
                        <textarea class="form-control" id="editor1" name=""><?= $value['content_blog']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="views">Lượt xem</label>
                        <input type="text" class="form-control" id="views" value="<?= $value['views']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái danh mục</label>
                        <input type="text" class="form-control" id="views" value="<?php if($value['status'] == 0){echo "Dừng hoạt động";} if($value['status'] == 1){echo "Đang hoạt động";} ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tạo lúc</label>
                        <input type="text" class="form-control" id="" value="<?= $value['created_at']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Cập nhật lúc</label>                        
                        <input type="text" class="form-control" id="" value="<?= $value['updated_at']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                <!-- <button type="submit" name="updateBlogs" class="btn btn-primary">Cập nhật</button> -->
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