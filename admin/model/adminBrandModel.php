<?php
    if(isset($useAjax)){
        include_once '../../../config/myconfig.php';
    }else{
        include_once '../config/myconfig.php';
    }
    
    class adminBrandModel extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

        //convert name img 
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

        // add Brand
        protected function addBrandModel($name_brand, $avatar)
        {
            $sql = "INSERT INTO `tbl_brand`(`name_brand`, `avatar`) VALUES (:name_brand, :avatar)";
            $result = $this->pdo->prepare($sql) ;
            $result->bindParam(":name_brand", $name_brand);
            $result->bindParam(":avatar", $avatar);
            $result->execute();
        }

        //select Brand
        protected function getBrandModel()
        {
            $sql = "SELECT `id`, `name_brand`, `avatar`, `views`, `status`, `created_at` FROM `tbl_brand`";
            $result = $this->pdo->prepare($sql) ;
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function getOneBrandModel($id)
        {
            $sql = "SELECT `id`, `name_brand`, `avatar`, `views`, `status`, `created_at` FROM `tbl_brand` WHERE `id` =  :id";
            $result = $this->pdo->prepare($sql) ;
            $result->bindParam(":id", $id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        // update brand
        protected function updateOneBrandModel($id, $avatar, $name_brand, $status){
            $sql = "UPDATE `tbl_brand` SET `id`=:id,`name_brand`=:name_brand,`avatar`=:avatar,`status`=:status WHERE `id`=:id";
            $result = $this->pdo->prepare($sql) ;
            $result->bindParam(":avatar", $avatar);
            $result->bindParam(":name_brand", $name_brand);
            $result->bindParam(":id", $id);
            $result->bindParam(":status", $status);
            $result->execute();
        }

        //delete brand
        protected function deleteBrandModel($id)
        {
            $sql = "DELETE FROM `tbl_brand` WHERE `id` = :id";
            $result = $this->pdo->prepare($sql) ;
            $result->bindParam(":id", $id);
            $result->execute();
        }
    }
?>