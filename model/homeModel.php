<?php
    if(isset($useAjax)){
        include_once '../../config/myconfig.php';
    }else{
    // include_once '../config/myconfig.php';
    include_once 'config/myconfig.php' ;
    }
    class homeModel extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

        protected function getProductNew_m(){
            $sql = "SELECT `id`, `name`, `main_image`, `price`, `sale`, `status` FROM `tbl_products` WHERE `status` = 2 ORDER BY RAND() LIMIT 0, 8";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function getProductBest_m(){
            $sql = "SELECT `id`, `name`, `main_image`, `price`, `sale`, `status` FROM `tbl_products` WHERE `status` = 3 ORDER BY RAND() LIMIT 0, 8";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function getProductHot_m(){
            $sql = "SELECT `id`, `name`, `main_image`, `price`, `sale`, `status` FROM `tbl_products` WHERE `status` = 4 ORDER BY RAND() LIMIT 0, 8";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function paginationBlog_m(){
            $sql = "SELECT * FROM `tbl_blogs` ORDER BY views DESC LIMIT 0,4";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* count row search
        protected function selectCountRow_m($search){
            $sql = "SELECT COUNT(tbl_products.id) AS 'countAll' FROM tbl_products WHERE tbl_products.name LIKE '%$search%'";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* select product search
        protected function selectProductSearch_m($search, $from, $limit){
            $sql = "SELECT tbl_products.id, tbl_category_products.name_cate, tbl_brand.name_brand, tbl_products.name, tbl_products.main_image, tbl_products.price, tbl_products.description, tbl_products.sale, tbl_products.views, tbl_products.status, tbl_products.created_at, tbl_products.updated_at FROM tbl_products, tbl_category_products, tbl_brand WHERE tbl_products.cate_pro_id = tbl_category_products.id AND tbl_products.brand_id = tbl_brand.id AND tbl_products.name LIKE '%$search%' ORDER BY tbl_products.views DESC LIMIT $from, $limit";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select set product
        protected function selectProductSet_m(){
            $sql = "SELECT * FROM `tbl_product_sets` ORDER BY tbl_product_sets.views DESC LIMIT 10";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select brand
        protected function selectbrand_m(){
            $sql = "SELECT * FROM `tbl_brand` ORDER BY RAND() LIMIT 10";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>