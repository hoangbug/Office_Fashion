<?php
if(isset($useAjax)){
    include_once '../../model/adminManageCodeModel.php';
}else{
    include_once 'model/adminManageCodeModel.php';
}
    class manageCodeController extends manageCodeModel{
        private $code;
        function __construct(){
            $this->code = new manageCodeModel();
        }

        public function viewCode_c()
        {
            $selectChangeCode = $this->code->selectChangeCode_m();
            $selectCate = $this->code->selectAllCategory_m();
            include_once 'views/manage_code/viewManageCode.php';
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'viewCode';
            }

            switch($method){
                case 'viewCode':
                    $this->viewCode_c();
                    if(isset($_POST['insertChangeCode'])){
                        $title = $_POST['title'];
                        if(isset($_POST['cate_pro'])){
                            $cate_id = $_POST['cate_pro'];
                        }else{
                            $cate_id = 0;
                        }
                        $type_code = $_POST['type_code'];
                        $money = $_POST['monney'];
                        if(!empty($title) && !empty($type_code) && !empty($money)){
                            if(is_numeric($money) && $money > 0){
                                $this->code->insertChangeCode_m($cate_id, $title, $type_code, $money);
                                $_SESSION['success'] = "Thêm mới thành công!";
                                header('Location: index.php?page=manage_code&method=viewCode');
                            }else{
                                $_SESSION['error'] = "Giá tiền không đúng!";
                                header('Location: index.php?page=manage_code&method=viewCode');
                            }
                        }else{
                            $_SESSION['error'] = "Bạn chưa nhập đủ thông tin!";
                            header('Location: index.php?page=manage_code&method=viewCode');
                        }
                    }
                    break;
                default:
                    // code
                    break;
            }
        }
    }
?>