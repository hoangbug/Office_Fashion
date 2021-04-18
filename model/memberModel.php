<?php
    if(isset($useAjax)){
        include_once '../../config/myconfig.php';
    }else{
        include_once 'config/myconfig.php' ;
    }

    class memberModel extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

        //check exists account member
        protected function checkExistsAcc($email ,$phone)
        {
            $sql = "SELECT * FROM `tbl_member` WHERE `email` = :email OR `phone` = :phone";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":phone", $phone);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        protected function registerMember($name, $avatar, $email, $phone, $password, $address, $point)
        {
            $sql = "INSERT INTO `tbl_member`(`name` ,`avatar`, `email`, `phone`, `password`, `address`, `point`) VALUES (:name, :avatar , :email, :phone, :password, :address, :point)";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":name", $name);
            $result->bindParam(":email", $email);
            $result->bindParam(":avatar", $avatar);
            $result->bindParam(":phone", $phone);
            $result->bindParam(":password", $password);
            $result->bindParam(":address", $address);
            $result->bindParam(":point", $point);
            $result->execute();
        }

        protected function loginMember($email, $phone, $password)
        {
            $sql = "SELECT * FROM `tbl_member` WHERE `phone` = :phone OR `email` = :email AND `password` = :password";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":phone", $phone);
            $result->bindParam(":password", $password);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
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
       
    }

?>