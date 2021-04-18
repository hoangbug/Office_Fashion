<?php
if(isset($useAjax)){
    include_once '../../../config/myconfig.php';
}else{
    include_once '../config/myconfig.php';
}
class manageCodeModel extends Connect{
    function __construct()
    {
        parent::__construct();
    }

    //* insert change code
    protected function insertChangeCode_m($cate_id, $title, $type_code, $money_xu){
        $sql = "INSERT INTO `tbl_change_code`(`cate_id`, `title`, `type_code`, `money_xu`) VALUES (:cate_id, :title, :type_code, :money_xu)";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":cate_id", $cate_id);
        $result->bindParam(":title", $title);
        $result->bindParam(":type_code", $type_code);
        $result->bindParam(":money_xu", $money_xu);
        $result->execute();
    }

    //* select change code
    protected function selectChangeCode_m(){
        $sql = "SELECT tbl_change_code.id, tbl_change_code.cate_id, tbl_change_code.title,tbl_change_code.type_code, tbl_change_code.money_xu, tbl_change_code.status, tbl_change_code.created_at, tbl_change_code.updated_at, tbl_category_products.name_cate FROM tbl_change_code, tbl_category_products WHERE tbl_change_code.cate_id = tbl_category_products.id";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //* Select all category
    protected function selectAllCategory_m(){
        $sql = "SELECT * FROM `tbl_category_products`";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>