<?php
    if(isset($useAjax)){
        include_once '../../model/adminBlogModel.php';
    }else{
        include_once 'model/adminBlogModel.php';
    }
    class blogController extends blogModel{
        private $blog;
        function __construct()
        {
            $this->blog = new blogModel();
        }

        public function viewsBlog_c()
        {
            $selectNameCateBlog = $this->blog->selectNameCateBlog_m();
            $selectAllBlog = $this->blog->selectAllBlog_m();
            include_once 'views/blogs/viewBlogs.php';
        }

        public function getBlogsId_c($id)
        {
            return $this->blog->selectOnIdBlog_m($id);
        }

        public function getFullCateBlogs()
        {
            return $this->blog->selectNameCateBlog_m();
        }

        public function deleteBlogs_c()
        {
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $blog_id = $_GET['id'];
                $checkUserBlog = $this->blog->selectOnIdBlog_m($blog_id);
                if(isset($_COOKIE['emaildUser']) && !empty($_COOKIE['emaildUser'])){
                    $emailUser = $_COOKIE['emaildUser'];
                    $checkUser = $this->blog->selectOnIdUser_m($emailUser);
                    if($checkUserBlog[0]['user_id'] == $checkUser['id']){
                        $this->blog->blogDelete_m($blog_id);
                    }else{
                        $_SESSION['error'] = "Bạn không có quyền xóa bài viết của người khác!";
                        header('Location: index.php?page=blog&method=viewsBlog');
                    }
                }
            }
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'viewsBlog';
            }
            switch($method){
                case 'viewsBlog':
                    $this->viewsBlog_c();
                    if(isset($_POST['insertBlogs'])){
                        $cate_id = $_POST['cate_id'];
                        $title = $_POST['title'];
                        if(isset($_FILES['filename'])){
                            $filename = $_FILES['filename'];
                        }
                        $main_img = time().$this->blog->convert_name($filename['name']);
                        $description = $_POST['description'];
                        $content_blog = $_POST['content_blog'];
                        if(!empty($cate_id) && !empty($title) && !empty($filename['name']) && !empty($description) && !empty($content_blog)){
                            if(isset($_COOKIE['emaildUser']) && !empty($_COOKIE['emaildUser'])){
                                $emailUser = $_COOKIE['emaildUser'];
                                $checkUser = $this->blog->selectOnIdUser_m($emailUser);
                                if(!empty($checkUser)){
                                    $typeSet = $_FILES['filename']['type'];
                                    $formatFile = array("image/jpeg", "image/png", "image/jpg");
                                    if ($_FILES['fileUploadSet']['error'] > 0) {
                                        echo "Upload error!";
                                    } else {
                                        if (in_array($typeSet, $formatFile)) {
                                            move_uploaded_file($filename['tmp_name'], '../assets/images/blogs/' . $main_img);
                                            $this->blog->blogInsert_m($cate_id, $checkUser['id'], $title, $main_img, $description, $content_blog);
                                            $_SESSION['success'] = "Thêm mới thành công!";
                                            header('Location: index.php?page=blog&method=viewsBlog');
                                        } else {
                                            $_SESSION['error'] = "File up load không đúng định dạng!";
                                            header('Location: index.php?page=product&method=addProduct');
                                        }
                                    }
                                }
                            }
                        }else{
                            $_SESSION['error'] = "Bạn chưa nhập đủ thông tin!";
                            header('Location: index.php?page=blog&method=viewsBlog');
                        }
                    }

                    //* update Blogs
                    if(isset($_POST['updateBlogs'])){
                        $blog_id = $_POST['blog_id'];
                        $cate_id = $_POST['cate_id'];
                        $title = $_POST['title'];
                        $image_old = $_POST['image_old'];
                        if(isset($_FILES['filename'])){
                            $filename = $_FILES['filename'];
                        }
                        $main_image = time().$this->blog->convert_name($filename['name']);
                        $description = $_POST['description'];
                        $content_blog = $_POST['content_blog'];
                        $status = $_POST['status'];
                        // echo '<pre>';
                        // print_r($_POST);
                        // echo '</pre>';
                        // die();
                        if(!empty($blog_id) && !empty($cate_id) && !empty($title) && !empty($image_old) && !empty($description) && !empty($content_blog)){
                            if($status == 0 || $status == 1){
                                if(isset($_COOKIE['emaildUser']) && !empty($_COOKIE['emaildUser'])){
                                    $emailUser = $_COOKIE['emaildUser'];
                                    $checkUser = $this->blog->selectOnIdUser_m($emailUser);
                                    if(!empty($checkUser)){
                                        $checkUserBlog = $this->blog->checkUserBlogs_m($checkUser['id'], $blog_id);
                                        if(!empty($checkUserBlog)){
                                            if(isset($filename['name']) && !empty($filename['name'])){
                                                $typeSet = $_FILES['filename']['type'];
                                                $formatFile = array("image/jpeg", "image/png", "image/jpg");
                                                if ($_FILES['fileUploadSet']['error'] > 0) {
                                                    echo "Upload error!";
                                                } else {
                                                    if (in_array($typeSet, $formatFile)) {
                                                        move_uploaded_file($filename['tmp_name'], '../assets/images/blogs/' . $main_image);
                                                        unlink("../assets/images/blogs/".$image_old);
                                                        $this->blog->blogUpdate_m($blog_id, $checkUser['id'], $cate_id, $title, $main_image, $description, $content_blog, $status);
                                                        $_SESSION['success'] = "Thêm mới thành công!";
                                                        header('Location: index.php?page=blog&method=viewsBlog');
                                                    } else {
                                                        $_SESSION['error'] = "File up load không đúng định dạng!";
                                                        header('Location: index.php?page=product&method=addProduct');
                                                    }
                                                }
                                            }else{
                                                $this->blog->blogUpdate_m($blog_id, $checkUser['id'], $cate_id, $title, $image_old, $description, $content_blog, $status);
                                                $_SESSION['success'] = "Cập nhật thành công!";
                                                header('Location: index.php?page=blog&method=viewsBlog');
                                            }
                                        }else{
                                            $_SESSION['error'] = "Bạn không có quyền sửa bài viết của người khác!";
                                            header('Location: index.php?page=blog&method=viewsBlog');
                                        }
                                    }
                                }
                            }
                        }else{
                            $_SESSION['error'] = "Bạn chưa nhập đủ thông tin!";
                            header('Location: index.php?page=blog&method=viewsBlog');
                        }
                    }
                    break;
                case 'deleteBlogs':
                    $this->deleteBlogs_c();
                    break;
                default:
                    // code
                    break;
            }
        }
    }
?>