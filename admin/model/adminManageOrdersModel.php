<?php
if(isset($useAjax)){
    include_once '../../../config/myconfig.php';
}else{
    include_once '../config/myconfig.php';
}
class manageOrdersModel extends Connect{
    function __construct()
    {
        parent::__construct();
    }

    //* select manage order on status
    protected function selectOrderStatus_m($status){
        $sql = "SELECT tbl_orders.id, tbl_orders.member_id, tbl_orders.note, tbl_orders.total_money, tbl_orders.ship_method, tbl_orders.pay_method, tbl_orders.date_order, tbl_orders.status, tbl_orders.updated_at, tbl_member.name AS 'name_member' FROM tbl_orders, tbl_member WHERE tbl_orders.member_id = tbl_member.id AND tbl_orders.status =:status";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":status", $status);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    

    //* select view manage order all
    protected function selectAllManageOrder_m(){
        $sql = "SELECT tbl_orders.id, tbl_orders.member_id, tbl_orders.note, tbl_orders.total_money, tbl_orders.ship_method, tbl_orders.pay_method, tbl_orders.date_order, tbl_orders.status, tbl_orders.updated_at, tbl_member.name AS 'name_member' FROM tbl_orders, tbl_member WHERE tbl_orders.member_id = tbl_member.id ORDER BY tbl_orders.id DESC";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //* select view manage order on id
    protected function selectOderOnId_m($order_id){
        $sql = "SELECT tbl_orders.id, tbl_orders.member_id, tbl_orders.note, tbl_orders.total_money, tbl_orders.ship_method, tbl_orders.pay_method, tbl_orders.date_order, tbl_orders.status, tbl_orders.updated_at, tbl_member.name AS 'name_member', tbl_products.id AS 'product_id', tbl_products.name, tbl_products.main_image, tbl_detail_orders.name_size, tbl_detail_orders.quantity, tbl_detail_orders.price, tbl_detail_orders.total_money AS 'total_one', tbl_products.views, tbl_products.description FROM tbl_orders, tbl_member, tbl_detail_orders, tbl_products WHERE tbl_orders.member_id = tbl_member.id AND tbl_orders.id = tbl_detail_orders.order_id AND tbl_detail_orders.product_id = tbl_products.id AND tbl_orders.id =:order_id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":order_id", $order_id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //* update status order
    protected function updateStatusOrder_m($orders_id, $status){
        $sql = "UPDATE `tbl_orders` SET `status`=:status,`updated_at`=NOW() WHERE `id`=:orders_id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":orders_id", $orders_id);
        $result->bindParam(":status", $status);
        $result->execute();
    }

    //* delete order
    protected function deleteOrders_m($order_id, $status){
        $sql = "DELETE FROM `tbl_orders` WHERE `id`=:order_id AND `status`=:status";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":order_id", $order_id);
        $result->bindParam(":status", $status);
        $result->execute();
    }
}
?>