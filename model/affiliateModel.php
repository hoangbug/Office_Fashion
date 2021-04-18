<?php
    if(isset($useAjax)){
        include_once '../../config/myconfig.php';
    }else{
        include_once 'config/myconfig.php' ;
    }

    class affiliateModel extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

         //* Insert affiliate_partner
        protected function affiliateInsert_m($avatar, $firstname, $lastname, $email, $profession, $address, $phone, $password){
            $sql = "INSERT INTO `tbl_affiliate_partner`(`avatar`, `firstname`, `lastname`, `email`, `profession`, `address`, `phone`, `password`) VALUES (:avatar, :firstname, :lastname, :email, :profession, :address, :phone, :password)";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":avatar", $avatar);
            $result->bindParam(":firstname", $firstname);
            $result->bindParam(":lastname", $lastname);
            $result->bindParam(":email", $email);
            $result->bindParam(":profession", $profession);
            $result->bindParam(":address", $address);
            $result->bindParam(":phone", $phone);
            $result->bindParam(":password", $password);
            $result->execute();
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

        //* select all affiliate
        protected function selectAllProgram_m(){
            $sql = "SELECT * FROM `tbl_program_sell` ORDER BY tbl_program_sell.id DESC";
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

        //* select check account affiliate
        protected function checkAccountOne_m($email, $password){
            $sql = "SELECT * FROM `tbl_affiliate_partner` WHERE `email`=:email AND `password`=:password";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":password", $password);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* insert tbl_referal
        protected function insertReferal_m($affiliate_id, $program_id, $affiliate_code){
            $sql = "INSERT INTO `tbl_referal`(`affiliate_id`, `program_id`, `affiliate_code`) VALUES (:affiliate_id, :program_id, :affiliate_code)";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":affiliate_id", $affiliate_id);
            $result->bindParam(":program_id", $program_id);
            $result->bindParam(":affiliate_code", $affiliate_code);
            $result->execute();
        }

        //* select check tbl_referal
        protected function checkReferalOne_m($affiliate_id, $program_id){
            $sql = "SELECT * FROM `tbl_referal` WHERE `affiliate_id` =:affiliate_id AND `program_id` =:program_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":affiliate_id", $affiliate_id);
            $result->bindParam(":program_id", $program_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* select affiliate_code
        protected function selectAffiliateCode_m($program_id){
            $sql = "SELECT affiliate_code FROM `tbl_referal` WHERE `program_id` =:program_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":program_id", $program_id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } 

        //* select tbl_referal one affiliate_id
        protected function selectAffiliateId_m($affiliate_id){
            $sql = "SELECT tbl_referal.id, tbl_referal.affiliate_id, tbl_referal.program_id, tbl_referal.affiliate_code, tbl_referal.status, tbl_referal.created_at, tbl_program_sell.id, tbl_program_sell.rose_id, tbl_program_sell.image, tbl_program_sell.title, tbl_program_sell.rose_old, tbl_program_sell.rose_new, tbl_program_sell.created_at FROM tbl_referal, tbl_program_sell WHERE tbl_referal.program_id = tbl_program_sell.id AND tbl_referal.affiliate_id =:affiliate_id ORDER BY tbl_program_sell.id DESC";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":affiliate_id", $affiliate_id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* check gender product
        protected function checkGendercate_m($program_id){
            $sql = "SELECT tbl_category_products.id, tbl_category_products.gender_product FROM tbl_program_sell, tbl_ratio_rose, tbl_category_products WHERE tbl_program_sell.rose_id = tbl_ratio_rose.id AND tbl_ratio_rose.cate_pro_id = tbl_category_products.id AND tbl_program_sell.id =:program_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":program_id", $program_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* select tbl_order_referal all
        protected function selectOrderReferal_m(){
            $sql = "SELECT * FROM `tbl_order_referal`";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select all ratio rose - views affiliate
        protected function selectRatioRoseViews_m(){
            $sql = "SELECT tbl_category_products.name_cate, tbl_ratio_rose.rose_old, tbl_ratio_rose.rose_new FROM tbl_ratio_rose, tbl_category_products WHERE tbl_ratio_rose.cate_pro_id = tbl_category_products.id";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select turn over on year
        protected function selectTurnOver(){
            $sql = "SELECT SUM(total_rose) AS 'total_money', MONTH(tbl_order_referal.created_at) as month FROM tbl_order_referal WHERE created_at LIKE '%2021%' GROUP BY month ASC";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select tbl_change _code
        protected function selectChangeCode(){
            $sql = "SELECT * FROM `tbl_change_code`";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select gift
        protected function checkGiftCodeOne_m($cate_id, $gift_code){
            $sql = "SELECT * FROM `tbl_gifts` WHERE tbl_gifts.cate_id =:cate_id AND tbl_gifts.gift_code =:gift_code";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":cate_id", $cate_id);
            $result->bindParam(":gift_code", $gift_code);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* insert gift
        protected function insertGiftCodeOne_m($cate_id, $affiliate_id, $change_code, $gift_code, $type_code, $quantity){
            $sql = "INSERT INTO `tbl_gifts`(`cate_id`, `affiliate_id`, `change_code`, `gift_code`, `type_code`, `quantity`) VALUES (:cate_id, :affiliate_id, :change_code, :gift_code, :type_code, :quantity)";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":cate_id", $cate_id);
            $result->bindParam(":affiliate_id", $affiliate_id);
            $result->bindParam(":change_code", $change_code);
            $result->bindParam(":gift_code", $gift_code);
            $result->bindParam(":type_code", $type_code);
            $result->bindParam(":quantity", $quantity);
            $result->execute();
        }

        //* check progarm gifts
        protected function checkGifts_m($affiliate_id, $change_code){
            $sql = "SELECT id, quantity, SUM(quantity) as 'sumQuantity' FROM `tbl_gifts` WHERE `affiliate_id` =:affiliate_id AND `change_code` =:change_code GROUP BY affiliate_id HAVING SUM(quantity) >= 10";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":affiliate_id", $affiliate_id);
            $result->bindParam(":change_code", $change_code);
            // $result->bindParam(":quantity", $quantity);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }
        
        //* check total on sum total rose
        protected function checkTotalRoseAff_m($affiliate_id){
            $sql = "SELECT `total_rose` FROM `tbl_affiliate_partner` WHERE `id`=:affiliate_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":affiliate_id", $affiliate_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* update money affiliate partner
        protected function updateAffiliate_m($affiliate_id, $total_rose){
            $sql = "UPDATE `tbl_affiliate_partner` SET `total_rose`=:total_rose WHERE `id`=:affiliate_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":affiliate_id", $affiliate_id);
            $result->bindParam(":total_rose", $total_rose);
            $result->execute();
        }


        //? check regex account affiliate
        //* check email 
        protected function checkEmail($email){
            $patternEmail = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
            if (preg_match($patternEmail, $email) === 1) {
                return true;
            } else {
                return false;
            }
        }

        //* check password
        protected function checkPass($pass)
        {
            $patternPass = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/';
            if (preg_match($patternPass, $pass) === 1) {
                return true;
            } else {
                return false;
            }
        }
    }
?>
