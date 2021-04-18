<?php
    if(isset($useAjax)){
        include_once '../../model/adminAffiliateModel.php';
    }else{
        include_once 'model/adminAffiliateModel.php';
    }
    class affiliateController extends affiliateModel
    {
        private $affiliate;
        function __construct()
        {
            $this->affiliate = new affiliateModel();
        }

        public function getViewAffiliate_c()
        {
            $selectAll = $this->affiliate->affiliateSelectAll_m();
            include_once 'views/affiliate/viewAffiliate.php';
        }

        public function deleteAffiliate_c()
        {
            if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['img']) && !empty($_GET['img'])){
                $id = $_GET['id'];
                $img = $_GET['img'];
                $this->affiliate->affiliateDelete_m($id);
                unlink("../assets/images/affiliate/img-content/".$img);
                $_SESSION['success'] = "Xóa thành công!";
                header('Location: index.php?page=affiliate&method=viewAffiliate');
            }
        }

        public function getContentDetail($id)
        {
            return $this->affiliate->affiliateSelectOne_m($id);
        }

        public function getRoseDetail($id)
        {
            return $this->affiliate->selectRoseOne_m($id);
        }

        public function getAccountDetail($id)
        {
            return $this->affiliate->accountSelectOne_m($id);
        }

        public function selectAllRose()
        {
            return $this->affiliate->selectRose_m();
        }

        public function getAccountAffiliate_c()
        {
            $selectAll = $this->affiliate->accountSelectAll_m();
            include_once 'views/affiliate/accountAffiliate.php';
        }

        public function deleteAccount_c()
        {
            if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['img']) && !empty($_GET['img'])){
                $id = $_GET['id'];
                $img = $_GET['img'];
                $this->affiliate->accountDelete_m($id);
                unlink("../assets/images/affiliate/account/".$img);
                $_SESSION['success'] = "Xóa thành công!";
                header('Location: index.php?page=affiliate&method=accountAffiliate');
            }
        }

        public function getRoseAffiliate_c()
        {
            $selectAllCate = $this->affiliate->selectAllCate_m();
            $selectAllRose = $this->affiliate->selectRose_m();
            include_once 'views/affiliate/roseAffiliate.php';
        }

        public function deleteRose_c()
        {
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];
                $this->affiliate->deleteRose_m($id);
                header('Location: index.php?page=affiliate&method=roseAffiliate');
            }
        }

        public function getAddAffiliate_c()
        {
            $selectAllRose = $this->affiliate->selectRose_m();
            include_once 'views/affiliate/addAffiliate.php';
        }

        public function option(){
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'viewAffiliate';
            }

            switch($method){
                case 'addAffiliate':
                    $this->getAddAffiliate_c();
                    if(isset($_POST['addRoseProgram'])){
                        $rose_id = $_POST['rose_id'];
                        $check = $this->affiliate->selectCheckRose($rose_id);
                        if(isset($_FILES['fileUpload'])){
                            $fileUpload = $_FILES['fileUpload'];
                        }
                        $img_program = time().$this->affiliate->convert_name(($fileUpload['name']));
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $formatFile = array("image/jpeg", "image/png");
                        $type = $_FILES['fileUpload']['type'];
                        // echo '<pre>';
                        // print_r($check['ratio_rose']);
                        // echo '</pre>';
                        // die();
                        if(!empty($rose_id) && !empty($fileUpload['name']) && !empty($title) && !empty($description)){
                            if ($_FILES['fileUpload']['error'] > 0) {
                                echo "Upload error!";
                            }else{
                                if(in_array($type, $formatFile)){
                                    move_uploaded_file($fileUpload['tmp_name'], '../assets/images/affiliate/img-content/' . $img_program);
                                    $this->affiliate->insertProgramSell_m($rose_id, $img_program, $title, $check['rose_old'], $check['rose_new'], $description);
                                    $_SESSION['success'] = "Thêm chương trình mới thành công!";
                                    header('Location: index.php?page=affiliate&method=viewAffiliate');
                                }else{
                                    $_SESSION['error'] = "File up load không đúng định dạng!";
                                    header('Location: index.php?page=affiliate&method=addAffiliate');
                                }
                            }
                        }else{
                            $_SESSION['error'] = "Bạn chưa nhập đủ thông tin";
                            header('Location: index.php?page=affiliate&method=addAffiliate');
                        }
                    }
                    break;
                case 'viewAffiliate':
                    $this->getViewAffiliate_c();
                    if(isset($_POST['updateProgramAffiliate'])){
                        $id = $_POST['id'];
                        $rose_id = $_POST['rose_id'];
                        $check = $this->affiliate->selectCheckRose($rose_id);
                        if(isset($_FILES['fileUpload'])){
                            $fileUpload = $_FILES['fileUpload'];
                        }
                        $image = time().$this->affiliate->convert_name(($fileUpload['name']));
                        $img_old = $_POST['img_old'];
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $status = $_POST['status'];
                        $formatFile = array("image/jpeg", "image/png");
                        $type = $_FILES['fileUpload']['type'];

                        if(!empty($id) && !empty($rose_id) && !empty($title) && !empty($description)){
                            if(isset($fileUpload['name']) && !empty($fileUpload['name'])){
                                if ($_FILES['fileUpload']['error'] > 0) {
                                    echo "Upload error!";
                                }else{
                                    if(in_array($type, $formatFile)){
                                        move_uploaded_file($fileUpload['tmp_name'], '../assets/images/affiliate/img-content/' . $image);
                                        unlink("../assets/images/affiliate/img-content/" . $img_old);
                                        $this->affiliate->updateProgramSell_m($id, $rose_id, $image, $title, $check['rose_old'], $check['rose_new'], $description, $status);
                                        $_SESSION['success'] = "Cập nhật chương trình thành công!";
                                        header('Location: index.php?page=affiliate&method=viewAffiliate');
                                    }else{
                                        $_SESSION['error'] = "File up load không đúng định dạng!";
                                        header('Location: index.php?page=affiliate&method=addAffiliate');
                                    }
                                }
                            }else{
                                $this->affiliate->updateProgramSell_m($id, $rose_id, $img_old, $title, $check['rose_old'], $check['rose_new'], $description, $status);
                                $_SESSION['success'] = "Cập nhật chương trình thành công!";
                                header('Location: index.php?page=affiliate&method=viewAffiliate');
                            }
                        }else{
                            $_SESSION['error'] = "Bạn chưa nhập đủ thông tin";
                            header('Location: index.php?page=affiliate&method=viewAffiliate');
                        }
                    }
                    break;
                case 'deleteAffiliate':
                    $this->deleteAffiliate_c();
                    break;
                case 'accountAffiliate':
                    $this->getAccountAffiliate_c();
                    if(isset($_POST['updateAccount'])){
                        $id = $_POST['id'];
                        if(isset($_FILES['fileUpload'])){
                            $fileUpload = $_FILES['fileUpload'];
                        }
                        $avatar = time().$this->affiliate->convert_name(($fileUpload['name']));
                        $img_old = $_POST['img_old'];
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $email = $_POST['email'];
                        $email_old = $_POST['email_old'];
                        $profession = $_POST['profession'];
                        $address = $_POST['address'];
                        $phone = $_POST['phone'];
                        $password = $_POST['phone'];
                        $status = $_POST['status'];
                        if(!empty($id) && !empty($avatar) && !empty($img_old) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($email_old) && !empty($profession) && !empty($address) && !empty($phone) && !empty($password)){
                            if(isset($fileUpload['name']) && !empty($fileUpload['name'])){
                                if(($this->affiliate->accountCheckEmail_m($email)) == 0){
                                    move_uploaded_file($fileUpload['tmp_name'], '../assets/images/affiliate/account/' . $avatar);
                                    unlink("../assets/images/affiliate/account/".$img_old);
                                    $this->affiliate->updateAccount_m($id, $avatar, $firstname, $lastname, $email, $profession, $address, $phone, $password, $status);
                                    $_SESSION['success'] = "Cập nhật thành công!";
                                    header('Location: index.php?page=affiliate&method=accountAffiliate');
                                }else{
                                    move_uploaded_file($fileUpload['tmp_name'], '../assets/images/affiliate/account/' . $avatar);
                                    unlink("../assets/images/affiliate/account/".$img_old);
                                    $this->affiliate->updateAccount_m($id, $avatar, $firstname, $lastname, $email_old, $profession, $address, $phone, $password, $status);
                                    $_SESSION['error'] = "Email đã tồn tại!";
                                    header('Location: index.php?page=affiliate&method=accountAffiliate');
                                }
                            }else{
                                if(($this->affiliate->accountCheckEmail_m($email)) == 0){
                                    $this->affiliate->updateAccount_m($id, $img_old, $firstname, $lastname, $email, $profession, $address, $phone, $password, $status);
                                    $_SESSION['success'] = "Cập nhật thành công!";
                                    header('Location: index.php?page=affiliate&method=accountAffiliate');
                                }else{
                                    $this->affiliate->updateAccount_m($id, $img_old, $firstname, $lastname, $email_old, $profession, $address, $phone, $password, $status);
                                    // $_SESSION['error'] = "Email đã tồn tại!";
                                    $_SESSION['success'] = "Cập nhật thành công!";
                                    header('Location: index.php?page=affiliate&method=accountAffiliate');
                                }
                            }
                        }else{

                        }
                    }
                    break;
                case 'deleteAccount':
                    $this->deleteAccount_c();
                    break;
                case 'roseAffiliate':
                    $this->getRoseAffiliate_c();
                    if(isset($_POST['insertRoseAffiliate'])){
                        $cate_id = $_POST['cate_pro_id'];
                        $rose_old = $_POST['rose_old'];
                        $rose_new = $_POST['rose_new'];
                        if(!empty($rose_old) && !empty($rose_new)){
                            if(!is_float($rose_old) && !is_float($rose_new)){
                                if($rose_old > 0 && $rose_old <= 15 && $rose_old > 0 && $rose_old <= 15){
                                    if(($this->affiliate->selectCheckCate($cate_id)) == 0){
                                        $this->affiliate->insertRose_m($cate_id, $rose_old, $rose_new);
                                        $_SESSION['success'] = "Thêm mới thành công!";
                                        header('Location: index.php?page=affiliate&method=roseAffiliate');
                                    }else{
                                        $_SESSION['error'] = "Tỉ lệ này đã tồn tại!";
                                        header('Location: index.php?page=affiliate&method=roseAffiliate');
                                    }
                                }else{
                                    $_SESSION['error'] = "Phần trăm hoa hồng từ 1% đến tối đa 15%";
                                    header('Location: index.php?page=affiliate&method=roseAffiliate');
                                }
                            }else{
                                $_SESSION['error'] = "Phần trăm hoa hồng phải là số";
                                header('Location: index.php?page=affiliate&method=roseAffiliate');
                            }
                        }else{
                            $_SESSION['error'] = "Bạn chưa nhập đủ thông tin";
                            header('Location: index.php?page=affiliate&method=roseAffiliate');
                        }
                    }
                    
                    //* update ratio rose
                    if(isset($_POST['updateRose'])){
                        $id = $_POST['id'];
                        $rose_old = $_POST['rose_old'];
                        $rose_new = $_POST['rose_new'];
                        $status = $_POST['status'];
                        if(!empty($id) && !empty($rose_old) && !empty($rose_new)){
                            if(!is_float($rose_old) && !is_float($rose_old)){
                                if($rose_old > 0 && $rose_old <= 15 && $rose_new > 0 && $rose_new <= 15){
                                    $this->affiliate->updateRose_m($id, $rose_old, $rose_new, $status);
                                    $_SESSION['success'] = "Cập nhật thành công!";
                                    header('Location: index.php?page=affiliate&method=roseAffiliate');
                                }else{
                                    $_SESSION['error'] = "Phần trăm hoa hồng từ 1% đến tối đa 15%";
                                    header('Location: index.php?page=affiliate&method=roseAffiliate');
                                }
                            }else{
                                $_SESSION['error'] = "Phần trăm hoa hồng phải là số";
                                header('Location: index.php?page=affiliate&method=roseAffiliate');
                            }
                        }else{
                            $_SESSION['error'] = "Bạn chưa nhập đủ thông tin";
                            header('Location: index.php?page=affiliate&method=roseAffiliate');
                        }
                    }
                    break;
                case 'deleteRose':
                    $this->deleteRose_c();
                    break;
                default:
                    //* code
                break;
            }
        }
    }
?>