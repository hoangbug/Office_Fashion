<?php
    if(isset($useAjax)){
        include_once '../../model/menModel.php';
    }else{
        include_once 'model/menModel.php';
    }
    class menController extends menModel
    {
        private $men ;
        function __construct()
        {
            $this->men = new menModel();
        }

        public function viewPageMen()
        {
            $limit = 27;
            $links = 2;
            if(isset($_GET['cate_id']) && !empty($_GET['cate_id'])){
                $cate_id = $_GET['cate_id'];
                $countProductCate = $this->men->countCheckCate_m($cate_id);
                $count = ceil($countProductCate['count'] / $limit);
                if(isset($_GET['pages']) && !empty($_GET['pages'])){
                    $pages = $_GET['pages'];
                    if($pages == 1 || $pages == $count){
                        $links = 4;
                    }elseif($pages == 2 || $pages == ($count - 1)){
                        $links = 3;
                    }
                }else{
                    $pages = 1;
                    $links = 4;
                }
                $countAllProduct = $this->men->countAllProduct_m();
                $prev = $pages - 1;
                $next = $pages + 1;
                $start = (($pages - $links ) > 0) ? $pages - $links : 1;
                $end = (($pages + $links ) < $count) ? $pages + $links : $count;
                $from = ($pages - 1) * $limit;
                $selectProduct = $this->men->selectCheckCate_m($cate_id, $from, $limit);
                include_once "views/men/viewPageMen.php";
            }else{
                $countAllProduct = $this->men->countAllProduct_m();
                $count = ceil($countAllProduct['countAll'] / $limit);
                if(isset($_GET['pages']) && !empty($_GET['pages'])){
                    $pages = $_GET['pages'];
                    if($pages == 1 || $pages == $count){
                        $links = 4;
                    }elseif($pages == 2 || $pages == ($count - 1)){
                        $links = 3;
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
                $getProductAllMen = $this->men->getProductAllMen($from, $limit);
                $countAllProduct = $this->men->countAllProduct_m();
                include_once "views/men/viewPageMen.php";
            }
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = "viewPageMen";
            }

            switch ($method) {
                case 'viewPageMen':
                    $this->viewPagemen();
                    break;
                default:
                    header("Location:404error.html");
                    break;
            }
        }
    } 
?>