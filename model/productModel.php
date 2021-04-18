<?php
    if(isset($useAjax)){
        include_once '../../config/myconfig.php';
    }else{
        include_once 'config/myconfig.php' ;
    }

    class productModel extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

        protected function getProductAll_m(){
            $sql = "SELECT `id`, `name`, `main_image`, `price`, `sale`, `status` FROM `tbl_products` ORDER BY RAND() LIMIT 0, 16";
            $result = $this->pdo->prepare($sql);
            // $result->bindParam(":status", $status);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // select related products
        protected function selectAllCateProduct_m($cate_pro_id)
        {
            $sql = "SELECT tbl_products.id, tbl_category_products.name_cate, tbl_brand.name_brand, tbl_products.name, tbl_products.main_image, tbl_products.price, tbl_products.description, tbl_products.sale, tbl_products.views, tbl_products.status, tbl_products.created_at, tbl_products.updated_at FROM tbl_products, tbl_category_products, tbl_brand WHERE tbl_products.cate_pro_id = tbl_category_products.id AND tbl_products.brand_id = tbl_brand.id  AND tbl_products.cate_pro_id = :cate_pro_id LIMIT 8";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":cate_pro_id", $cate_pro_id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //! Select all on product set
        protected function selectAllSetProduct_m($product_sets_id)
        {
            $sql = "SELECT tbl_products.id, tbl_category_products.name_cate, tbl_brand.name_brand, tbl_products.name, tbl_products.main_image, tbl_products.price, tbl_products.description, tbl_products.sale, tbl_products.views, tbl_products.status, tbl_products.created_at, tbl_products.updated_at FROM tbl_products, tbl_category_products, tbl_brand WHERE tbl_products.cate_pro_id = tbl_category_products.id AND tbl_products.brand_id = tbl_brand.id  AND tbl_products.product_sets_id = :product_sets_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":product_sets_id", $product_sets_id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }


        //! Select all on id
        protected function selectAllId_m($id)
        {
            $sql = "SELECT tbl_products.id, tbl_category_products.name_cate, tbl_products.cate_pro_id, tbl_brand.name_brand, tbl_products.product_sets_id, tbl_products.name, tbl_products.main_image, tbl_products.price, tbl_products.description, tbl_products.sale, tbl_products.views, tbl_products.status, tbl_products.created_at, tbl_products.updated_at FROM tbl_products, tbl_category_products, tbl_brand WHERE tbl_products.cate_pro_id = tbl_category_products.id AND tbl_products.brand_id = tbl_brand.id AND tbl_products.id=:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        // get detail image product
        protected function getDetailImagesProduct($product_id)
        {
            $sql = "SELECT * FROM `tbl_detail_images` WHERE `product_id` = :product_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":product_id", $product_id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //get detail quantity size
        protected function getQuantitySizeProduct($product_id)
        {
            $sql ="SELECT `id`, `product_id`, `name_size`, `quantity` FROM `tbl_detail_size` WHERE `product_id` = :product_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":product_id", $product_id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // lấy url
        protected function getCurURL()
        {
            // Kiểm tra xem giao thức web là http hay https
            if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
                $pageURL = "https://";
            } else {
                $pageURL = 'http://';
            }
 
            // Lấy url hiện tại, cái lúc trước bị thiếu cái $_SERVER["REQUEST_URI"];
            if (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
            } else {
                $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
            }
            return $pageURL;
        }

        //* Convert images
        protected function convert_name($str) {
            $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
            $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
            $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
            $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
            $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
            $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
            $str = preg_replace("/(đ)/", 'd', $str);
            $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
            $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
            $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
            $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
            $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
            $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
            $str = preg_replace("/(Đ)/", 'D', $str);
            $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
            $str = preg_replace("/( )/", '-', $str);
            return $str;
        }

        //* insert comments product
        protected function addComment_m($product_id, $member_id, $content){
            $sql = "INSERT INTO `tbl_comments`(`product_id`, `member_id`, `content`) VALUES (:product_id, :member_id, :content)";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":product_id", $product_id);
            $result->bindParam(":member_id", $member_id);
            $result->bindParam(":content", $content);
            $result->execute();
        }

        //* insert comments product sets
        protected function addCommentSet_m($product_sets_id, $member_id, $content){
            $sql = "INSERT INTO `tbl_comments`(`product_sets_id`, `member_id`, `content`) VALUES (:product_sets_id, :member_id, :content)";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":product_sets_id", $product_sets_id);
            $result->bindParam(":member_id", $member_id);
            $result->bindParam(":content", $content);
            $result->execute();
        }

        //* select id comment
        protected function selectCommentId_m($member_id){
            $sql = "SELECT tbl_comments.id FROM tbl_comments, tbl_member WHERE tbl_comments.member_id = tbl_member.id AND tbl_member.id =:member_id ORDER BY tbl_comments.id DESC";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":member_id", $member_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* insert comment image product
        protected function addCommentImage_m($comment_id, $sub_images){
            $sql = "INSERT INTO `tbl_comments_detail`(`comment_id`, `sub_images`) VALUES (:comment_id, :sub_images)";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":comment_id", $comment_id);
            $result->bindParam(":sub_images", $sub_images);
            $result->execute();
        }

        //* select comment on product id
        protected function selectCommentProduct_m($product_id, $from, $limit){
            $sql = "SELECT tbl_comments.id, tbl_comments.product_id, tbl_comments.member_id, tbl_comments.content, tbl_comments.updated_at, tbl_member.name FROM tbl_comments INNER JOIN tbl_member ON tbl_comments.member_id = tbl_member.id INNER JOIN tbl_products ON tbl_comments.product_id = tbl_products.id WHERE tbl_products.id =:product_id AND tbl_comments.status = 1 GROUP BY tbl_comments.id DESC LIMIT $from, $limit";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":product_id", $product_id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* count all comment on product
        protected function countCommentProduct_m($product_id){
            $sql = "SELECT COUNT(tbl_comments.id) AS 'countAll' FROM tbl_comments, tbl_products WHERE tbl_comments.product_id = tbl_products.id AND tbl_products.id =:product_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":product_id", $product_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* select image product comment id
        protected function selectImageComment_m($id){
            $sql = "SELECT tbl_comments_detail.sub_images FROM tbl_comments_detail, tbl_comments WHERE tbl_comments_detail.comment_id = tbl_comments.id AND tbl_comments.id =:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* live search ajax product
        protected function liveSearchAjax_m($search){
            $sql = "SELECT tbl_products.id, tbl_products.main_image, tbl_products.name, tbl_products.price, tbl_products.sale FROM tbl_products WHERE tbl_products.name LIKE '%$search%' ORDER BY tbl_products.id DESC LIMIT 0, 5";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>