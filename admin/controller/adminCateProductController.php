<?php
if(isset($useAjax)){
    include_once '../../model/adminCateProductModel.php';
}else{
    include_once 'model/adminCateProductModel.php';
}
    class cateProductController extends cateProductModel{
        private $category;
        function __construct()
        {
            $this->category = new cateProductModel();
        }

        public function getOneCategory_c($id){
            return $this->category->selectOneCategory_m($id);
        }

        public function addCategory_c(){
            include_once "views/category/category_product/add_product.php";
        }

        public function viewCategoryProduct_c(){
                $selectCate = $this->category->selectAllCategory_m();
                include_once "views/category/category_product/list_product.php";
        }

        public function deleteCategory_c(){
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];
                $this->category->categoryDelete_m($id);
                $_SESSION['success'] = "Xóa thành công!";
                header('Location: index.php?page=categoryProduct');
            }
        }

        public function option(){
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'viewCateProduct';
            }

            switch ($method) {
                case 'viewCateProduct':
                //    $this->viewCategoryProduct_c();
                    $this->viewCategoryProduct_c();
                    if(isset($_POST['updateCategory'])){
                        $id = $_POST['id'];
                        $gender_pro = $_POST['gender_pro'];
                        $name_cate = $_POST['nameCate'];
                        $status = $_POST['status'];
                        if(!empty($id) && !empty($gender_pro) && !empty($name_cate)){
                            $_SESSION['success'] = "Cập nhật thành công!";
                            $this->category->categoryUpdate_m($id, $gender_pro, $name_cate, $status);
                            header('Location: index.php?page=categoryProduct&method=viewCateProduct');
                        }else{
                            $_SESSION['error'] = "Bạn chưa nhập đủ thông tin!";
                            header("Location: index.php?page=categoryProduct&method=viewCateProduct");
                        }
                    }
                    if(isset($_POST['insertCategory'])){
                        $gender_pro = $_POST['gender_pro'];
                        $name_cate = $_POST['nameCate'];
                        $items = $_POST['items'];
                        if(!empty($name_cate) && !empty($gender_pro) && !empty($items)){
                            if($this->category->selectOneNameCategory_m($name_cate) == 0){
                                $_SESSION['success'] = "Thêm mới thành công!";
                                $this->category->categoryInsert_m($gender_pro, $name_cate, $items);
                                header('Location: index.php?page=categoryProduct&method=viewCateProduct');
                            }else{
                                $_SESSION['error'] = "Tên danh mục đã tồn tại!";
                                header('Location: index.php?page=categoryProduct&method=viewCateProduct');
                            }
                        }else{
                            $_SESSION['error'] = "Bạn chưa nhập đủ thông tin!";
                            header('Location: index.php?page=categoryProduct&method=viewCateProduct');
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