<?php
if(isset($useAjax)){
    include_once '../../../config/myconfig.php';
}else{
    include_once '../config/myconfig.php';
}
class cateBlogsModel extends Connect{
    function __construct()
    {
        parent::__construct();
    }

    //* Insert category
    protected function categoryInsert_m($name_cate){
        $sql = "INSERT INTO `tbl_category_blogs`(`name_cate`) VALUES (:nameCate)";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":nameCate", $name_cate);
        $result->execute();
    }

    //* Update category
    protected function categoryUpdate_m($id, $name_cate, $status){
        $sql = "UPDATE `tbl_category_blogs` SET `name_cate`=:nameCate, `status`=:status WHERE `id`=:id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $id);
        $result->bindParam(":nameCate", $name_cate);
        $result->bindParam(":status", $status);
        $result->execute();
    }

    //* Delete category
    protected function categoryDelete_m($id){
        $sql = "DELETE FROM `tbl_category_blogs` WHERE `id`=:id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
    }

    //* Select all category
    protected function selectAllCategory_m(){
        $sql = "SELECT * FROM `tbl_category_blogs`";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //* Select category on id
    protected function selectOneCategory_m($id){
        $sql = "SELECT * FROM `tbl_category_blogs` WHERE `id`=:id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    
    //* Select category on name
    protected function selectOneNameCategory_m($name_cate){
        $sql = "SELECT * FROM `tbl_category_blogs` WHERE `name_cate`=:name";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":name", $name_cate);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
}
?>
