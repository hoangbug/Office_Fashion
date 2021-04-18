<?php
if(isset($useAjax)){
    include_once '../../model/adminManageOrdersModel.php';
}else{
    include_once 'model/adminManageOrdersModel.php';
}
    class manageOrdersController extends manageOrdersModel{
        private $orders;
        function __construct(){
            $this->orders = new manageOrdersModel();
        }

        public function viewsManageOrders_c() {
            if(isset($_GET['status']) && !empty($_GET['status'])){
                $status = $_GET['status'];
                // echo $status;
                // if($status == 1){
                //     $selectAll = $this->orders->selectOrderStatus_m($status);
                //         include_once 'views/manage_orders/viewsManageOrders.php';
                // }
                switch($status){
                    case '1':
                        $selectAllStatus = $this->orders->selectOrderStatus_m($status);
                        include_once 'views/manage_orders/viewsManageOrders.php';
                        break;
                    case '2':
                        $selectAllStatus = $this->orders->selectOrderStatus_m($status);
                        include_once 'views/manage_orders/viewsManageOrders.php';
                        break;
                    case '3':
                        $selectAllStatus = $this->orders->selectOrderStatus_m($status);
                        include_once 'views/manage_orders/viewsManageOrders.php';
                        break;
                    case '4':
                        $selectAllStatus = $this->orders->selectOrderStatus_m($status);
                        include_once 'views/manage_orders/viewsManageOrders.php';
                        break;
                    case '5':
                        $selectAllStatus = $this->orders->selectOrderStatus_m($status);
                        include_once 'views/manage_orders/viewsManageOrders.php';
                        break;
                    case '6':
                        $selectAllStatus = $this->orders->selectOrderStatus_m($status);
                        include_once 'views/manage_orders/viewsManageOrders.php';
                        break;
                    case '7':
                        $selectAllStatus = $this->orders->selectOrderStatus_m($status);
                        include_once 'views/manage_orders/viewsManageOrders.php';
                        break;
                    default:
                        // code
                        break;
                }
            }else{
                $selectAll = $this->orders->selectAllManageOrder_m();
                include_once 'views/manage_orders/viewsManageOrders.php';
            }
        }

        public function selectOderOnId_c($order_id){
            return $this->orders->selectOderOnId_m($order_id);
        }

        // public function updateStatusOrder_c($orders_id, $status){
        //     $this->orders->updateStatusOrder_m($orders_id, $status);
        // }

        public function deleteOrders_c(){
            if(isset($_GET['order_id']) && !empty($_GET['order_id']) && isset($_GET['status']) && !empty($_GET['status'])){
                $order_id = $_GET['order_id'];
                $status = $_GET['status'];
                $this->orders->deleteOrders_m($order_id, $status);
                header('Location: index.php?page=manage_orders&method=viewsManageOrders&status=2');
            }
        }

        public function option(){
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'viewsManageOrders';
            }

            switch($method){
                case 'viewsManageOrders':
                    $this->viewsManageOrders_c();
                    if(isset($_POST['updateProductOrder'])){
                        $orders_id = $_POST['orders_id'];
                        if(!empty($orders_id)){
                            if(is_numeric($orders_id) && $orders_id > 0){
                                $selectOrderId = $this->orders->selectOderOnId_m($orders_id);
                                $statusOld = $selectOrderId[0]['status'];
                                if($statusOld == 1){
                                    $status = 3;
                                }else{
                                    $status = $statusOld + 1;
                                }
                                $this->orders->updateStatusOrder_m($orders_id, $status);
                                header("Location: index.php?page=manage_orders&method=viewsManageOrders&status=$statusOld");
                            }
                        }
                    }
                    break;
                case 'deleteOrders':
                    $this->deleteOrders_c();
                    break;
                default:
                    // code
                    break;
            }
        }
    }
?>