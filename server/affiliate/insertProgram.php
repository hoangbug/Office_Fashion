<?php
$useAjax = 1;
include_once "../../controller/affiliateController.php";
$affiliate = new affiliateController();
if (isset($_POST['program_id']) && !empty($_POST['program_id']) && isset($_POST['affiliate_id']) && !empty($_POST['affiliate_id'])) {
    $program_id = $_POST['program_id'];
    $affiliate_id = $_POST['affiliate_id'];
    $permitted_chars  = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = substr(str_shuffle($permitted_chars ), 0, 16);
    $affiliate_code = $affiliate_id."_".$program_id."_".$code;

    if(!empty($program_id) && !empty($affiliate_id)){
        $check = $affiliate->checkReferalOne_c($affiliate_id, $program_id);
        if(empty($check)){
            $affiliate->insertReferal_c($affiliate_id, $program_id, $affiliate_code);
            // $link = "hoangbug.com/index.php?affiliate=$affiliate_code";
            // echo $link;
            echo "<script>alert('Đăng kí thành công!');</script>";
        }else{
            echo "<script>alert('Bạn đã đăng kí chương trình này rồi!');</script>";
        }
    }else{
        $_SESSION['error'] = "Bạn chưa đăng kí thành công!";
        header('Location: index.php?page=affiliate&method=programAffiliate');
    }
}
?>