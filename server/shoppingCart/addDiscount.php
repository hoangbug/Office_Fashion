<?php
session_start();
$useAjax = 1;
include_once '../../controller/cartController.php';
$cart = new cartController();
if (isset($_POST['gift_code']) && !empty($_POST['gift_code']) && !isset($_SESSION['checkDiscount'])) {
    $gift_code = $_POST['gift_code'];
    $checkDiscount =  $cart->checkDiscount_c($gift_code);
    if (!empty($checkDiscount)) {
        $_SESSION['checkDiscount'] = $checkDiscount['money_xu'];
        $_SESSION['gift_code'] = $gift_code;
?>
        <div class="noti-cart animate__animated animate__zoomInDown" style="animation-duration: 0.5s; position: absolute;z-index: 10; top:30%;opacity:0.7; padding:20px; left:40%; border-radius: 10px; background: black; position: fixed; text-align: center;">
            <span style="font-size: 40px; border-radius: 50%;padding :10px; color:white ;background:#00CCCC" class="glyphicon glyphicon-ok" aria-hidden="true"></span>
            <p style="margin-top:20px;font-size: 20px; color:white">Áp dụng mã giảm giá thành công</p>
        </div>

    <?php
    }
} else {
    ?>
    <div class="noti-cart animate__animated animate__zoomInDown" style="animation-duration: 0.5s; position: absolute;z-index: 10; top:30%;opacity:0.7; padding:20px; left:35%; border-radius: 10px; background: black; position: fixed; text-align: center;">
        <span style="font-size: 40px; border-radius: 50%;padding :10px; color:white ;background:red" class="glyphicon glyphicon-volume-up" aria-hidden="true"></span>
        <p style="margin-top:20px;font-size: 20px; color:white">Đã áp dụng mã giảm giá cho đơn hàng này</p>
    </div>
<?php
}
?>