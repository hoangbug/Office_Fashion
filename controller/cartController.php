<?php
if (isset($useAjax)) {
    include_once '../../model/cartModel.php';
} else {
    include_once 'model/cartModel.php';
}
class cartController extends cartModel
{
    private $cart;
    function __construct()
    {
        $this->cart = new cartModel();
    }

    public function checkExistsProduct($id)
    {
        $checkExistsProduct = $this->cart->selectAllId_m($id);
        return $checkExistsProduct;
    }

    public function checkQuantityProduct($product_id, $name_size)
    {
        $checkQuantityProduct = $this->cart->getQuantitySizeProduct($product_id, $name_size);
        return $checkQuantityProduct;
    }

    public function viewCart_c()
    {
        include_once "views/shoppingCart/viewCart.php";
    }

    public function checkoutCart()
    {
        include_once "views/shoppingCart/checkoutCart.php";
    }

    public function checkDiscount_c($gift_code)
    {
        return $this->cart->checkDiscount($gift_code);
    }

    public function option()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = "viewCart";
        }

        switch ($method) {
            case 'viewCart':
                $this->viewCart_c();
                break;
            case 'checkoutCart':
                $this->checkoutCart();
                if (isset($_POST['checkout'])) {
                    $member_id = $_POST['member_id'];
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $pay_method = $_POST['pay_method'];
                    $ship_method = $_POST['ship_method'];
                    $note = $_POST['note'];
                    $total_money =  $_POST['total_money'];
                    if($ship_method == 1){
                        $total_money += 35000;
                    }
                    elseif($ship_method == 2){
                        $total_money += 30000;
                    }
                    if(isset($_SESSION['checkDiscount']) && !empty($_SESSION['checkDiscount'])){
                        $total_money -=  $_SESSION['checkDiscount'] ;
                    }
                    //  = $_POST['total_money'];
                    if (isset($member_id) && isset($_SESSION['cart'])) {
                        $this->cart->checkoutCartOrder($member_id, $note, $total_money, $ship_method, $pay_method);
                        $getOrderID = $this->cart->getLastOrder_id();
                        foreach ($_SESSION['cart'] as $value) {
                            $getQuantitySizeProducts = $this->cart->getQuantitySizeProduct( $value['id'],$value['name_size']);
                            $quantityInvent = $getQuantitySizeProducts['quantity'] - $value['quantity'];
                            $totalMoneyDetailProduct = $value['quantity'] * $value['price'];
                            $this->cart->checkoutCartOrderDetail($getOrderID['id'],  $value['id'],$value['name_size'], $value['quantity'], $value['price'], $totalMoneyDetailProduct);

                            //update inventory
                            $this->cart->updateInvent($quantityInvent,$value['id'] ,$value['name_size']);
                            
                        }
                        if (isset($_COOKIE['cookie_user']) && !empty($_COOKIE['cookie_user']) && isset($_COOKIE['cookie_program']) && !empty($_COOKIE['cookie_program']) && isset($_COOKIE['cookie_qrcode']) && !empty($_COOKIE['cookie_qrcode'])) {
                            $affiliate_id = $_COOKIE['cookie_user'];
                            $program_id = $_COOKIE['cookie_program'];
                            $check = $this->cart->checkReferalId($affiliate_id, $program_id);
                            if (!empty($check)) {
                                $checkUserNewOld = $this->cart->checkUserNewOld_m($member_id);
                                if (empty($checkUserNewOld)) {
                                    $total_rose = $total_money * ($check['rose_new'] / 100);
                                    if ($total_rose > 100000) {
                                        $total_rose = 100000;
                                        $this->cart->insertOrderReferal($getOrderID['id'], $check['id'], $check['rose_new'], $total_rose);
                                    } else {
                                        $this->cart->insertOrderReferal($getOrderID['id'], $check['id'], $check['rose_new'], $total_rose);
                                    }
                                    $checkUserTotalRose = $this->cart->checkTotalRoseAff_m($affiliate_id);
                                    $this->cart->updateAffiliate_m($affiliate_id, $checkUserTotalRose['total_rose_aff']);
                                } else {
                                    $total_rose = $total_money * ($check['rose_old'] / 100);
                                    $checkTotalRose = $this->cart->checkTotalRose_m();
                                    if (!empty($checkTotalRose)) {
                                        $total_rose = 0;
                                        $this->cart->insertOrderReferal($getOrderID['id'], $check['id'], $check['rose_old'], $total_rose);
                                    } else {
                                        if ($total_rose > 100000) {
                                            $total_rose = 100000;
                                            $this->cart->insertOrderReferal($getOrderID['id'], $check['id'], $check['rose_old'], $total_rose);
                                        } else {
                                            $this->cart->insertOrderReferal($getOrderID['id'], $check['id'], $check['rose_old'], $total_rose);
                                        }
                                    }
                                    $checkUserTotalRose = $this->cart->checkTotalRoseAff_m($affiliate_id);
                                    $this->cart->updateAffiliate_m($affiliate_id, $checkUserTotalRose['total_rose_aff']);
                                }
                            }
                        }
                        unset($_SESSION['checkDiscount']);
                        unset($_SESSION['gift_code']);
                        unset($_SESSION['cart']);
                        header('Location:index.php');
                    }
                }
                break;
            case 'delAllCart':
                unset($_SESSION['cart']);
                header('Location:index.php');
                break;
            default:
                header("Location:404error.html");
                break;
        }
    }
}
