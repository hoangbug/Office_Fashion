<?php
session_start();
$useAjax = 1;
include_once '../../controller/cartController.php';
$cart = new cartController();
if (isset($_POST['quantity']) && isset($_POST['product_id']) && isset($_POST['name_size'])) {
    $quantity = $_POST['quantity'];
    $product_id = (int)$_POST['product_id'];
    $name_size = $_POST['name_size'];
    // check product exists
    $checkExistsProduct = $cart->checkExistsProduct($product_id);
    //check quantity name size
    $checkQuantityProduct = $cart->checkQuantityProduct($product_id, $name_size);
    foreach ($_SESSION['cart'] as $key => $value) {
        if($value['id'] == $product_id && $value['name_size'] == $name_size){
            if ($quantity > $checkQuantityProduct['quantity']){
                $_SESSION['cart'][$key]['quantity'] = $checkQuantityProduct['quantity'];
            }elseif ($quantity > 0 && $quantity <= $checkQuantityProduct['quantity'] && !empty($checkExistsProduct)) {
                $_SESSION['cart'][$key]['quantity'] = $quantity;  
            }elseif($quantity <= 0){
                unset($_SESSION['cart'][$key]);
            }
        }
    }
}
?>