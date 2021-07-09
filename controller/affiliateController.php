<?php
    if(isset($useAjax)){
        include_once '../../model/affiliateModel.php';
    }else{
        include_once 'model/affiliateModel.php';
    }
    class affiliateController extends affiliateModel
    {
        private $affiliate ;
        
        function __construct()
        {
            $this->affiliate = new affiliateModel();
            $this->checkAcc();
        }
        function checkAcc()
        {
            if(!isset($_GET['page']) || !isset($_GET['method']) || empty($_GET['page']) || empty($_GET['method']) || $_GET['method'] != 'programAffiliate' || $_GET['page'] != 'affiliate' || $_GET['method'] != 'programManage' || $_GET['method'] != 'turnOverAffiliate'){
                if(isset($_SESSION['emailAffiliate'])){
                    // header("Location: index.php?page=affiliate&method=programAffiliate");
                }
            }else{
                if(!isset($_SESSION['emailAffiliate'])){
                    header('Location: index.php?page=affiliate&method=loginAffiliate');
                }
            }
            
        }

        public function getLogin_c()
        {
            include_once 'views/affiliate/loginAffiliate.php';
        }

        public function getRegister_c()
        {
            include_once 'views/affiliate/registerAffiliate.php';
        }

        public function getProgramAffiliate_c()
        {
            $selectAllProgram = $this->affiliate->selectAllProgram_m();
            include_once 'views/affiliate/programAffiliate.php';
        }

        public function getSelectProgram_m($id)
        {
            return $this->affiliate->affiliateSelectOne_m($id);
        }

        public function getAffiliateCode_c($id)
        {
            return $this->affiliate->selectAffiliateCode_m($id);
        }

        public function getLogoutAffiliate_c()
        {
            if(isset($_SESSION['emailAffiliate']) && !empty($_SESSION['emailAffiliate']) && isset($_SESSION['affiliate_id']) && !empty($_SESSION['affiliate_id'])){
                unset($_SESSION['emailAffiliate']);
                unset($_SESSION['affiliate_id']);
                header('Location: index.php?page=affiliate&method=loginAffiliate');
            }
        }

        public function insertReferal_c($affiliate_id, $program_id, $affiliate_code)
        {
            $this->affiliate->insertReferal_m($affiliate_id, $program_id, $affiliate_code);
        }

        public function checkReferalOne_c($affiliate_id, $program_id)
        {
            return $this->affiliate->checkReferalOne_m($affiliate_id, $program_id);
        }

        public function programManage_c()
        {
            // if(isset($_SESSION['affiliate_id'])){
            //     $affiliate_id = $_SESSION['affiliate_id'];
            //     $selectProgramAffiliate = $this->affiliate->selectAffiliateId_m($affiliate_id);
                include_once 'views/affiliate/programManage.php';
            // }
        }

        public function insertGiftCodeOne_c($cate_id, $affiliate_id, $change_code, $gift_code, $type_code, $quantity)
        {
            $this->affiliate->insertGiftCodeOne_m($cate_id, $affiliate_id, $change_code, $gift_code, $type_code, $quantity);
        }

        public function checkGifts_c($affiliate_id, $change_code)
        {
            return $this->affiliate->checkGifts_m($affiliate_id, $change_code);
        }

        public function checkTotalRoseAff_c($affiliate_id)
        {
            return $this->affiliate->checkTotalRoseAff_m($affiliate_id);
        }

        public function updateAffiliate_c($affiliate_id, $total_rose)
        {
            return $this->affiliate->updateAffiliate_m($affiliate_id, $total_rose);
        }

        public function getLink()
        {
            if(isset($_GET['affiliate'])){
                $qrcode = $_GET['affiliate'];
                $str = explode('_', $qrcode);
                $cookie_user = $str[0];
                $cookie_program = $str[1];
                $cookie_qrcode = $str[2];
                setcookie('cookie_user', $cookie_user, time() + (604800), "/");
                setcookie('cookie_program', $cookie_program, time() + (604800), "/");
                setcookie('cookie_qrcode', $cookie_qrcode, time() + (604800), "/");
                $program_id = $str[1];
                $checkGender = $this->affiliate->checkGendercate_m($program_id);
                $cate_id = $checkGender['id'];
                if($checkGender['gender_product'] == 1){
                    header("Location: index.php?page=women&cate_id=$cate_id");
                }elseif($checkGender['gender_product'] == 2){
                    header("Location: index.php?page=men&cate_id=$cate_id");
                }
            }
        }

        public function turnOverAffiliate_c()
        {
            $selectAll = $this->affiliate->selectTurnOver();
            include_once 'views/affiliate/turnOverAffiliate.php';
        }

        public function getViewAffiliate()
        {
            $selectRatioRose = $this->affiliate->selectRatioRoseViews_m();
            include_once 'views/affiliate/affiliate.php';
        }

        public function getChangeCode_c()
        {
            $selectChangeCode = $this->affiliate->selectChangeCode();
            include_once 'views/affiliate/changeCode.php';
        }

        public function checkGiftCodeOne_c($cate_id, $gift_code)
        {
            return $this->affiliate->checkGiftCodeOne_m($cate_id, $gift_code);
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'viewAffiliate';
            }
            switch($method){
                case 'viewAffiliate':
                    $this->getViewAffiliate();
                    break;
                case 'directionalAffiliate':
                    include_once 'views/affiliate/directionalAffiliate.php';
                    break;
                case 'loginAffiliate':
                    $this->getLogin_c();
                    if(isset($_SESSION['emailAffiliate'])){
                        header('Location: index.php?page=affiliate&method=programAffiliate');
                    }
                    if(isset($_POST['login'])){
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        if(!empty($email) && !empty($password)){
                            if($this->affiliate->checkEmail($email) == true){
                                // if($this->affiliate->checkPass($password) == true){
                                    $check = $this->affiliate->checkAccountOne_m($email,$password);
                                    if(!empty($check)){
                                        if($check['status'] == 1){
                                            $_SESSION['affiliate_id'] = $check['id'];
                                            $_SESSION['emailAffiliate'] = $email;
                                            header('Location: index.php?page=affiliate&method=programAffiliate');
                                        }else{
                                            $_SESSION['error1'] = "Error: Tài khoản của bạn đang chờ được phê duyệt!";
                                        header('Location: index.php?page=affiliate&method=loginAffiliate');
                                        }
                                    }else{
                                        $_SESSION['error1'] = "Error: Thông tin tài khoản hoặc mật khẩu không chính xác!";
                                        header('Location: index.php?page=affiliate&method=loginAffiliate');
                                    }
                                // }else{
                                //     $_SESSION['pass'] = $password;
                                //     $_SESSION['errorP'] = "Error: Password không đúng định dạng!";
                                //     header('Location: index.php?page=affiliate&method=loginAffiliate');
                                // }
                            }else{
                                $_SESSION['email'] = $email;
                                $_SESSION['errorM'] = "Error: Email không đúng định dạng!";
                                header('Location: index.php?page=affiliate&method=loginAffiliate');
                            }
                        }else{
                            $_SESSION['error1'] = "Bạn chưa nhập đủ thông tin!";
                            header('Location: index.php?page=affiliate&method=loginAffiliate');
                        }
                    }
                    break;
                case 'registerAffiliate':
                    $this->getRegister_c();
                    if(isset($_POST['finish'])){
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $email = $_POST['email'];
                        $profession = $_POST['profession'];
                        $address = $_POST['place'];
                        $phone = $_POST['phone'];
                        $password = $_POST['password'];
                        $confipassword = $_POST['confipassword'];
                        if(isset($_FILES['fileUpload'])){
                            $fileUpload = $_FILES['fileUpload'];
                        }
                        $avatar = time().$this->affiliate->convert_name(($fileUpload['name']));
                        $formatFile = array("image/jpeg", "image/png");
                        $type = $_FILES['fileUpload']['type'];

                        if(!empty($fileUpload['name']) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($profession) && !empty($address) && !empty($phone) && !empty($password) && !empty($confipassword)){
                            if($password == $confipassword){
                                if ($_FILES['fileUpload']['error'] > 0) {
                                    echo "Upload error!";
                                }else{
                                    if(in_array($type, $formatFile)){
                                        move_uploaded_file($fileUpload['tmp_name'], 'assets/images/affiliate/account/' . $avatar);
                                        $this->affiliate->affiliateInsert_m($avatar, $firstname, $lastname, $email, $profession, $address, $phone, $password);
                                        $_SESSION['successAffiliate'] = 'Đăng kí thành công - Tài khoản của bạn sẽ được phê duyệt từ 3 - 5 ngày!';
                                        header('Location: index.php?page=affiliate&method=loginAffiliate');
                                    }else{
                                        $_SESSION['error'] = "File up load không đúng định dạng!";
                                        header('Location: index.php?page=affiliate&method=registerAffiliate');
                                    }
                                }
                            }else{
                                $_SESSION['error'] = "Xác thực mật khẩu không đúng!";
                                header('Location: index.php?page=affiliate&method=registerAffiliate');
                            }
                        }else{
                            $_SESSION['error'] = "Bạn chưa nhập đủ thông tin";
                            header('Location: index.php?page=affiliate&method=registerAffiliate');
                        }
                    }
                    break;
                case 'logoutAffiliate':
                    $this->getLogoutAffiliate_c();
                    break;
                case 'programAffiliate':
                    $this->getProgramAffiliate_c();
                    break;
                case 'programManage':
                    $this->programManage_c();
                    if(!isset($_SESSION['emailAffiliate'])){
                        header('Location: index.php?page=affiliate&method=loginAffiliate');
                    }
                    break;
                case 'turnOverAffiliate':
                    if(!isset($_SESSION['emailAffiliate'])){
                        header('Location: index.php?page=affiliate&method=loginAffiliate');
                    }
                    $this->turnOverAffiliate_c();
                    break;
                case 'changeCode':
                    $this->getChangeCode_c();
                    break;
                default:
                    // code
                    break;
            }
        }
    } 
?>