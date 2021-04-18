<?php
function substr_word($str, $limit)
{
    if (stripos($str, " ")) {
        $ex_str = explode(" ", $str);
        $str_s = "";
        if (count($ex_str) > $limit) {
            for ($i = 0; $i < $limit; $i++) {
                $str_s .= $ex_str[$i] . " ";
            }
            return $str_s ." ...";
        } else {
            return $str;
        }
    } else {
        return $str;
    }
}
if (isset($_SESSION['success'])) {
?>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="alert alert-success" role="alert" style="margin-top: 30px; font-size: 20px;">
                <?php echo $_SESSION['success']; ?>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
<?php
    unset($_SESSION['success']);
}
?>
<?php
if (isset($_SESSION['error'])) {
?>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="alert alert-danger" role="alert" style="margin-top: 30px; font-size: 20px;">
                <?php echo $_SESSION['error']; ?>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
<?php
    unset($_SESSION['error']);
}
?>
<div class="row" style="margin: 30px 0;">
    <div class="col-12">
        <!-- <a href="index.php?page=category&method=addCategory" class="btn btn-info">Thêm danh mục mới</a> -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Thêm danh Blogs
        </button>
    </div>
</div>


<!-- Modal insert category -->

<div class="modal fade fade bs-example-modal-center" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới Blogs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col-10 offset-1">
                        <div class="form-group">
                            <label for="">Danh mục</label>
                            <select name="cate_id" id="" class="form-control">
                                <?php foreach ($selectNameCateBlog as $value) { ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['name_cate']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tên tiêu đề">
                        </div>
                        <div class="form-group">
                            <label>Chọn ảnh:</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="filename">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editor">Nội dung</label>
                            <textarea class="form-control" id="editor" name="content_blog"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="index.php?page=category&method=categoryProduct#" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                    <button type="submit" name="insertBlogs" class="btn btn-primary">Thêm mới</button>
                </div>
            </form>
            <script>
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card" id="databaseTable">
            <div class="card-body table-responsive" id="contentDatabase">
                <h4 class="m-t-0 header-title mb-4"><b>Blog Manage</b></h4>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Người viết bài</th>
                            <th>Tiêu đề</th>
                            <th>Ảnh</th>
                            <th>Lượt xem</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                            <th>Cập nhật</th>
                            <th>Xóa</th>
                            <!-- <th colspan="3" class="text-center">Action</th> -->
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($selectAllBlog as $value) {
                        ?>
                            <tr>
                                <td><?= $count++; ?></td>
                                <td><?= $value['name_cate']; ?></td>
                                <td><?= $value['name']; ?></td>
                                <td><?=substr_word($value['title'], 8); ?></td>
                                <td><img src="../assets/images/blogs/<?= $value['main_image']; ?>" alt="" style="width: 150px;"></td>
                                <td><?= $value['views']; ?></td>
                                <td><?php if ($value['status'] == 0) {
                                        echo "<i class='ion ion-md-close-circle' style='color: red;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Dừng hoạt động";
                                    } else {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đang hoạt động";
                                    } ?></td>
                                <td><button type="button" class="btn btn-info viewsBlogs" data-toggle="modal" data-target="#viewsBlogs" blog_id="<?= $value['id']; ?>"><i class="ion ion-md-eye" style="font-size: 23px;"></i></button></td>

                                <td><button type="button" class="btn btn-warning updateBlogs" data-toggle="modal" data-target="#updateBlogs" user_id="<?= $value['user_id']; ?>" blog_id="<?= $value['id']; ?>"><i class="ion ion-ios-brush" style="font-size: 23px;"></i></button></td>

                                <td><a href="index.php?page=blog&method=deleteBlogs&id=<?= $value['id']; ?>" onclick="return confirm('Bạn có thực sự muốn xóa danh mục này không?');" class="btn btn-danger deleteCategory"><i class="ion ion-md-close-circle-outline" style="font-size: 23px;"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal views blogs -->
<div class="modal fade bs-example-modal-center" id="viewsBlogs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết Blogs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="body-update">

            </div>
        </div>
    </div>
</div>

<!-- Modal update blogs -->
<div class="modal fade bs-example-modal-center" id="updateBlogs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhật Blogs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="body-update">

            </div>
        </div>
    </div>
</div>