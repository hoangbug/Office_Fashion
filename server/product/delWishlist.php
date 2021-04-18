<?php
    session_start();
    if(isset($_POST['product_id'])){
        $product_id = $_POST['product_id'];
        unset($_SESSION['likeProduct'][$product_id]);
        
    }
    
?>