<?php
$useAjax = 1;
include_once "../../controller/adminManageOrdersController.php";
$orders = new manageOrdersController();
if (isset($_POST['orders_id']) && !empty($_POST['orders_id'])) {
    // $orders_id = $_POST['orders_id'];
    // $selectOrderId = $orders->selectOderOnId_c($orders_id);
    // if($selectOrderId['status'] == 1){
    //     $status = $selectOrderId['status'] + 2;
    // }else{
    //     $status = $selectOrderId['status'] + 1;
    // }
    // $orders->updateStatusOrder_c($orders_id, $status);
}
?>