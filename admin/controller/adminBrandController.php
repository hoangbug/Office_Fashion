<?php
    if(isset($useAjax)){
        include_once '../../model/adminBrandModel.php';
    }else{
        include_once 'model/adminBrandModel.php';
    }
    class adminBrandController extends adminBrandModel
    {
        private $adminBrand;
        function __construct()
        {
            $this->adminBrand = new adminBrandModel();
        }
        //content page
        //page listBrand
        public function viewListBrand()
        {
            $listBrand = $this->adminBrand->getBrandModel();
            include_once 'views/brand/listBrand.php';
        }

        //select one brand
        public function getOneBrand($id)
        {
            return $this->adminBrand->getOneBrandModel($id);;
        }


        // location page
        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'listBrand';
            }

            switch ($method) {
                // list brand
                case 'listBrand':
                   $this->viewListBrand();
                   if(isset($_POST['updateBrand'])){
                    $avatarCurent = $_POST['avatarCurent'];
                    $name_brand = $_POST['name_brand'];
                    $id = $_POST['id'];
                    $status = $_POST['status'];
                    $avatar = $_FILES['avatar'];
                        if(!empty($name_brand) && !empty($id) && !empty($avatar['name'])){
                            $img      = time().$this->adminBrand->convert_name($avatar['name']);
                            $tmp_name    = $avatar['tmp_name'];
                            move_uploaded_file($tmp_name, "../assets/images/brand/".$img);
                            unlink("../assets/images/brand/$avatarCurent");
                            $this->adminBrand->updateOneBrandModel($id, $img, $name_brand, $status);
                            $_SESSION['updateBrand'] = 1;
                            header("Location:index.php?page=brand&method=listBrand");
                        }elseif(!empty($name_brand) && !empty($id) && empty($avatar['name'])){
                            $this->adminBrand->updateOneBrandModel($id, $avatarCurent, $name_brand, $status);
                            $_SESSION['updateBrand'] = 1;
                            header("Location:index.php?page=brand&method=listBrand");
                        }
                    }elseif(isset($_POST['addBrand'])){
                        $name_brand = $_POST['name_brand'];
                        $avatar = $_FILES['avatar'];
                        if(!empty($name_brand) && !empty($avatar['name'])){
                            $img      = time().$this->adminBrand->convert_name($avatar['name']);
                            $tmp_name    = $avatar['tmp_name'];
                            move_uploaded_file($tmp_name, "../assets/images/brand/".$img);
                            $this->adminBrand->addBrandModel($name_brand, $img);
                        
                        $_SESSION['checkBrand'] = 1;
                        header("Location:index.php?page=brand&method=listBrand");
                        }
                    }
                    break;
                case 'deleteBrand':
                    if(isset($_GET['id']) && !empty($_GET['id'])){
                        $id = (int)$_GET['id'];
                        $brandDetail = $this->adminBrand->getOneBrandModel($id);
                        $img = $brandDetail['avatar'] ;
                        unlink("../assets/images/brand/$img");
                        $this->adminBrand->deleteBrandModel($id);
                        $_SESSION['deleteBrand'] = 1;
                        header("Location:index.php?page=brand&method=listBrand");
                    }
                    break;
                default:
                header("Location:../404error.html");
                    break;
            }
        }
    }

?>