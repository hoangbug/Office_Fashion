<?php
    if(isset($useAjax)){
        include_once '../../model/adminCateBlogsModel.php';
    }else{
        include_once 'model/adminCateBlogsModel.php';
    }
    class cateBlogsController extends cateBlogsModel{
        private $category;
        function __construct()
        {
            $this->category = new cateBlogsModel();
        }

        public function getOneCategory_c($id){
            return $this->category->selectOneCategory_m($id);
        }
        
        public function addCategory_c(){
            include_once "views/category/category_blogs/add_blogs.php";
        }

        public function viewCategoryProduct_c(){
                $selectCate = $this->category->selectAllCategory_m();
                include_once "views/category/category_blogs/list_blogs.php";
        }

        public function deleteCategory_c(){
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];
                $this->category->categoryDelete_m($id);
                $_SESSION['success'] = "Xóa thành công!";
                header('Location: index.php?page=categoryBlogs');
            }
        }

        public function option(){
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'viewCateBlogs';
            }

            switch ($method) {
                case 'viewCateBlogs':
                //    $this->viewCategoryProduct_c();
                    $this->viewCategoryProduct_c();
                    if(isset($_POST['updateCategory'])){
                        $id = $_POST['id'];
                        $name_cate = $_POST['nameCate'];
                        $status = $_POST['status'];
                        if(!empty($id) && !empty($name_cate)){
                            $_SESSION['success'] = "Cập nhật thành công!";
                            $this->category->categoryUpdate_m($id, $name_cate, $status);
                            header('Location: index.php?page=categoryBlogs&method=viewCateBlogs');
                        }else{
                            $_SESSION['error'] = "Bạn chưa nhập đủ thông tin!";
                            header("Location: index.php?page=categoryBlogs&method=viewCateBlogs");
                        }
                    }
                    if(isset($_POST['insertCategory'])){
                        $name_cate = $_POST['nameCate'];
                        if(!empty($name_cate)){
                            if($this->category->selectOneNameCategory_m($name_cate) == 0){
                                $_SESSION['success'] = "Thêm mới thành công!";
                                $this->category->categoryInsert_m($name_cate);
                                header('Location: index.php?page=categoryBlogs&method=viewCateBlogs');
                            }else{
                                $_SESSION['error'] = "Tên danh mục đã tồn tại!";
                                header('Location: index.php?page=categoryBlogs&method=viewCateBlogs');
                            }
                        }else{
                            $_SESSION['error'] = "Bạn chưa nhập đủ thông tin!";
                            header('Location: index.php?page=categoryBlogs&method=viewCateBlogs');
                        }
                    }
                    break;
                case 'deleteCategory':
                    $this->deleteCategory_c();
                    break;
                default:
                    # code...
                    break;
            }
        }
    }
?>