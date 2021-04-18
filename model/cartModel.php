<?php
    if(isset($useAjax)){
        include_once '../../config/myconfig.php';
    }else{
        include_once 'config/myconfig.php' ;
    }

    class cartModel extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

        //update inventory size product
        protected function updateInvent($quantity,$product_id ,$name_size){
            $sql = 'UPDATE `tbl_detail_size` SET `quantity`=:quantity WHERE `product_id`=:product_id AND `name_size`=:name_size';
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":quantity", $quantity);
            $result->bindParam(":product_id", $product_id);
            $result->bindParam(":name_size", $name_size);
            $result->execute();
        }

        protected function selectAllId_m($id)
        {
            $sql = "SELECT tbl_products.id, tbl_products.cate_pro_id, tbl_category_products.name_cate, tbl_brand.name_brand, tbl_products.product_sets_id, tbl_products.name, tbl_products.main_image, tbl_products.price, tbl_products.status  FROM tbl_products, tbl_category_products, tbl_brand WHERE tbl_products.cate_pro_id = tbl_category_products.id AND tbl_products.brand_id = tbl_brand.id AND tbl_products.id=:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        protected function getQuantitySizeProduct($product_id ,$name_size)
        {
            $sql ="SELECT `id`, `product_id`, `name_size`, `quantity` FROM `tbl_detail_size` WHERE `product_id` = :product_id AND `name_size` = :name_size";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":product_id", $product_id);
            $result->bindParam(":name_size", $name_size);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        protected function checkoutCartOrder($member_id, $note, $total_money, $ship_method, $pay_method)
        {
            $sql = "INSERT INTO `tbl_orders`(`member_id`, `note`, `total_money`, `ship_method`, `pay_method`) VALUES (:member_id, :note, :total_money, :ship_method, :pay_method)";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":member_id", $member_id);
            $result->bindParam(":note", $note);
            $result->bindParam(":total_money", $total_money);
            $result->bindParam(":ship_method", $ship_method);
            $result->bindParam(":pay_method", $pay_method);
            $result->execute();
            // $lastID = $result->PDO::lastInsertId();
        }

        protected function checkoutCartOrderDetail($order_id, $product_id, $name_size, $quantity, $price, $total_money)
        {
            $sql = "INSERT INTO `tbl_detail_orders`(`order_id`, `product_id`,`name_size`, `quantity`, `price`, `total_money`) VALUES (:order_id, :product_id,:name_size ,:quantity, :price, :total_money)";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":order_id", $order_id);
            $result->bindParam(":quantity", $quantity);
            $result->bindParam(":name_size", $name_size);
            $result->bindParam(":product_id", $product_id);
            $result->bindParam(":price", $price);
            $result->bindParam(":total_money", $total_money);
            $result->execute();
        }

        protected function getLastOrder_id()
        {
            $sql = "SELECT id FROM tbl_orders ORDER BY id DESC LIMIT 1";
            $result = $this->pdo->prepare($sql) ;
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* insert tt rose referal
        protected function insertOrderReferal($order_id, $referal_id, $rose, $total_rose){
            $sql = "INSERT INTO `tbl_order_referal`(`order_id`, `referal_id`, `rose`, `total_rose`) VALUES (:order_id, :referal_id, :rose, :total_rose)";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":order_id", $order_id);
            $result->bindParam(":referal_id", $referal_id);
            $result->bindParam(":rose", $rose);
            $result->bindParam(":total_rose", $total_rose);
            $result->execute();
        }

        //* select
        protected function checkReferalId($affiliate_id, $program_id){
            $sql ="SELECT tbl_referal.id, tbl_ratio_rose.cate_pro_id, tbl_program_sell.rose_old, tbl_program_sell.rose_new
            FROM tbl_referal, tbl_program_sell, tbl_ratio_rose WHERE tbl_referal.program_id = tbl_program_sell.id AND tbl_program_sell.rose_id = tbl_ratio_rose.id AND tbl_referal.affiliate_id =:affiliate_id AND tbl_referal.program_id =:program_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":affiliate_id", $affiliate_id);
            $result->bindParam(":program_id", $program_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* check user new - old
        protected function checkUserNewOld_m($member_id){
            $sql ="SELECT * FROM `tbl_orders` WHERE `member_id`=:member_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":member_id", $member_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        
        //* check total money rose
        protected function checkTotalRose_m(){
            $sql = "SELECT SUM(total_rose) AS 'total_money', MONTH(tbl_order_referal.created_at) as month FROM tbl_order_referal GROUP BY id HAVING SUM(total_rose) > 16000000";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

       //* check total on sum total rose
        protected function checkTotalRoseAff_m($affiliate_id){
            $sql = "SELECT SUM(tbl_order_referal.total_rose) as 'total_rose_aff' FROM tbl_referal, tbl_order_referal WHERE tbl_referal.id = tbl_order_referal.referal_id AND tbl_referal.affiliate_id =:affiliate_id GROUP BY tbl_referal.affiliate_id";
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

        protected function checkDiscount($gift_code)
        {
            $sql ="SELECT tbl_change_code.money_xu FROM tbl_gifts, tbl_change_code WHERE tbl_gifts.gift_code =:gift_code AND tbl_change_code.id = tbl_gifts.change_code";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":gift_code", $gift_code);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }
    }

?>