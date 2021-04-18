<?php
    if(isset($useAjax)){
        include_once '../../../config/myconfig.php';
    }else{
    include_once '../config/myconfig.php';
    }
    class adminHomeModel extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

        //* select ajax search
        protected function selectSearchAdmin_m($search){
            $sql = "SELECT tbl_products.id, tbl_products.name, tbl_products.main_image, tbl_products.price, tbl_products.sale FROM tbl_products WHERE tbl_products.name LIKE '%$search%' ORDER BY tbl_products.views DESC LIMIT 0,5";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select submit product search
        protected function selectSearchSubmit_m($search){
            $sql = "SELECT tbl_products.id, tbl_category_products.name_cate, tbl_brand.name_brand, tbl_product_sets.id AS 'product_sets', tbl_product_sets.product_name_sets, tbl_products.name, tbl_products.main_image, tbl_products.price, tbl_products.description, tbl_products.sale, tbl_products.views, tbl_products.status, tbl_products.created_at, tbl_products.updated_at FROM tbl_products LEFT OUTER JOIN tbl_category_products ON tbl_category_products.id = tbl_products.cate_pro_id LEFT OUTER JOIN tbl_brand ON tbl_brand.id = tbl_products.brand_id LEFT OUTER JOIN tbl_product_sets ON tbl_product_sets.id = tbl_products.product_sets_id WHERE tbl_products.name LIKE '%$search%'";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select tbl_decentralization_user
        protected function selectDecentralization_m($user_id){
            $sql = "SELECT tbl_decentralization.decentralization FROM tbl_decentralization_user, tbl_decentralization WHERE tbl_decentralization_user.decentralization_id = tbl_decentralization.id AND tbl_decentralization_user.user_id =:user_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":user_id", $user_id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>