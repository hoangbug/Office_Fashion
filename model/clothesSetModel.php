<?php
    if(isset($useAjax)){
        include_once '../../config/myconfig.php';
    }else{
        include_once 'config/myconfig.php' ;
    }

    class clothesSetModel extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

        protected function getProductAllSet($from, $limit)
        {
            $sql = "SELECT * FROM `tbl_product_sets` ORDER BY views DESC LIMIT  $from, $limit";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* count product
        protected function countAllProduct_m(){
            $sql = "SELECT COUNT(tbl_product_sets.id) AS 'countAll' FROM tbl_product_sets";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* product set id
        protected function selectProductSetId_m($id){
            $sql = "SELECT tbl_product_sets.id, tbl_product_sets.brand_id, tbl_product_sets.product_name_sets, tbl_product_sets.image_sets, tbl_product_sets.price, tbl_product_sets.description, tbl_product_sets.sale, tbl_product_sets.views, tbl_product_sets.status, tbl_product_sets.created_at FROM tbl_product_sets, tbl_products, tbl_detail_size, tbl_detail_images WHERE tbl_product_sets.id=tbl_products.product_sets_id AND tbl_products.id=tbl_detail_size.product_id AND tbl_products.id=tbl_detail_images.product_id AND tbl_product_sets.id =:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* select images set
        protected function selectSetImg_m($id){
            $sql = "SELECT tbl_detail_images.sub_images FROM tbl_product_sets, tbl_products, tbl_detail_images WHERE tbl_product_sets.id=tbl_products.product_sets_id AND tbl_products.id=tbl_detail_images.product_id AND tbl_product_sets.id =:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select set size
        protected function selectSetSize_m($id){
            $sql = "SELECT tbl_products.id, tbl_products.name, tbl_detail_size.name_size, tbl_detail_size.quantity FROM tbl_products, tbl_detail_size WHERE tbl_products.id=tbl_detail_size.product_id AND tbl_products.product_sets_id =:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select product size
        protected function selectProductSize_m($id){
            $sql = "SELECT tbl_products.id, tbl_products.name, tbl_detail_size.name_size, tbl_detail_size.quantity FROM tbl_products, tbl_detail_size WHERE tbl_products.id=tbl_detail_size.product_id AND tbl_products.id =:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>