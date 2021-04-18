<?php
session_start();
$useAjax = 1;
include_once '../../controller/productController.php';
$product = new productController();

if (isset($_POST['product_id']) && isset($_POST['member_id']) && isset($_POST['comment'])) {
    $product_id = $_POST['product_id'];
    $member_id = $_POST['member_id'];
    $content = $_POST['comment'];
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    // die();
    if (!empty($content)) {
        // if(isset($_SESSION['idMember']) && !empty($_SESSION['idMember'])){
        // $member_id = $_SESSION['idMember'];
        $product->addComment_c($product_id, $member_id, $content);
        // }else{
        //     $_SESSION['error'] = "Bạn chưa đăng nhập, Hãy đăng nhập!";
        //     header('Location: index.php?page=member&method=loginMember');
        // }
    }
}

if (isset($_FILES["file"]["name"])) {
    if (isset($_POST['member'])) {
        $member_id = $_POST['member'];
        // $_SESSION['success'] = $member_id."656";
        $arr = $product->selectCommentId_c($member_id);
        if (count($_FILES["file"]["name"]) > 0) {
            for ($i = 0; $i < count($_FILES["file"]["name"]); $i++) {
                $file_name = $_FILES["file"]["name"][$i];
                $tmp_name = $_FILES["file"]['tmp_name'][$i];
                $file_array = explode(".", $file_name);
                $file_extension = end($file_array);
                $file_name = $file_array[0] . '-' . rand() . '.' . $file_extension;
                $location = '../../assets/images/comments/' . $file_name;
                move_uploaded_file($tmp_name, $location);
                $product->addCommentImage_c($arr['id'], $file_name);
            }
        }
    }
}
?>