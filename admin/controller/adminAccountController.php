<?php
    include_once "model/adminAccountModel.php";
    class adminAccountController extends adminAccountModel
    {
        private $adminAccount ;

        function __construct()
        {
            $this->adminAccount = new adminAccountModel();
        }

        //view login form
        public function viewLoginForm()
        {
            include_once "views/account/login.php";
        }

        //view login form
        public function viewRegisterForm()
        {
            include_once "views/account/register.php";
        }

        //check login
        public function checkLoginUser($emailOrPhone,$password)
        {
            return $this->adminAccount->loginAccountUser($emailOrPhone, $emailOrPhone,$password);
        }

        //check cookie
        public function checkCookie()
        {
            if (isset($_COOKIE['accountUser']) && isset($_COOKIE['mdPasswordUser'])) {
                $checkLoginUser = $this->adminAccount->loginAccountUser($_COOKIE['accountUser'],$_COOKIE['accountUser'], $_COOKIE['mdPasswordUser']);
                // echo "<pre>";
                // print_r($_COOKIE);
                // echo "</pre>";
                if (!empty($checkLoginUser)) {
                    setcookie('nameUser', $checkLoginUser['name'], time() + 604800);
                    setcookie('avatarUser', $checkLoginUser['avatar'], time() + 604800);
                    setcookie('emaildUser', $checkLoginUser['email'], time() + 604800);
                    setcookie('phonedUser', $checkLoginUser['phone'], time() + 604800);
                    setcookie('addressUser', $checkLoginUser['address'], time() + 604800);
                    setcookie('roleUser', $checkLoginUser['role'], time() + 604800);
                    // header("Location:index.php?page=home&method=home");
                } else{
                    setcookie('accountUser', "", time() - 604800);
                    setcookie('passwordUser', "", time() - 604800);
                    setcookie('mdPasswordUser', "", time() - 604800);
                    setcookie('nameUser', "", time() - 604800);
                    setcookie('avatarUser', "", time() - 604800);
                    setcookie('emaildUser', "", time() - 604800);
                    setcookie('phonedUser', "", time() - 604800);
                    setcookie('addressUser', "", time() - 604800);
                    setcookie('roleUser', "", time() - 604800);
                    setcookie('remember', "", time() - 604800);
                    header("Location:index.php?page=account&method=login");
                }
            }
            else{
                if(isset($_GET['method'])){
                    if($_GET['method'] != 'login' && $_GET['method'] != 'register'){
                        header("Location:index.php?page=account&method=login");
                    }
                }else{
                    header("Location:index.php?page=account&method=login");
                }
            }
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'login';
            }
            switch ($method) {
                // login UserAcount
                case 'login':
                    $this->viewLoginForm();
                    if(isset($_POST['loginUser'])){
                        $emailOrPhone = $_POST['emailOrPhone'];
                        $password = md5($_POST['password']);
                        $remember = $_POST['remember'];
                        $checkUserExist = $this->checkLoginUser($emailOrPhone,$password);
                        if(empty($checkUserExist)){
                            $_SESSION['checkError'] = "Tài khoản hoặc mật khẩu không chính xác";
                            header("Location:index.php?page=account&method=login");
                        }elseif(!empty($checkUserExist) && $checkUserExist['status'] == 0){
                            $_SESSION['checkError'] = "Tài khoản của bạn đang được chờ phê duyệt";
                            header("Location:index.php?page=account&method=login");
                        }elseif(!empty($checkUserExist) && $checkUserExist['status'] != 0){
                            setcookie('accountUser', $emailOrPhone, time() + 604800);
                            setcookie('passwordUser', $_POST['password'], time() + 604800);
                            setcookie('mdPasswordUser', $password, time() + 604800);
                            setcookie('idUser', $checkUserExist['id'], time() + 604800);
                            setcookie('nameUser', $checkUserExist['name'], time() + 604800);
                            setcookie('avatarUser', $checkUserExist['avatar'], time() + 604800);
                            setcookie('emaildUser', $checkUserExist['email'], time() + 604800);
                            setcookie('phonedUser', $checkUserExist['phone'], time() + 604800);
                            setcookie('addressUser', $checkUserExist['address'], time() + 604800);
                            setcookie('roleUser', $checkUserExist['role'], time() + 604800);

                            //lưu cookie account
                            if(isset($remember) && $remember == 1){
                                setcookie('remember', 1 , time() + 604800);
                            }else{
                                setcookie('remember', "", time() + 604800);
                            }

                            $checkProduct = $this->adminAccount->checkProduct_m();
                            if(!empty($checkProduct)){
                                foreach($checkProduct as $value){
                                    $id = $value['id'];
                                    $this->adminAccount->updateProduct_m($id);
                                }
                            }
                            header("Location: index.php");
                        }
                        // echo "<pre>";
                        // print_r($checkUserExist);
                        // echo "</pre>";
                    }
                    // setcookie('program_id', $arrCookie[0][0], time() + 604800);
                    break;

                //register UserAcount
                case 'register':
                    $this->viewRegisterForm();
                    if(isset($_POST['registerAccount'])){
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $password = md5($_POST['password']);
                        $avatar = $_FILES['avatar'];
                        $checkUserExist = $this->adminAccount->checkUserExist($email, $phone);

                        if(empty($checkUserExist)){
                            if(!empty($name) && !empty($phone) && !empty($email) && !empty($address) && !empty($password)){
                                $img   = time().$this->adminAccount->convert_name($avatar['name']);
                                $tmp_name    = $avatar['tmp_name'];
                                move_uploaded_file($tmp_name, "assets/images/users/".$img);
                                $this->adminAccount->registerAccountUser($name, $img, $email, $phone, $address, $password);
                                $_SESSION['checkError'] = "Đăng ký thành công";
                                header("Location:index.php?page=account&method=login");
                            }
                        }else{
                            $_SESSION['checkUserExist'] = 1;
                            header("Location:index.php?page=account&method=register");
                        }
                        
                    }
                    break;
                case 'logout' :
                    setcookie('idUser', '', time() - 604800);
                    setcookie('mdPasswordUser', '', time() - 604800);
                    setcookie('accountUser',"", time() - 604800);
                    setcookie('passwordUser', "",time() - 604800);
                    setcookie('nameUser',"" , time() - 604800);
                    setcookie('avatarUser',"" , time() - 604800);
                    setcookie('emaildUser', "", time() - 604800);
                    setcookie('phonedUser', "", time() - 604800);
                    setcookie('addressUser',"" , time() - 604800);
                    setcookie('roleUser',"", time() - 604800);
                    setcookie('remember', "", time() - 604800);
                    header("Location:index.php?page=account&method=login");
                    break;
                default:
                header("Location:../404error.html");
                    break;
            }
        }
    }
?>