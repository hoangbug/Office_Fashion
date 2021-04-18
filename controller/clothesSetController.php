<?php
    if(isset($useAjax)){
        include_once '../../model/clothesSetModel.php';
    }else{
        include_once 'model/clothesSetModel.php';
    }
    class clothesSetController extends clothesSetModel
    {
        private $clothesSet ;
        function __construct()
        {
            $this->clothesSet = new clothesSetModel();
        }

        public function viewSetClothes_c()
        {
            $limit = 27;
            $links = 2;
            $countAllProduct = $this->clothesSet->countAllProduct_m();
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
            $getProductAllMen = $this->clothesSet->getProductAllSet($from, $limit);
            include_once "views/setClothes/viewSetClothes.php";
        }

        public function productDetailSet_c()
        {
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];
                // $countCmt = $this->clothesSet->countCommentProduct_m($id);
                $selectProductId = $this->clothesSet->selectProductSetId_m($id);
                $selectSetImg = $this->clothesSet->selectSetImg_m($id);
                $selectSetSize = $this->clothesSet->selectSetSize_m($id);
                foreach($selectSetSize as $value){
                    $product_id =$value['id'];
                    $getQuantitySizeProduct = $this->clothesSet->selectProductSize_m($product_id);
                }
                include_once 'views/setClothes/productDetailSet.php';
            }
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'viewsSetclothes';
            }
            switch($method){
                case 'viewsSetclothes':
                    $this->viewSetClothes_c();
                    break;
                case 'productDetailSet':
                    $this->productDetailSet_c();
                    break;
                default:
                    // code
                    break;
            }
        }
    }
?>