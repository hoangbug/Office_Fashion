<?php
    if(isset($useAjax)){
        include_once '../../model/homeModel.php';
    }else{
        include_once 'model/homeModel.php';
    }
    // include_once 'model/homeModel.php' ;
    class homeController extends homeModel
    {
        private $home ;
        
        function __construct()
        {
            $this->home = new homeModel();
            $this->checkAcc();
        }
        
        function checkAcc(){
            if(!isset($_GET['page']) || !isset($_GET['method']) || empty($_GET['page']) || empty($_GET['method']) || $_GET['method'] != 'programAffiliate' || $_GET['page'] != 'affiliate' || $_GET['method'] != 'programManage' || $_GET['method'] != 'turnOverAffiliate'){
                if(isset($_SESSION['emailAffiliate'])){
                    header("Location: index.php?page=affiliate&method=programAffiliate");
                }
            }
        }

        public function viewHome()
        {
            if(isset($_GET['search']) && !empty($_GET['search'])){
                $search = $_GET['search'];
                $limit = 24;
                $links = 2;
                $countAllProduct = $this->home->selectCountRow_m($search);
                $count = ceil($countAllProduct['countAll'] / $limit);
                if(isset($_GET['pages']) && !empty($_GET['pages'])){
                    $pages = $_GET['pages'];
                    if($pages == 1 || $pages == $count){
                        $links = 4;
                    }elseif($pages == 2 || $pages == ($count - 1)){
                        $links = 3;
                    }else{
                    }
                }else{
                    $pages = 1;
                    $links = 4;
                }
                $prev = $pages - 1;
                $next = $pages + 1;
                $start = (($pages - $links ) > 0) ? $pages - $links : 1;
                $end = (($pages + $links ) < $count) ? $pages + $links : $count;
                $from = ($pages - 1) * $limit;
                $getProductAllWomen = $this->home->selectProductSearch_m($search, $from, $limit);
                include_once 'views/products/viewProduct.php';
            }else{
                $selectProductNew = $this->home->getProductNew_m();
                $selectProductBest = $this->home->getProductBest_m();
                $selectProductHot = $this->home->getProductHot_m();
                $selectBlogHot = $this->home->paginationBlog_m();
                $selectProductSet = $this->home->selectProductSet_m();
                include_once 'views/home/home.php';

            }
        }

        public function selectBrand_c()
        {
            return $this->home->selectbrand_m();
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = "home";
            }

            switch ($method) {
                case 'home':
                    $this->viewHome();
                    break;
                default:
                    header("Location:404error.html");
                    break;
            }
        }
    } 
?>