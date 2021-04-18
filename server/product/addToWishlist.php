<?php
session_start();
$useAjax = 1;
include_once '../../controller/productController.php';
$product = new productController();
if (isset($_POST['product_id']) && !empty($_POST['product_id']) ) {
    $id = $_POST['product_id'];
    $selectProductId = $product->selectAllId_c($id);
    if (isset($_SESSION['likeProduct']) && !empty($_SESSION['likeProduct'])) {
        if (array_key_exists($id, $_SESSION['likeProduct'])) {
?>
            <div class="noti-cart animate__animated animate__zoomInDown" style="animation-duration: 0.5s; position: absolute;z-index: 10; top:30%;opacity:0.7; padding:20px; left:40%; border-radius: 10px; background: black; position: fixed; text-align: center;">
                <span style="font-size: 40px; border-radius: 50%;padding :10px; color:white ;background:#00CCCC" class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                <p style="margin-top:20px;font-size: 20px; color:white">Sản phẩm đã được thêm vào Yêu thích</p>
            </div>
        <?php
        } else {
            $_SESSION['likeProduct'][$id] =  $selectProductId;
        ?>
            <div class="noti-cart animate__animated animate__zoomInDown" style="animation-duration: 0.5s; position: absolute;z-index: 10; top:30%;opacity:0.7; padding:20px; left:40%; border-radius: 10px; background: black; position: fixed; text-align: center;">
                <span style="font-size: 40px; border-radius: 50%;padding :10px; color:white ;background:#00CCCC" class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                <p style="margin-top:20px;font-size: 20px; color:white">Thêm vào danh sách yêu thích thành công</p>
            </div>
    <?php
        }
    }else {
        $_SESSION['likeProduct'][$id] =  $selectProductId;
        ?>
        <div class="noti-cart animate__animated animate__zoomInDown" style="animation-duration: 0.5s; position: absolute;z-index: 10; top:30%;opacity:0.7; padding:20px; left:40%; border-radius: 10px; background: black; position: fixed; text-align: center;">
            <span style="font-size: 40px; border-radius: 50%;padding :10px; color:white ;background:#00CCCC" class="glyphicon glyphicon-ok" aria-hidden="true"></span>
            <p style="margin-top:20px;font-size: 20px; color:white">Thêm vào danh sách yêu thích thành công</p>
        </div>
    <?php
    }
} 
?>