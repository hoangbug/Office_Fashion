<?php
session_start();
$useAjax = 1;
include_once '../../controller/cartController.php';
$cart = new cartController();
if (isset($_POST['quantity']) && isset($_POST['product_id']) && isset($_POST['totalProduct']) && isset($_POST['sizeDefault']) && isset($_POST['sizeProduct'])) {
    $quantity = $_POST['quantity'];
    $product_id = (int)$_POST['product_id'];

    // total product current in inventory
    $totalProduct = $_POST['totalProduct'];
    $sizeDefault = $_POST['sizeDefault'];
    $sizeProduct = $_POST['sizeProduct'];

    // check product exists
    $checkExistsProduct = $cart->checkExistsProduct($product_id);
  
    //check quantity size
    if ($sizeDefault == 1) {
        $name_size = 'default';
        $checkQuantityProduct = $cart->checkQuantityProduct($product_id, $name_size);
    } else {
        $name_size = $sizeProduct;
        $checkQuantityProduct = $cart->checkQuantityProduct($product_id, $name_size);
    }
    if ($quantity > $totalProduct) {
        if ($totalProduct != 0){
?>
            <div class="noti-cart animate__animated animate__zoomInDown" style="animation-duration: 0.5s; position: absolute;z-index: 10; top:30%;opacity:0.7; padding:20px; left:35%; border-radius: 10px; background: black; position: fixed; text-align: center;">
                <span style="font-size: 40px; border-radius: 50%;padding :10px; color:white ;background:red" class="glyphicon glyphicon-volume-up" aria-hidden="true"></span>
                <p style="margin-top:20px;font-size: 20px; color:white">Rất tiếc bạn chỉ có thể mua tối đa <?= $totalProduct ?> sản phẩm có sẵn</p>
            </div>
        <?php
        } else {
        ?>
            <div class="noti-cart animate__animated animate__zoomInDown" style="animation-duration: 0.5s; position: absolute;z-index: 10; top:30%;opacity:0.7; padding:20px; left:45%; border-radius: 10px; background: black; position: fixed; text-align: center;">
                <span style="font-size: 40px; border-radius: 50%;padding :10px; color:white ;background:red" class="glyphicon glyphicon-volume-up" aria-hidden="true"></span>
                <p style="margin-top:20px;font-size: 20px; color:white">Sản phẩm này đã hết hàng</p>
            </div>
        <?php
        }
    } elseif ($quantity > 0 &&  $quantity <= $checkQuantityProduct['quantity'] && !empty($checkExistsProduct)) {
        // echo "<pre>";
        // print_r($checkQuantityProduct);
        // echo "</pre>";
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            $_SESSION['cart'][0] = $checkExistsProduct;
            $_SESSION['cart'][0]['name_size'] =  $checkQuantityProduct['name_size'];
            $_SESSION['cart'][0]['quantity'] = $quantity;
        ?>
            <div class="noti-cart animate__animated animate__zoomInDown" style="animation-duration: 0.5s; position: absolute;z-index: 10; top:30%;opacity:0.7; padding:20px; left:40%; border-radius: 10px; background: black; position: fixed; text-align: center;">
                <span style="font-size: 40px; border-radius: 50%;padding :10px; color:white ;background:#00CCCC" class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                <p style="margin-top:20px;font-size: 20px; color:white">Sản phẩm đã được thêm vào Giỏ hàng</p>
            </div>
    
            <?php
        } else {
            $checkCaseCart = 0;
            $count = count($_SESSION['cart']);
            for ($i = 0; $i < $count; $i++) {
                if ($_SESSION['cart'][$i]['id'] == $product_id && $_SESSION['cart'][$i]['name_size'] == $name_size) {
                    $checkCaseCart = 1;
                    $keys = $i;
                    break;
                } elseif ($_SESSION['cart'][$i]['id'] == $product_id && $_SESSION['cart'][$i]['name_size'] != $name_size) {
                    $checkCaseCart = 2;
                } elseif ($_SESSION['cart'][$i]['id'] != $product_id) {
                    $checkCaseCart = 2;
                }
            }

            if ($checkCaseCart == 1) {
                $checkQuantity = $_SESSION['cart'][$keys]['quantity'] + $quantity;
                if ($checkQuantity <= $totalProduct) {
                    $_SESSION['cart'][$keys]['quantity'] += $quantity;
            ?>
                    <div class="noti-cart animate__animated animate__zoomInDown" style="animation-duration: 0.5s; position: absolute;z-index: 10; top:30%;opacity:0.7; padding:20px; left:40%; border-radius: 10px; background: black; position: fixed; text-align: center;">
                        <span style="font-size: 40px; border-radius: 50%;padding :10px; color:white ;background:#00CCCC" class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <p style="margin-top:20px;font-size: 20px; color:white">Sản phẩm đã được thêm vào Giỏ hàng</p>
                    </div>
                    <?php
                } else {
                    //sô lượng tốt đa có thể mua
                    $maxPurchase = $totalProduct -  $_SESSION['cart'][$keys]['quantity'];
                    if ($maxPurchase > 0 && $maxPurchase != 0) {
                    ?>
                        <div class="noti-cart animate__animated animate__zoomInDown" style="animation-duration: 0.5s; position: absolute;z-index: 10; top:30%;opacity:0.7; padding:20px; left:35%; border-radius: 10px; background: black; position: fixed; text-align: center;">
                            <span style="font-size: 40px; border-radius: 50%;padding :10px; color:white ;background:red" class="glyphicon glyphicon-volume-up" aria-hidden="true"></span>
                            <p style="margin-top:20px;font-size: 20px; color:white">Rất tiếc bạn chỉ có thể mua tối đa <?= $maxPurchase; ?> sản phẩm có sẵn</p>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="noti-cart animate__animated animate__zoomInDown" style="animation-duration: 0.5s; position: absolute;z-index: 10; top:30%;opacity:0.7; padding:20px; left:45%; border-radius: 10px; background: black; position: fixed; text-align: center;">
                            <span style="font-size: 40px; border-radius: 50%;padding :10px; color:white ;background:red" class="glyphicon glyphicon-volume-up" aria-hidden="true"></span>
                            <p style="margin-top:20px;font-size: 20px; color:white">Sản phẩm này đã hết hàng</p>
                        </div>
                <?php
                    }
                }
            } elseif ($checkCaseCart == 2) {
                end($_SESSION['cart']);
                $key = key($_SESSION['cart']) + 1;
                // $key = array_key_last($_SESSION['cart']) + 1;
                $_SESSION['cart'][$key] = $checkExistsProduct;
                $_SESSION['cart'][$key]['name_size'] =  $checkQuantityProduct['name_size'];
                $_SESSION['cart'][$key]['quantity'] = $quantity;
                ?>
                <div class="noti-cart animate__animated animate__zoomInDown" style="animation-duration: 0.5s; position: absolute;z-index: 10; top:30%;opacity:0.7; padding:20px; left:40%; border-radius: 10px; background: black; position: fixed; text-align: center;">
                    <span style="font-size: 40px; border-radius: 50%;padding :10px; color:white ;background:#00CCCC" class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <p style="margin-top:20px;font-size: 20px; color:white">Sản phẩm đã được thêm vào Giỏ hàng</p>
                </div>
<?php
            }
        }
    }
}
?>  