<?php
    if(isset($useAjax)){
        include_once '../../model/womenModel.php';
    }else{
        include_once 'model/womenModel.php';
    }
    class womenController extends womenModel
    {
        private $women ;
        function __construct()
        {
            $this->women = new womenModel();
        }

        public function viewPageWomen()
        {
            $limit = 27;
            $links = 2;
            if(isset($_GET['cate_id']) && !empty($_GET['cate_id'])){
                $cate_id = $_GET['cate_id'];
                $countProductCate = $this->women->countCheckCate_m($cate_id);
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
                $prev = $pages - 1;
                $next = $pages + 1;
                $start = (($pages - $links ) > 0) ? $pages - $links : 1;
                $end = (($pages + $links ) < $count) ? $pages + $links : $count;
                $from = ($pages - 1) * $limit;
                $selectProduct = $this->women->selectCheckCate_m($cate_id, $from, $limit);
                include_once "views/women/viewPageWomen.php";
            }else{
                $countAllProduct = $this->women->countAllProduct_m();
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
                $getProductAllWomen = $this->women->getProductAllWomen($from, $limit);
                include_once "views/women/viewPageWomen.php";
            }
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = "viewPageWomen";
            }

            switch ($method) {
                case 'viewPageWomen':
                    $this->viewPageWomen();
                    break;
                default:
                    header("Location:404error.html");
                    break;
            }
        }
    } 
?>