<?php
    session_start();
    if(isset($_POST['product_id']) && isset($_POST['name_size'])){
        $product_id = $_POST['product_id'];
        $name_size = $_POST['name_size'];
        $check = -1;
        foreach ($_SESSION['cart'] as $key => $value) {
           if($value['id'] == $product_id && $value['name_size'] == $name_size){
                $check = $key;
           }
        }
        if($check != -1){
            unset($_SESSION['cart'][$check]);
        }
    }
    
?>