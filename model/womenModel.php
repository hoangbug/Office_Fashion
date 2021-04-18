<?php
    if(isset($useAjax)){
        include_once '../../config/myconfig.php';
    }else{
        include_once 'config/myconfig.php' ;
    }

    class womenModel extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

        protected function getProductAllWomen($from, $limit)
        {
            $sql = "SELECT tbl_products.id, tbl_category_products.name_cate, tbl_brand.name_brand, tbl_products.name, tbl_products.main_image, tbl_products.price, tbl_products.description, tbl_products.sale, tbl_products.views, tbl_products.status, tbl_products.created_at, tbl_products.updated_at FROM tbl_products, tbl_category_products, tbl_brand WHERE tbl_products.cate_pro_id = tbl_category_products.id AND tbl_products.brand_id = tbl_brand.id AND tbl_category_products.gender_product = 1 ORDER BY tbl_products.views DESC LIMIT $from, $limit";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* count product
        protected function countAllProduct_m(){
            $sql = "SELECT COUNT(tbl_products.id) AS 'countAll' FROM tbl_products, tbl_category_products, tbl_brand WHERE tbl_products.cate_pro_id = tbl_category_products.id AND tbl_products.brand_id = tbl_brand.id AND tbl_category_products.gender_product = 1";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* select Check Cate -> products
        protected function selectCheckCate_m($cate_id, $from, $limit){
            $sql = "SELECT tbl_products.id, tbl_products.name, tbl_products.main_image, tbl_products.price, tbl_products.sale, tbl_products.status FROM tbl_program_sell, tbl_ratio_rose, tbl_category_products, tbl_products WHERE tbl_program_sell.rose_id = tbl_ratio_rose.id AND tbl_ratio_rose.cate_pro_id = tbl_category_products.id AND tbl_category_products.id = tbl_products.cate_pro_id AND tbl_products.cate_pro_id =:cate_id ORDER BY tbl_products.id DESC LIMIT $from, $limit";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":cate_id", $cate_id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
        
        //* count select Check Cate -> products
        protected function countCheckCate_m($cate_id){
            $sql = "SELECT COUNT(tbl_products.id) AS 'count' FROM tbl_program_sell, tbl_ratio_rose, tbl_category_products, tbl_products WHERE tbl_program_sell.rose_id = tbl_ratio_rose.id AND tbl_ratio_rose.cate_pro_id = tbl_category_products.id AND tbl_category_products.id = tbl_products.cate_pro_id AND tbl_products.cate_pro_id =:cate_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":cate_id", $cate_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }
       
    }

?>