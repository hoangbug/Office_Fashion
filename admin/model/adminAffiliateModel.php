<?php
    if(isset($useAjax)){
        include_once '../../../config/myconfig.php';
    }else{
        include_once '../config/myconfig.php';
    }
    
    class affiliateModel extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

        //* insert affiliate
        protected function affiliateInsert_m($image, $title, $rose, $description){
            $sql = "INSERT INTO `tbl_program_sell`(`image`, `title`, `rose`, `description`) VALUES (:image, :title, :rose, :description)";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":image", $image);
            $result->bindParam(":title", $title);
            $result->bindParam(":rose", $rose);
            $result->bindParam(":description", $description);
            $result->execute();
        }

        //* update affiliate
        protected function affiliateUpdate_m($id, $image, $title, $rose, $description, $status){
            $sql = "UPDATE `tbl_program_sell` SET `image`=:image,`title`=:title,`rose`=:rose,`description`=:description,`status`=:status,`updated_at`=NOW() WHERE `id`=:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->bindParam(":image", $image);
            $result->bindParam(":title", $title);
            $result->bindParam(":rose", $rose);
            $result->bindParam(":description", $description);
            $result->bindParam(":status", $status);
            $result->execute();
        }

        //* delete affiliate
        protected function affiliateDelete_m($id){
            $sql = "DELETE FROM `tbl_program_sell` WHERE `id`=:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
        }

        //* select all affiliate
        protected function affiliateSelectAll_m(){
            $sql = "SELECT * FROM `tbl_program_sell`";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select one affiliate
        protected function affiliateSelectOne_m($id){
            $sql = "SELECT * FROM `tbl_program_sell` WHERE `id`=:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* convert name img 
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

        //* select all account affiliate
        protected function accountSelectAll_m(){
            $sql = "SELECT * FROM `tbl_affiliate_partner`";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select one account affiliate
        protected function accountSelectOne_m($id){
            $sql = "SELECT * FROM `tbl_affiliate_partner` WHERE `id`=:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select one account affiliate on email
        protected function accountCheckEmail_m($email){
            $sql = "SELECT * FROM `tbl_affiliate_partner` WHERE `email`=:email";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":email", $email);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* update account affiliate
        protected function updateAccount_m($id, $avatar, $firstname, $lastname, $email, $profession, $address, $phone, $password, $status){
            $sql = "UPDATE `tbl_affiliate_partner` SET `avatar`=:avatar,`firstname`=:firstname,`lastname`=:lastname,`email`=:email,`profession`=:profession,`address`=:address,`phone`=:phone,`password`=:password,`status`=:status,`updated_at`=NOW() WHERE `id`=:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->bindParam(":avatar", $avatar);
            $result->bindParam(":firstname", $firstname);
            $result->bindParam(":lastname", $lastname);
            $result->bindParam(":email", $email);
            $result->bindParam(":profession", $profession);
            $result->bindParam(":address", $address);
            $result->bindParam(":phone", $phone);
            $result->bindParam(":password", $password);
            $result->bindParam(":status", $status);
            $result->execute();
        }

        //* delete account affiliate
        protected function accountDelete_m($id){
            $sql = "DELETE FROM `tbl_affiliate_partner` WHERE `id`=:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
        }

        //* insert ratio rose
        protected function insertRose_m($cate_pro_id, $rose_old, $rose_new){
            $sql = "INSERT INTO `tbl_ratio_rose`(`cate_pro_id`, `rose_old`, `rose_new`) VALUES (:cate_pro_id, :rose_old, :rose_new)";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":cate_pro_id", $cate_pro_id);
            $result->bindParam(":rose_old", $rose_old);
            $result->bindParam(":rose_new", $rose_new);
            $result->execute();
        }

        //* update ratio rose
        protected function updateRose_m($id, $rose_old, $rose_new, $status){
            $sql = "UPDATE `tbl_ratio_rose` SET `rose_old`=:rose_old,`rose_new`=:rose_new,`status`=:status,`updated_at`= NOW() WHERE `id`=:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->bindParam(":rose_old", $rose_old);
            $result->bindParam(":rose_new", $rose_new);
            $result->bindParam(":status", $status);
            $result->execute();
        }

        //* delete ratio rose
        protected function deleteRose_m($id){
            $sql = "DELETE FROM `tbl_ratio_rose` WHERE id=:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
        }

        //* select all ratio rose
        protected function selectRose_m()
        {
            $sql = "SELECT tbl_ratio_rose.id, tbl_ratio_rose.cate_pro_id, tbl_ratio_rose.rose_old, tbl_ratio_rose.rose_new, tbl_ratio_rose.status, tbl_ratio_rose.created_at, tbl_ratio_rose.updated_at, tbl_category_products.name_cate FROM tbl_ratio_rose, tbl_category_products WHERE tbl_ratio_rose.cate_pro_id = tbl_category_products.id";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select ratio rose on id
        protected function selectRoseOne_m($id)
        {
            $sql = "SELECT tbl_ratio_rose.id, tbl_ratio_rose.cate_pro_id, tbl_ratio_rose.rose_old, tbl_ratio_rose.rose_new, tbl_ratio_rose.status, tbl_ratio_rose.created_at, tbl_ratio_rose.updated_at, tbl_category_products.name_cate FROM tbl_ratio_rose, tbl_category_products WHERE tbl_ratio_rose.cate_pro_id = tbl_category_products.id AND tbl_ratio_rose.id=:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select ratio rose on cate id
        protected function selectCheckCate($cate_id){
            $sql = "SELECT * FROM `tbl_ratio_rose` WHERE tbl_ratio_rose.cate_pro_id =:cate_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":cate_id", $cate_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* select category products
        protected function selectAllCate_m(){
            $sql = "SELECT * FROM `tbl_category_products`";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* insert program sell rose
        protected function insertProgramSell_m($rose_id, $image, $title, $rose_old, $rose_new, $description){
            $sql = "INSERT INTO `tbl_program_sell`(`rose_id`, `image`, `title`, `rose_old`, `rose_new`, `description`) VALUES (:rose_id, :image, :title, :rose_old, :rose_new, :description)";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":rose_id", $rose_id);
            $result->bindParam(":image", $image);
            $result->bindParam(":title", $title);
            $result->bindParam(":rose_old", $rose_old);
            $result->bindParam(":rose_new", $rose_new);
            $result->bindParam(":description", $description);
            $result->execute();
        }

        //* update program sell rose
        protected function updateProgramSell_m($id, $rose_id, $image, $title, $rose_old, $rose_new, $description, $status){
            $sql = "UPDATE `tbl_program_sell` SET `rose_id`=:rose_id,`image`=:image,`title`=:title,`rose_old`=:rose_old, `rose_new`=:rose_new,`description`=:description,`status`=:status,`updated_at`= NOW() WHERE `id`=:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->bindParam(":rose_id", $rose_id);
            $result->bindParam(":image", $image);
            $result->bindParam(":title", $title);
            $result->bindParam(":rose_old", $rose_old);
            $result->bindParam(":rose_new", $rose_new);
            $result->bindParam(":description", $description);
            $result->bindParam(":status", $status);
            $result->execute();
        }

         //* select ratio rose on rose id
         protected function selectCheckRose($rose_id){
            $sql = "SELECT `rose_old`, `rose_new` FROM `tbl_ratio_rose` WHERE tbl_ratio_rose.id=:rose_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":rose_id", $rose_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }
    }
?>