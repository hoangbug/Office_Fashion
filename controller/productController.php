<?php
    if(isset($useAjax)){
        include_once '../../model/productModel.php';
    }else{
        include_once 'model/productModel.php';
    }
    class productController extends productModel
    {
        private $product ;
        function __construct()
        {
            $this->product = new productModel();
        }

        public function viewProduct_c()
        {
            $selectAllProduct = $this->product->getProductAll_m();
            include_once 'views/products/viewProduct.php';
            
        }

        public function selectAllId_c($id){
            return $this->product->selectAllId_m($id);
        }

        public function getDetailImagesProduct_c($id){
            return $this->product->getDetailImagesProduct($id);
        }

        public function getQuantitySizeProduct_c($id){
            return $this->product->getQuantitySizeProduct($id);
        }

        public function getCurURL_c(){
            return $this->product->getCurURL();
        }
        
        public function quickViewProduct($id)
        {
                $selectProductId = $this->selectAllId_c($id);
                $getDetailImagesProduct = $this->getDetailImagesProduct_c($id);
                $getQuantitySizeProduct = $this->getQuantitySizeProduct_c($id);
                $getUrl = $this->getCurURL_c();
        }
        
        public function productDetail_c()
        {
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $id = (int)$_GET['id'];
                $countCmt = $this->product->countCommentProduct_m($id);
                // $_SESSION['count_cmt'] = $countCmt['countAll'];
                $selectProductId = $this->product->selectAllId_m($id);
                $selectAllSetProduct = $this->product->selectAllSetProduct_m($selectProductId['product_sets_id']);
                $selectAllCateProduct = $this->product->selectAllCateProduct_m($selectProductId['cate_pro_id']);
                $getDetailImagesProduct = $this->product->getDetailImagesProduct($id);
                $getQuantitySizeProduct = $this->product->getQuantitySizeProduct($id);
                // $getUrl = $this->product->getCurURL();
                include_once 'views/products/productDetail.php';
            }
        }

        public function addComment_c($product_id, $member_id, $content)
        {
            $this->product->addComment_m($product_id, $member_id, $content);
        }

        public function convert_name_c($name){
            return $this->product->convert_name($name);
        }

        public function addCommentImage_c($comment_id, $sub_images){
            $this->product->addCommentImage_m($comment_id, $sub_images);
        }

        public function selectCommentId_c($member_id){
            return $this->product->selectCommentId_m($member_id);
        }

        //* Pagination comment product
        public function selectCommentProduct_c($product_id, $from, $limit){
            return $this->product->selectCommentProduct_m($product_id, $from, $limit);
        }

        //* count all comment on product id
        public function countCommentProduct_c($product_id) {
            return $this->product->countCommentProduct_m($product_id);
        }

        //* select image product comment id
        public function selectImageComment_c($id) {
            return $this->product->selectImageComment_m($id);
        }

        //* live search ajax limit 5
        public function liveSearchAjax_c($search){
            return $this->product->liveSearchAjax_m($search);
        }

        public function viewWishlist()
        {
            include_once 'views/products/wishlist.php';
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = "viewProduct";
            }

            switch ($method) {
                case 'viewProduct':
                    $this->viewProduct_c();
                    break;
                case 'productDetail':
                    $this->productDetail_c();
                    //* comment
                    // if(isset($_POST['submitComment']) && isset($_GET['id'])){
                    //     $product_id = $_GET['id'];
                    //     if(isset($_FILES['fileUpload'])){
                    //         $fileUpload = $_FILES['fileUpload'];
                    //     }
                    //     $countImg = count($fileUpload['name']);
                    //     $formatFile = array("image/jpeg", "image/png", "image/jpg");
                    //     $type = $_FILES['fileUpload']['type'];
                    //     $content = $_POST['comment'];
                    //     if(!empty($content)){
                    //         if(isset($_SESSION['idMember']) && !empty($_SESSION['idMember'])){
                    //             $member_id = $_SESSION['idMember'];
                    //             for ($i=0; $i < $countImg; $i++) { 
                    //                 if(in_array($fileUpload['type'][$i], $formatFile)){
                    //                     $nameSubimage =  time() . $this->product->convert_name($fileUpload['name'][$i]);
                    //                     move_uploaded_file($fileUpload['tmp_name'][$i], 'assets/images/comments/' . $nameSubimage);
                    //                     $this->product->addComment_m($product_id, $member_id, $content);
                    //                 }
                    //             }
                    //         }else{
                    //             $_SESSION['error'] = "Bạn chưa đăng nhập, Hãy đăng nhập!";
                    //             header('Location: index.php?page=member&method=loginMember');
                    //         }
                    //     }
                    // }
                    break;
                case 'wishlist' : 
                    $this->viewWishlist();
                    break; 
                default:
                    header("Location:404error.html");
                    break;
            }
        }

    } 
?>