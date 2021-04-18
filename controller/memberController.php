<?php
    if(isset($useAjax)){
        include_once '../../model/memberModel.php';
    }else{
        include_once 'model/memberModel.php';
    }
    class memberController extends memberModel
    {
        private $member ;
        function __construct()
        {
            $this->member = new memberModel();
        }

        public function viewLoginMember()
        {
            include_once 'views/member/loginMember.php';
        }

        public function viewRegisterMember()
        {
            include_once 'views/member/registerMember.php';
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = "login";
            }

            switch ($method) {
                case 'loginMember':
                    $this->viewLoginMember();
                    if(isset($_POST['loginMember'])){
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $infoAccount = $this->member->loginMember($email, $email, $password);
                        if(!empty($infoAccount)){
                            $_SESSION['idMember'] = $infoAccount['id'];
                            $_SESSION['nameMember'] = $infoAccount['name'];
                            $_SESSION['emailMember'] = $infoAccount['email'];
                            $_SESSION['phoneMember'] = $infoAccount['phone'];
                            $_SESSION['addressMember'] = $infoAccount['address'];
                            $_SESSION['avatarMember'] = $infoAccount['avatar'];
                            $_SESSION['pointMember'] = $infoAccount['point'];
                            if(isset($_SESSION['checkLoginCheckout']) && $_SESSION['checkLoginCheckout'] == 1){
                                unset($_SESSION['checkLoginCheckout']);
                                header('Location: index.php?page=cart&method=checkoutCart');
                            }else{
                                header('Location: index.php?page=home');
                            }
                        }
                    }
                    break;
                case 'registerMember' :
                    $this->viewRegisterMember();
                    if(isset($_POST['registerMember'])){
                         $name =  $_POST['firstname']." ".$_POST['lastname'] ;
                         $fileUpload = $_FILES['fileUpload'] ;
                         $email = $_POST['email'] ;
                         $phone = $_POST['phone'] ;
                         $password = $_POST['password'] ;
                         $confipassword = $_POST['confipassword'];
                         $address = $_POST['place'] ;
                         $point = 0;
                         $checkExistsAcc = $this->member->checkExistsAcc($email ,$phone);
                         $avatar = time().$this->member->convert_name(($fileUpload['name']));
                         $formatFile = array("image/jpeg", "image/png" ,"image/jpg");
                         $type = $_FILES['fileUpload']['type'];
                         if(empty($checkExistsAcc)){
                            if(!empty($fileUpload['name']) && !empty($name) && !empty($email) && !empty($address) && !empty($phone) && !empty($password) && !empty($confipassword))
                            {
                                if($password == $confipassword){
                                    if(in_array($type, $formatFile)){
                                        move_uploaded_file($fileUpload['tmp_name'], 'assets/images/member/avatar' . $avatar);
                                        $this->member->registerMember($name,$avatar, $email, $phone, $password, $address, $point);
                                        header('Location: index.php?page=member&method=loginMember');
                                    }else{
                                        $_SESSION['error'] = "File up load không đúng định dạng!";
                                        header('Location: index.php?page=member&method=registerMember');
                                    }
                                }else{
                                    $_SESSION['error'] = "Xác thực mật khẩu không đúng!";
                                    header('Location: index.php?page=member&method=registerMember');
                                }
                            }else{
                                $_SESSION['error'] = "Bạn chưa nhập đủ thông tin";
                                header('Location: index.php?page=member&method=registerMember');
                            }
                         }else{
                            $_SESSION['error'] = "Email hoặc số điện thoại đã được đăng ký";
                            header('Location: index.php?page=member&method=registerMember');
                         }
                    }
                    break;
                default:
                    header("Location:404error.html");
                    break;
            }
        }
    } 
?>