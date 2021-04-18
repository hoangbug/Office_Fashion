<?php
$useAjax = 1;
include_once "../../controller/adminManageOrdersController.php";
$orders = new manageOrdersController();
function substr_word($str, $limit)
{
    if (stripos($str, " ")) {
        $ex_str = explode(" ", $str);
        $str_s = "";
        if (count($ex_str) > $limit) {
            for ($i = 0; $i < $limit; $i++) {
                $str_s .= $ex_str[$i] . " ";
            }
            return $str_s ." ...";
        } else {
            return $str;
        }
    } else {
        return $str;
    }
}
?>
<div class="row">
    <div class="col-sm-4 col-xl-3"><h5 class="card-title" style="text-align: center;">Sản phẩm</h5></div>
    <div class="col-sm-8 col-xl-9"><h5 class="card-title" style="text-align: center;"> Chi tiết đơn hàng</h5></div>
</div>
<?php
if (isset($_POST['orders_id']) && !empty($_POST['orders_id'])) {
    $orders_id = $_POST['orders_id'];
    $selectOrderId = $orders->selectOderOnId_c($orders_id);
    ?>
    
    <?php
    foreach($selectOrderId as $value){
?>
    <div class="row">
        <div class="col-sm-4 col-xl-3">
            <div class="card">
                <img class="img-fluid" src="../assets/images/products/<?= $value['main_image'] ?>" alt="Card image cap">
                <div class="card-body">
                    <h3 class="text-success font-weight-bold" style="text-align: center;"> <?= $value['name'] ?></h3>
                    <p><i class="ion-md-eye"></i> <?= $value['views'] ?></p>
                    <p class="card-text"><?= substr_word($value['description'], 15) ?></p>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-xl-9">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5>ID - Tên khách hàng:</h5> <h4 class="pl-3 text-info"><?=$value['member_id'];?> - <?= $value['name_member'] ?></h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <h5>ID - Tên sản phẩm:</h5> <h4 class="pl-3 text-info"><?=$value['product_id'];?> - <?= $value['name'] ?></h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <h5>Kích cỡ - Size:</h5> <h4 class="pl-3 text-info"><?=$value['name_size'];?></h4>
                        <h5 class="pl-5">Số lượng:</h5> <h4 class="pl-3 text-info"><?=$value['quantity'];?></h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <h5>Đơn giá:</h5> <h4 class="pl-3 text-info"><?=number_format($value['price'], 0, '', '.');?></h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <h5>Tổng tiền:</h5> <h4 class="pl-3 text-info"><?=number_format($value['total_one'], 0, '', '.');?></h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <h5>Ngày mua:</h5> <h4 class="pl-3 text-info"><?=$value['date_order'];?></h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <h5>Phương thức giao hàng:</h5> <h4 class="pl-3 text-info"><?php  if (($value['ship_method']) == 1) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Giao hàng tiết kiệm";
                                    } elseif (($value['ship_method']) == 2) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Giao hàng nhanh";
                                    } ?></h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <h5>Phương thức thanh toán:</h5> <h4 class="pl-3 text-info"><?php if (($value['pay_method']) == 1) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Thanh toán khi nhận hàng";
                                    } elseif (($value['pay_method']) == 2) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Thanh toán bằng Shop xu";
                                    }elseif (($value['pay_method']) == 3) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Thanh toán bằng ví AirPay";
                                    }elseif (($value['pay_method']) == 4) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Thanh toán bằng ZaloPay";
                                    } ?></h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <h5>Trạng thái:</h5> <h4 class="pl-3 text-info"><?php if (($value['status']) == 1) {
                                        echo "<i class='ion ion-md-close-circle' style='color: red;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Chờ xử lý";
                                    } elseif (($value['status']) == 2) {
                                        echo "<i class='ion ion-md-close-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đã hủy";
                                    }elseif (($value['status']) == 3) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đã xác nhận";
                                    }elseif (($value['status']) == 4) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Chưa giao hàng";
                                    }elseif (($value['status']) == 5) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đang giao hàng";
                                    }elseif (($value['status']) == 6) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đã giao hàng";
                                    }elseif (($value['status']) == 7) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Hoàn tất";
                                    } ?></h4>
                    </div>
                    <?php if($value['status'] == 5){ ?>
                    <div class="d-flex align-items-center">
                        <h5>Ngày giao hàng:</h5> <h4 class="pl-3 text-info"><?=$value['updated_at'];?></h4>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php
    }
    ?>
    <div class="row" style="background-color: #eee;">
        <div class="col-sm-12 col-xl-12">
            <div class="d-flex justify-content-end align-items-center pr-3">
                <h4>Thành tiền:</h4> <h2 class="pl-3 text-info"><?=number_format($value['total_money'], 0, '', '.');?>VND</h2>
            </div>
        </div>
    </div>
    <?php
}
?>